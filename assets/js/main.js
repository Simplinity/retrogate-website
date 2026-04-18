/**
 * RetroGate Website — JavaScript
 * Kept minimal, because JavaScript is just a fad.
 * (Netscape 2.0 users, don't worry, the site works without this.)
 */

document.addEventListener('DOMContentLoaded', () => {

  // --- FAQ Accordion ---
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const wasOpen = item.classList.contains('open');

      // Close all
      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));

      // Toggle current
      if (!wasOpen) {
        item.classList.add('open');
      }
    });
  });

  // --- Smooth scroll for anchor links ---
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // --- Animate stat numbers ---
  const animateCounters = () => {
    document.querySelectorAll('.stat-number[data-target]').forEach(counter => {
      const target = parseInt(counter.dataset.target);
      const suffix = counter.dataset.suffix || '';
      const duration = 2000;
      const start = 0;
      const startTime = performance.now();

      const animate = (currentTime) => {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
        const current = Math.floor(start + (target - start) * eased);
        counter.textContent = current.toLocaleString() + suffix;

        if (progress < 1) {
          requestAnimationFrame(animate);
        }
      };

      requestAnimationFrame(animate);
    });
  };

  // Trigger counter animation when stats section is visible
  const statsSection = document.querySelector('.stats-bar');
  if (statsSection) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    observer.observe(statsSection);
  }

  // --- Easter Egg: Konami Code ---
  const konamiCode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
  let konamiIndex = 0;

  document.addEventListener('keydown', (e) => {
    if (e.keyCode === konamiCode[konamiIndex]) {
      konamiIndex++;
      if (konamiIndex === konamiCode.length) {
        activateEasterEgg();
        konamiIndex = 0;
      }
    } else {
      konamiIndex = 0;
    }
  });

  function activateEasterEgg() {
    const overlay = document.createElement('div');
    overlay.className = 'easter-egg-overlay active';
    overlay.innerHTML = `
      <div style="text-align: center">
        <p style="font-size: 3rem; margin-bottom: 1rem;">&#128190;</p>
        <p>CHEAT CODE ACTIVATED</p>
        <p style="font-size: 1rem; margin-top: 1rem; color: #33ff33;">
          +30 LIVES<br>
          +UNLIMITED BANDWIDTH<br>
          +ALL BROWSERS UNLOCKED<br>
          +GEOCITIES PREMIUM ACCOUNT
        </p>
        <p style="font-size: 0.8rem; margin-top: 2rem; color: #888;">
          (click anywhere to return to 2026)
        </p>
      </div>
    `;
    document.body.appendChild(overlay);
    overlay.addEventListener('click', () => overlay.remove());
  }

  // --- Mobile nav close on link click ---
  document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
      document.querySelector('.nav-links').classList.remove('open');
    });
  });

  // --- Typewriter effect for terminal ---
  document.querySelectorAll('.typewriter').forEach(el => {
    const text = el.textContent;
    el.textContent = '';
    let i = 0;

    function type() {
      if (i < text.length) {
        el.textContent += text.charAt(i);
        i++;
        setTimeout(type, 50 + Math.random() * 50);
      }
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          type();
          observer.unobserve(entry.target);
        }
      });
    });
    observer.observe(el);
  });

  // --- Console welcome message ---
  console.log('%c' +
    '╔══════════════════════════════════════╗\n' +
    '║                                      ║\n' +
    '║     📡 RETROGATE v1.2               ║\n' +
    '║                                      ║\n' +
    '║  You found the dev console!          ║\n' +
    '║  Your vintage Mac would be proud.    ║\n' +
    '║                                      ║\n' +
    '║  Try the Konami code for a surprise. ║\n' +
    '║  ↑↑↓↓←→←→BA                         ║\n' +
    '║                                      ║\n' +
    '╚══════════════════════════════════════╝',
    'color: #d4a017; font-family: monospace; font-size: 12px;'
  );

});
