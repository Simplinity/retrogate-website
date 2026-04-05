# RetroGate Website

The official website for [RetroGate](https://github.com/Simplinity/retrogate) — a macOS proxy server that lets vintage Macs and PCs browse the modern web.

## Stack

- **PHP 8.3** — Because sometimes the classics are classic for a reason
- **HTML/CSS** — With zero JavaScript frameworks (we practice what we preach)
- **Vanilla JS** — A sprinkle of interactivity, FAQ accordions, and a Konami code easter egg

## Structure

```
retrogate-website/
├── index.php              # Landing page
├── manual.php             # Full user manual
├── faq.php                # Frequently Argued Questions
├── contact.php            # Contact form + Guestbook
├── download.php           # Download page
├── includes/
│   ├── header.php         # Shared header + navigation
│   └── footer.php         # Shared footer
├── assets/
│   ├── css/
│   │   └── style.css      # All styles (retro + modern)
│   └── js/
│       └── main.js        # Minimal JS (FAQ accordion, counters, Konami code)
├── downloads/
│   └── MANUAL.md          # Downloadable manual
├── .gitignore
└── README.md
```

## Design Philosophy

The website embraces a "retro meets modern" aesthetic:

- **CRT scanlines** and **phosphor glow** effects
- **Amber/gold color palette** reminiscent of vintage terminals
- **VT323 pixel font** for headings mixed with **Playfair Display** for editorial elegance
- **ASCII art** computer illustration
- **Scrolling marquee** (because it's 1997 and we can)
- **"Under Construction" banner** (permanently)
- **Fake visitor counter** (generating random numbers since 2025)
- **Konami code easter egg** (↑↑↓↓←→←→BA)

## Running Locally

```bash
# PHP built-in server
cd retrogate-website
php -S localhost:8000

# Then open http://localhost:8000
```

## Deployment

Any PHP 8.3+ hosting will work. Apache, Nginx, or even a Raspberry Pi (ironic, since RetroGate itself requires macOS).

## Best Viewed With

- Any modern browser (we're not *that* retro)
- But spiritually best viewed with Netscape Navigator 3.0 at 800×600

## License

GPLv3 — same as RetroGate itself.

---

*This website weighs less than a single modern cookie consent banner.*
