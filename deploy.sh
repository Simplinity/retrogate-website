#!/bin/sh
#
# RetroGate website — deploy to the live server with rsync over SSH.
#
#   ./deploy.sh                  deploy the committed tree (HEAD)
#   ./deploy.sh --dry-run        show what would change, touch nothing
#   ./deploy.sh --install-hooks  install git hooks that run this script after
#                                every commit or merge on main
#
# Server settings live OUTSIDE the repo (it is public) in
# ~/.config/retrogate-website/deploy.env:
#
#   DEPLOY_HOST=billie.simplinity.co
#   DEPLOY_USER=serverpilot
#   DEPLOY_PATH=/srv/users/serverpilot/apps/retrogate/public
#   DEPLOY_KEEP=""   # optional: extra server paths rsync must never delete
#   DEPLOY_CHOWN=""  # optional, when deploying as root: owner for the files,
#                    # e.g. serverpilot:serverpilot (the app's system user)
#
# What gets deployed: only files tracked by git at HEAD (via `git archive`),
# minus anything marked export-ignore in .gitattributes. Uncommitted edits are
# never deployed. The server mirrors the repo (--delete), except data/ (visitor
# counter, anti-spam secret), which is left alone.

set -eu

CONFIG="${RETROGATE_DEPLOY_CONFIG:-$HOME/.config/retrogate-website/deploy.env}"
REPO_ROOT="$(git rev-parse --show-toplevel)"

# One SSH connection shared by the path check and rsync: with password login
# you type it once, and it stays usable for 10 minutes.
SSH_OPTS="-o ControlMaster=auto -o ControlPath=~/.ssh/cm-%C -o ControlPersist=10m"

die() { printf 'deploy: %s\n' "$*" >&2; exit 1; }

install_hooks() {
  hooks_dir="$(git rev-parse --path-format=absolute --git-common-dir)/hooks"
  for hook in post-commit post-merge; do
    cat > "$hooks_dir/$hook" <<'EOF'
#!/bin/sh
# Installed by deploy.sh --install-hooks: deploy retrogate.app when main changes.
[ "$(git symbolic-ref --short -q HEAD)" = "main" ] || exit 0
exec "$(git rev-parse --show-toplevel)/deploy.sh"
EOF
    chmod +x "$hooks_dir/$hook"
    echo "installed $hooks_dir/$hook"
  done
  echo "From now on, every commit or merge on main deploys automatically."
}

deploy() {
  dry_run="$1"

  [ -f "$CONFIG" ] || die "no config at $CONFIG (see the header of this script)"
  # shellcheck disable=SC1090
  . "$CONFIG"
  [ -n "${DEPLOY_HOST:-}" ] || die "DEPLOY_HOST is empty in $CONFIG"
  [ -n "${DEPLOY_USER:-}" ] || die "DEPLOY_USER is empty in $CONFIG"
  [ -n "${DEPLOY_PATH:-}" ] || die "DEPLOY_PATH is empty in $CONFIG"
  target="$DEPLOY_USER@$DEPLOY_HOST:$DEPLOY_PATH/"

  printf 'deploy: %s -> %s%s\n' \
    "$(git -C "$REPO_ROOT" log -1 --format='%h %s' HEAD)" "$target" \
    "$([ -n "$dry_run" ] && echo ' (dry run)')"

  # Never sync into the wrong directory: the target must already be the site.
  # shellcheck disable=SC2086
  ssh $SSH_OPTS "$DEPLOY_USER@$DEPLOY_HOST" "test -f '$DEPLOY_PATH/index.php'" \
    || die "$DEPLOY_PATH/index.php not found on $DEPLOY_HOST (wrong path, or SSH login failed)"

  stage="$(mktemp -d)"
  trap 'rm -rf "$stage"' EXIT
  git -C "$REPO_ROOT" archive --format=tar HEAD | tar -x -C "$stage"

  set -- --exclude='/data/'
  for keep in ${DEPLOY_KEEP:-}; do
    set -- "$@" --exclude="$keep"
  done

  # shellcheck disable=SC2086
  rsync -rlptzv --delete -e "ssh $SSH_OPTS" "$@" $dry_run "$stage/" "$target"

  if [ -n "${DEPLOY_CHOWN:-}" ] && [ -z "$dry_run" ]; then
    # shellcheck disable=SC2086
    ssh $SSH_OPTS "$DEPLOY_USER@$DEPLOY_HOST" "chown -R '$DEPLOY_CHOWN' '$DEPLOY_PATH'"
  fi
  echo "deploy: done"
}

case "${1:-}" in
  '')              deploy '' ;;
  --dry-run|-n)    deploy '--dry-run' ;;
  --install-hooks) install_hooks ;;
  *)               sed -n '2,20p' "$0" | sed 's/^# \{0,1\}//'; exit 1 ;;
esac
