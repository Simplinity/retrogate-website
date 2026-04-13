# RetroGate Design System & Style Guide

**"Beige Is Beautiful" Edition** — A love letter to 1997, written in 2026.

This document is the single source of truth for every design decision, color, typeface, spacing value, component pattern, animation, and responsive behavior used across the RetroGate website. It exists so that anyone touching the codebase can maintain visual consistency without reverse-engineering the CSS.

---

## Table of Contents

1. [Design Principles](#1-design-principles)
2. [Design Tokens (CSS Custom Properties)](#2-design-tokens)
3. [Typography](#3-typography)
4. [Layout](#4-layout)
5. [Color Usage](#5-color-usage)
6. [Component Catalog](#6-component-catalog)
7. [Animations & Transitions](#7-animations--transitions)
8. [Visual Effects](#8-visual-effects)
9. [Responsive Design](#9-responsive-design)
10. [Print Styles](#10-print-styles)
11. [JavaScript Behaviors](#11-javascript-behaviors)
12. [Assets](#12-assets)

---

## 1. Design Principles

### The Tension: Retro Meets Modern

The website deliberately channels a **1997 web aesthetic** — scanlines, marquees, blinking text, visitor counters, "Under Construction" banners — but implements everything with **modern CSS**: custom properties, `clamp()` fluid typography, CSS Grid, `position: sticky`, `scroll-behavior: smooth`. The result should feel authentically vintage to someone who remembers dial-up, while being fully responsive, accessible, and performant.

### The CRT Terminal Aesthetic

The dark sections (navigation, hero, stats bar, footer, CTA) simulate an **amber phosphor CRT monitor**: charcoal backgrounds with warm amber/gold text, subtle scanline overlays, radial glow effects, and blinking cursors. This is the site's most distinctive visual signature.

### Editorial Warmth

The light sections use a **warm beige/cream palette** with the serif display font Playfair Display — evoking a vintage newspaper or book. This creates contrast with the terminal-dark sections and prevents the site from feeling cold or one-note.

### Zero Frameworks

The site uses **vanilla JS only** (`assets/js/main.js`, 161 lines). No React, no build step, no bundler. The site is fully functional without JavaScript — JS adds progressive enhancements like FAQ accordions, animated counters, and the Konami code easter egg.

### Accessibility Notes

- Scanline and noise overlays use `pointer-events: none` and extremely low opacity (`0.03` and `0.015`), so they're atmospheric but non-interfering.
- All animations use `step-end` timing (instant on/off) rather than smooth fades, to authentically replicate CRT behavior. These do not trigger motion sensitivity issues at their low frequencies (0.5–1 Hz).
- Text contrast meets WCAG AA: amber-glow (`#ffcc33`) on charcoal (`#2c2c2c`) = 9.2:1 ratio; charcoal on beige (`#f5f0e1`) = 11.7:1 ratio.
- The `max-width: 65ch` on paragraphs ensures comfortable reading line lengths.

---

## 2. Design Tokens

All design tokens live as CSS custom properties in the `:root` selector of `assets/css/style.css`.

### 2.1 Colors

#### Warm Palette (Primary)

| Token             | Hex       | Role                                                    |
|-------------------|-----------|---------------------------------------------------------|
| `--beige`         | `#f5f0e1` | Primary background (body, light sections)               |
| `--beige-dark`    | `#e8e0cc` | Secondary background, borders, alternating rows         |
| `--cream`         | `#faf8f0` | Accent background (features, testimonials, form inputs) |
| `--amber`         | `#d4a017` | Primary accent — borders, icons, interactive highlights |
| `--amber-glow`    | `#ffcc33` | Bright accent — text on dark, logo, glow effects        |
| `--amber-dark`    | `#b8860b` | Darker gold — sub-headings, links on light backgrounds  |
| `--brown`         | `#5c4033` | Primary text color for headings and borders              |
| `--brown-light`   | `#8b6914` | Secondary headings, taglines                            |

#### Dark Palette

| Token         | Hex       | Role                                  |
|---------------|-----------|---------------------------------------|
| `--charcoal`  | `#2c2c2c` | Dark backgrounds (nav, hero, footer)  |
| `--black`     | `#1a1a1a` | Near-black (easter egg overlay)       |
| `--white`     | `#ffffff` | Pure white (card backgrounds, text)   |

#### Accent Colors

| Token            | Hex       | Role                                           |
|------------------|-----------|-------------------------------------------------|
| `--green-crt`    | `#33ff33` | CRT phosphor green — **easter egg only**        |
| `--green-dim`    | `#1a8c1a` | Darker green variant (reserved)                 |
| `--blue-link`    | `#0000ee` | Default link color (classic web blue)           |
| `--blue-visited` | `#551a8b` | Visited link color (classic web purple)         |
| `--purple-retro` | `#663399` | Retro purple (reserved)                         |
| `--red-error`    | `#cc0000` | Errors, `.badge-new` background on light areas  |

> **Note on `--green-crt`:** This neon green is reserved exclusively for the Konami code easter egg overlay, where green-on-black recreates a "hacker terminal" joke. It should **not** be used in the main UI — the warm amber palette should be used instead for any attention-grabbing elements on dark backgrounds.

### 2.2 Layout Tokens

| Token                | Value  | Role                                             |
|----------------------|--------|--------------------------------------------------|
| `--pixel-border`     | `3px`  | Standard border width throughout the site        |
| `--scanline-opacity` | `0.03` | Opacity of the global scanline overlay           |
| `--max-width`        | `960px`| Container max-width                              |
| `--gutter`           | `2rem` | Horizontal padding on containers (32px)          |

### 2.3 Typography Tokens

| Token            | Value                                                      | Role                          |
|------------------|------------------------------------------------------------|-------------------------------|
| `--font-display` | `'Playfair Display', Georgia, 'Times New Roman', serif`    | Headings, editorial text      |
| `--font-mono`    | `'VT323', 'IBM Plex Mono', 'Courier New', monospace`      | Monospace contexts            |
| `--font-body`    | `'Space Mono', 'IBM Plex Mono', monospace`                 | Body text, form inputs        |
| `--font-pixel`   | `'VT323', monospace`                                       | Pixel text, nav, buttons, UI  |

---

## 3. Typography

### 3.1 Font Loading

All fonts are loaded from Google Fonts in a single `@import` at the top of `style.css`:

```
Fonts loaded:
- VT323                     (pixel/terminal font)
- Space Mono                (normal, bold, italic)
- Playfair Display          (400, 700, 900 + italic)
- IBM Plex Mono             (400, 500, 700)
```

### 3.2 Heading Scale

Headings use `--font-display` (Playfair Display), weight `900`, line-height `1.2`, color `--brown`.

| Level | Size                           | Margin-bottom |
|-------|--------------------------------|---------------|
| `h1`  | `clamp(2.5rem, 5vw, 4rem)`    | `1rem`        |
| `h2`  | `clamp(1.8rem, 3.5vw, 2.5rem)`| `0.8rem`      |
| `h3`  | `clamp(1.3rem, 2.5vw, 1.8rem)`| `0.6rem`      |

**Hero h1 override:** `clamp(3rem, 7vw, 5.5rem)`, color `--white`, text-shadow `0 0 40px rgba(212, 160, 23, 0.3)`.

### 3.3 Body Text

| Property     | Value                   |
|--------------|-------------------------|
| Font family  | `var(--font-body)`      |
| Font size    | `16px` (base `1rem`)    |
| Line height  | `1.7`                   |
| Color        | `var(--charcoal)`       |
| Max width    | `65ch` (paragraphs)     |
| Margin       | `1.2rem` bottom (paragraphs) |

### 3.4 Link Styles

| State     | Color                | Decoration                               |
|-----------|----------------------|------------------------------------------|
| Default   | `--blue-link`        | `underline`, `text-underline-offset: 3px`|
| Visited   | `--blue-visited`     | `underline`                              |
| Hover     | `--amber-dark`       | `text-decoration-style: wavy`            |

**Exception:** Links in manual, FAQ, and contact pages use `--amber-dark` for all states, with `--amber` on hover.

### 3.5 Code & Pre Blocks

| Property         | Value                                              |
|------------------|----------------------------------------------------|
| Font family      | `var(--font-pixel)`                                |
| Font size        | `1.1em`                                            |
| Pre background   | `var(--charcoal)`                                  |
| Pre text color   | `var(--amber-glow)`                                |
| Pre padding      | `1.5rem`                                           |
| Pre border       | `3px solid var(--brown)`                           |
| Pre border-radius| `0` (square corners — always)                      |
| Pre shadow       | `inset 0 0 30px rgba(212, 160, 23, 0.05)`         |
| Pre margin       | `1.5rem 0`                                         |
| `::before`       | `'$ '` prompt in `--amber` (except `.ascii-computer`) |

---

## 4. Layout

### 4.1 Container

```css
.container {
  max-width: var(--max-width);   /* 960px */
  margin: 0 auto;
  padding: 0 var(--gutter);     /* 0 2rem */
}
```

### 4.2 Spacing Scale

| Context               | Padding/Margin              |
|-----------------------|-----------------------------|
| Sections (vertical)   | `5rem 0` (80px)             |
| Page content          | `3rem 0 5rem`               |
| Section headers       | `margin-bottom: 3rem`       |
| Component gaps (grid) | `2rem` (`gap`)              |
| Card padding          | `2rem` to `2.5rem`          |
| Form groups           | `margin-bottom: 1.5rem`     |
| Footer                | `3rem 0 2rem`               |

### 4.3 Grid Patterns

| Component         | Grid Definition                                    |
|-------------------|----------------------------------------------------|
| Feature grid      | `repeat(auto-fit, minmax(280px, 1fr))`, gap `2rem` |
| Quote grid        | `repeat(auto-fit, minmax(280px, 1fr))`, gap `2rem` |
| Stats grid        | `repeat(4, 1fr)`, gap `2rem`                       |
| Footer grid       | `2fr 1fr 1fr`, gap `3rem`                          |
| Wayback inner     | `1fr 1fr`, gap `4rem`                              |
| Steps             | `1fr` (single column), gap `2.5rem`                |

### 4.4 Border System

| Usage                | Width | Style   | Color             |
|----------------------|-------|---------|-------------------|
| Primary borders      | `3px` | `solid` | `var(--amber)`    |
| Card/component       | `3px` | `solid` | `var(--beige-dark)`|
| Section dividers     | `3px` | `solid` | `var(--beige-dark)`|
| Major divisions      | `4px` | `solid` | `var(--amber)`    |
| Tables (outer)       | `3px` | `solid` | `var(--brown)`    |
| Table cells          | `1px` | `solid` | `var(--beige-dark)`|
| Footer separator     | `1px` | `solid` | `#444`            |
| Accent left border   | `4-5px`| `solid`| `var(--amber)`    |

**Border-radius: `0` everywhere.** Square corners are a deliberate design choice — this is 1997.

### 4.5 Shadow System

| Usage                | Value                                            |
|----------------------|--------------------------------------------------|
| Feature card hover   | `6px 6px 0 var(--beige-dark)` (offset, no blur)  |
| Form input focus     | `0 0 0 3px rgba(212, 160, 23, 0.2)` (amber glow)|
| Pre/code blocks      | `inset 0 0 30px rgba(212, 160, 23, 0.05)`       |
| Hero h1              | `0 0 40px rgba(212, 160, 23, 0.3)` (text)       |
| Logo                 | `0 0 10px rgba(212, 160, 23, 0.5)` (text)       |
| Stat numbers         | `0 0 15px rgba(212, 160, 23, 0.4)` (text)       |
| Wayback terminal     | `0 0 5px rgba(212, 160, 23, 0.3)` (text)        |
| Easter egg overlay   | `0 0 20px rgba(51, 255, 51, 0.8)` (text, green) |

---

## 5. Color Usage

### 5.1 Dark Sections (Charcoal Background)

Used in: Navigation, Hero, Stats Bar, CTA Section, Footer, Page Headers, Marquee, pre/code blocks, Wayback terminal.

| Element         | Color                                      |
|-----------------|--------------------------------------------|
| Background      | `--charcoal` (`#2c2c2c`)                   |
| Primary text    | `--amber-glow` (`#ffcc33`)                 |
| Secondary text  | `--beige-dark` (`#e8e0cc`) or `--beige`    |
| Muted text      | `#b0a890`, `#888`, `#666`                  |
| Accent borders  | `--amber` (`#d4a017`)                      |
| Links           | `--amber` or `--amber-glow`                |

### 5.2 Light Sections (Beige/Cream Background)

Used in: Body, Features, Browsers, How-It-Works, Wayback text, Manual, FAQ, Contact.

| Element         | Color                                      |
|-----------------|--------------------------------------------|
| Background      | `--beige` or `--cream`                     |
| Primary text    | `--charcoal` or `--brown`                  |
| Headings        | `--brown` (`#5c4033`)                      |
| Sub-headings    | `--amber-dark` (`#b8860b`)                 |
| Taglines        | `--brown-light` (`#8b6914`), italic        |
| Links           | `--blue-link` (general) / `--amber-dark` (manual/faq/contact) |
| Muted text      | `#666`, `#999`                             |
| Card backgrounds| `--white`                                  |
| Borders         | `--beige-dark`                             |

### 5.3 Hardcoded Colors

These colors are used directly without variables:

| Hex       | Usage                                        |
|-----------|----------------------------------------------|
| `#888`    | Button border-color, footer brand text       |
| `#666`    | Feature card body text, step descriptions, footer bottom text |
| `#999`    | Breadcrumb text, field hints, guestbook dates|
| `#aaa`    | Footer link text                             |
| `#444`    | Footer bottom separator border               |
| `#b0a890` | Hero description text                        |
| `#33ff33` | Easter egg inline green (in JS `main.js`)    |

---

## 6. Component Catalog

### 6.1 Marquee (`.retro-marquee`)

A scrolling text banner — because it's 1997.

```
Background:     --charcoal
Text color:     --amber-glow
Font:           --font-pixel, 1rem
Padding:        0.4rem 0
Border-bottom:  2px solid --amber
Animation:      marquee 30s linear infinite (translateX 0 to -100%)
Overflow:       hidden
White-space:    nowrap
```

### 6.2 Navigation (`.site-nav`)

Sticky top navigation bar with amber accents on a charcoal background.

```
Position:       sticky, top: 0, z-index: 1000
Background:     --charcoal
Border-bottom:  3px solid --amber
Height:         60px (via .nav-inner)
Layout:         Flex, space-between, center-aligned
```

**Logo (`.nav-logo`):**
```
Font:           --font-pixel, 1.8rem
Color:          --amber-glow
Letter-spacing: 2px
Text-shadow:    0 0 10px rgba(212, 160, 23, 0.5)
Animation:      pulse-glow 2s ease-in-out infinite
Icon:           28×28px amber star (clip-path polygon)
```

**Nav Links (`.nav-links a`):**
```
Font:           --font-pixel, 1.2rem
Color:          --beige (default), --amber-glow (hover/active)
Padding:        0.5rem 1rem
Letter-spacing: 1px
Decoration:     none
```

**Mobile Toggle (`.nav-toggle`):**
```
Display:        none (shown at ≤768px)
Border:         2px solid --amber
Color:          --amber-glow
Font:           --font-pixel, 1.5rem
```

### 6.3 Hero Section (`.hero`)

The flagship section — CRT glow, grid pattern, badge, and ASCII art.

```
Background:     --charcoal
Padding:        5rem 0 4rem
Border-bottom:  4px solid --amber
Text-align:     center (hero-content)
Overflow:       hidden
Position:       relative
```

**Pseudo-elements:**
- `::before` — CRT glow: radial-gradient amber at 0.08 opacity, positioned -50% (200% size)
- `::after` — Grid background: crosshatch linear-gradients at 30px intervals, amber at 0.05 opacity

**Hero Badge (`.hero-badge`):**
```
Font:           --font-pixel, 0.9rem
Color:          --amber-glow
Border:         1px solid --amber
Padding:        0.3rem 1rem
Letter-spacing: 3px
Text-transform: uppercase
Animation:      flicker 3s infinite
```

**Hero Subtitle (`.hero-subtitle`):**
```
Font:           --font-display, italic, 400 weight
Size:           clamp(1.1rem, 2.5vw, 1.5rem)
Color:          --beige-dark
```

**Hero Description (`.hero-description`):**
```
Font:           --font-body, 1rem
Color:          #b0a890
Max-width:      600px
Line-height:    1.8
```

**ASCII Computer (`.ascii-computer`):**
```
Font:           --font-pixel, clamp(0.5rem, 1.2vw, 0.85rem)
Color:          --amber
Line-height:    1.15
Opacity:        0.6
Display:        none at ≤768px
```

### 6.4 Buttons (`.btn`)

Three variants, all sharing a base style. No border-radius.

**Base (`.btn`):**
```
Font:           --font-pixel, 1.2rem
Padding:        0.8rem 2rem
Border:         3px solid
Letter-spacing: 2px
Text-transform: uppercase
Cursor:         pointer
Transition:     all 0.15s ease
Display:        inline-block
```

| Variant          | Background    | Color       | Border-color  | Hover BG   | Hover Color |
|------------------|---------------|-------------|---------------|------------|-------------|
| `.btn-primary`   | `--amber`     | `--charcoal`| `#888`        | `--beige`  | `--black`   |
| `.btn-secondary` | `transparent` | `--beige`   | `#888`        | `--beige`  | `--black`   |
| `.btn-on-light`  | `transparent` | `--brown`   | `--brown`     | `--brown`  | `--cream`   |

**CTA group (`.hero-cta-group`):** Flex row, gap `1rem`, center-justified, wraps.

### 6.5 Feature Cards (`.feature-card`)

Interactive cards with a top-bar reveal on hover.

```
Background:     --white
Border:         3px solid --beige-dark
Padding:        2rem
Transition:     all 0.2s ease
```

**Hover state:**
```
Transform:      translateY(-3px)
Box-shadow:     6px 6px 0 var(--beige-dark)
```

**Top bar (`::before`):**
```
Height:         4px
Background:     --amber
Transform:      scaleX(0) → scaleX(1) on hover
Transition:     transform 0.3s ease
Origin:         left
Position:       absolute, top: -3px, left: -3px, right: -3px
```

**Icon (`.feature-icon`):** `--font-pixel`, `2.2rem`, `--amber`
**Title (`.feature-card h3`):** `--font-pixel`, `1.4rem`, `--amber-dark`
**Text (`.feature-card p`):** `0.9rem`, `#666`, line-height `1.7`

**Grid (`.feature-grid`):** `repeat(auto-fit, minmax(280px, 1fr))`, gap `2rem`

### 6.6 Stats Bar (`.stats-bar`)

Animated counter section with the CRT terminal look.

```
Background:     --charcoal
Padding:        2rem 0
Border:         3px solid --amber (top and bottom)
Grid:           repeat(4, 1fr), gap 2rem
```

**Numbers (`.stat-number`):** `2.5rem`, `--amber-glow`, text-shadow glow
**Labels (`.stat-label`):** `0.9rem`, `--beige-dark`, uppercase, letter-spacing `2px`

### 6.7 Retro Table (`.retro-table`)

Used for browser compatibility and system requirements.

```
Border-collapse: collapse
Border:          3px solid --brown
Font:            --font-body, 0.9rem
```

**Header:** `--charcoal` background, `--amber-glow` text, `--font-pixel`, letter-spacing `1px`
**Cells:** `0.7–0.8rem` padding, `1px solid --beige-dark` border
**Alternating rows:** Even rows get `--cream` background

### 6.8 Quote Cards (`.quote-card`)

Testimonial cards with a decorative quotation mark.

```
Background:     --white
Border:         2px solid --beige-dark
Border-left:    5px solid --amber
Padding:        2.5rem 2rem 2rem
```

**Decorative quote (`::before`):** `\201C` (left double quote), Playfair `4rem`, `--amber` at `0.3` opacity, positioned `top: 8px; left: 15px`
**Quote text:** italic, `--font-display`, `1rem`, `--brown`
**Attribution (`.attribution`):** `--font-pixel`, `0.9rem`, `--amber-dark`

### 6.9 How-It-Works Steps (`.step`)

CSS counter-driven numbered steps.

```
Counter:        counter-reset on .steps, counter-increment on .step
Text-align:     center
```

**Number circle (`::before`):**
```
Size:           60×60px
Background:     --charcoal
Color:          --amber-glow
Font:           --font-pixel, 2rem
Border:         3px solid --amber
Display:        flex, center-aligned
```

**Title:** `--font-pixel`, `--amber-dark`
**Text:** `0.9rem`, `#666`, max-width `500px`

### 6.10 CTA Section (`.cta-section`)

Call-to-action section with dark background.

```
Background:     --charcoal
Padding:        5rem 0
Text-align:     center
Border:         3px solid --amber (top and bottom)
Heading:        --white
Body:           --beige-dark, max-width 600px
```

### 6.11 Under-Construction Banner (`.construction-banner`)

Diagonal striped caution banner.

```
Background:     repeating-linear-gradient(45deg,
                  --amber 0 20px,
                  --charcoal 20px 40px)
Padding:        0.6rem 0
Text-align:     center
```

**Inner span:**
```
Background:     --charcoal
Color:          --amber-glow
Font:           --font-pixel, 0.9rem
Padding:        0.3rem 1.5rem
Letter-spacing: 2px
```

### 6.12 Footer (`.site-footer`)

```
Background:     --charcoal
Padding:        3rem 0 2rem
Font:           --font-body, 0.85rem
Color:          --beige-dark
```

**Grid:** `2fr 1fr 1fr`, gap `3rem`
**Brand logo text:** `--font-pixel`, `1.5rem`, `--amber-glow`
**Brand description:** `#888`, `--font-body`, `0.8rem`
**Link headers:** `--font-pixel`, `--amber`, `1.1rem`
**Links:** `#aaa`, no decoration, hover `--amber-glow`
**Bottom separator:** `1px solid #444`, flex space-between
**Visitor counter:** `--font-pixel`, `#666`, `0.9rem`, letter-spacing `2px`

### 6.13 Page Header (`.page-header`)

Used on all sub-pages (manual, FAQ, download, contact).

```
Background:     --charcoal
Padding:        3rem 0
Border-bottom:  4px solid --amber
Text-align:     center
h1:             --white, --font-display, text-shadow amber glow
Subtitle:       --font-display, italic, --beige-dark, 1.1rem
```

### 6.14 Breadcrumb (`.breadcrumb`)

```
Font:           --font-pixel, 0.9rem
Color:          #999
Links:          --amber-dark
Padding:        0.8rem 0
```

### 6.15 Manual Content (`.manual-content`)

```
Max-width:      750px
Padding:        3rem --gutter 5rem
```

**h1:** bottom border `3px solid --amber`, `1rem` padding, `2rem` margin
**h2:** `3rem` top margin, left border `5px solid --amber`, `1rem` padding-left
**h3:** `--amber-dark` color
**Links:** `--amber-dark`, hover `--amber`
**Tables:** same as `.retro-table` but with `2px` outer border

**Table of Contents (`.manual-toc`):**
```
Background:     --cream
Border:         3px solid --beige-dark
Padding:        2rem
h3:             --font-pixel, --amber-dark, border-bottom 2px --beige-dark
Links:          0.95rem
```

### 6.16 Download Bar (`.download-bar`)

```
Background:     --cream
Border:         3px solid --amber
Padding:        1.5rem 2rem
Layout:         Flex, space-between, center, wraps
Text:           --font-pixel, 1.1rem, --brown
```

### 6.17 FAQ Accordion (`.faq-item`)

```
Container:      2px solid --beige-dark, --white background
```

**Question button (`.faq-question`):**
```
Width:          100%
Text-align:     left
Padding:        1.2rem 1.5rem (3rem right for icon)
Background:     --cream
Font:           --font-display, 1.15rem, 700, --brown
Border-bottom:  2px solid --beige-dark
Cursor:         pointer
```

**Toggle icon (`::after`):** `+` (closed) / `-` (open), `--font-pixel`, `1.5rem`, `--amber`

**Answer (`.faq-answer`):** padding `1.5rem`, `display: none`, shown on `.open`

### 6.18 Contact Form (`.retro-form`)

```
Background:     --white
Border:         3px solid --beige-dark
Padding:        2.5rem
Max-width:      650px (from .contact-content)
```

**Labels:** `--font-pixel`, `1.1rem`, `--brown`, letter-spacing `1px`
**Inputs/Textarea/Select:**
```
Width:          100%
Padding:        0.8rem 1rem
Font:           --font-body, 0.95rem
Background:     --cream
Border:         2px solid --beige-dark
Focus:          box-shadow 0 0 0 3px rgba(212, 160, 23, 0.2)
```
**Textarea:** min-height `150px`, resize vertical
**Hints:** `--font-pixel`, `0.8rem`, `#999`

### 6.19 Wayback Terminal (`.wayback-visual`)

Simulated terminal window with scanline overlay.

```
Background:     --charcoal
Border:         3px solid --brown
Padding:        2rem
Font:           --font-pixel
Color:          --amber-glow
Text-shadow:    0 0 5px rgba(212, 160, 23, 0.3)
```

**Scanline pseudo-element (`::before`):** repeating linear-gradient at `0.15` opacity (heavier than global)
**Terminal lines:** `1rem`, `0.3rem` margin-bottom
**Cursor:** `10px × 1.2em`, `--amber-glow` background, `blink 1s step-end infinite`

**Container (`.wayback-inner`):** 2-column grid, gap `4rem`

### 6.20 Guestbook Entries (`.guestbook-entry`)

```
Background:     --white
Border:         2px solid --beige-dark
Border-left:    4px solid --amber
Padding:        1rem 1.5rem
Margin-bottom:  1rem
```

**Name:** `--font-pixel`, `1rem`, `--amber-dark`
**Date:** `0.75rem`, `#999`, `--font-pixel`
**Text:** `0.9rem`, top margin `0.5rem`

### 6.21 Badge New (`.badge-new`)

Red badge for marking new items on **light backgrounds**.

```
Display:        inline-block
Background:     --red-error
Color:          --white
Font:           --font-pixel, 0.7rem
Padding:        0.1rem 0.5rem
Letter-spacing: 1px
Text-transform: uppercase
Vertical-align: super
Animation:      retro-blink-anim 2s step-end infinite
Margin-left:    0.3rem
```

> **On dark backgrounds:** Use inline `color: var(--amber-glow)` with `animation: blink 1s step-end infinite` instead of the `.badge-new` class.

### 6.22 Easter Egg Overlay (`.easter-egg-overlay`)

```
Position:       fixed, inset: 0
Background:     --black
Z-index:        10000
Color:          --green-crt
Font:           --font-pixel, 2rem
Text-shadow:    0 0 20px rgba(51, 255, 51, 0.8)
Text-align:     center
Display:        none → flex (on .active)
```

### 6.23 Retro Blink (`.retro-blink`)

Utility class for blinking text.

```
Animation:      retro-blink-anim 1.5s step-end infinite
```

---

## 7. Animations & Transitions

### 7.1 Keyframe Animations

| Name               | Duration | Timing        | Effect                                  |
|--------------------|----------|---------------|-----------------------------------------|
| `marquee`          | `30s`    | `linear`      | `translateX(0)` → `translateX(-100%)`   |
| `pulse-glow`       | `2s`     | `ease-in-out` | Opacity `0.7` → `1` → `0.7`            |
| `flicker`          | `3s`     | `default`     | CRT flicker at 92–97% (opacity drops)   |
| `blink`            | `1s`     | `step-end`    | Opacity `1` → `0` at 50% (hard toggle)  |
| `retro-blink-anim` | `1.5s`   | `step-end`    | Opacity `1` → `0` at 50% (hard toggle)  |

### 7.2 Transition Defaults

| Context                       | Transition               |
|-------------------------------|--------------------------|
| Links, nav links, form inputs | `all 0.2s ease`          |
| Buttons                       | `all 0.15s ease`         |
| Feature card                  | `all 0.2s ease`          |
| Feature card top bar          | `transform 0.3s ease`    |
| FAQ toggle icon               | `transform 0.3s`         |
| Footer links                  | `color 0.2s`             |

---

## 8. Visual Effects

Four layered atmospheric effects create the CRT monitor feel:

### 8.1 Global Scanline Overlay (`body::before`)

```
Position:   fixed, full viewport
Z-index:    9999
Pattern:    repeating-linear-gradient(0deg,
              transparent 0–2px,
              rgba(0,0,0,0.03) 2–4px)
Pointer:    none
```

Creates fine horizontal lines across the entire page.

### 8.2 Noise Texture (`body::after`)

```
Position:   fixed, full viewport
Z-index:    9998
Pattern:    SVG fractalNoise (baseFrequency 0.9, 4 octaves)
Opacity:    0.015
Pointer:    none
```

Adds subtle film grain texture.

### 8.3 CRT Glow (`hero::before`)

```
Position:   absolute, -50% offset (200% size)
Pattern:    radial-gradient(ellipse at center,
              rgba(212,160,23,0.08), transparent 60%)
Pointer:    none
```

Creates a warm amber light bloom in the center of the hero.

### 8.4 Grid Background (`hero::after`)

```
Position:   absolute, inset: 0
Pattern:    Two linear-gradients at 0° and 90°
            rgba(212,160,23,0.05) 1px lines
Size:       30px × 30px
Pointer:    none
```

Creates a retro grid paper effect behind the hero content.

### 8.5 Wayback Terminal Scanlines (`wayback-visual::before`)

Same pattern as global scanlines but at **0.15 opacity** (5× stronger) for an authentic terminal look within the Wayback visual component.

---

## 9. Responsive Design

### 9.1 Breakpoint: 768px (Tablet / Small Desktop)

| Component        | Change                                              |
|------------------|-----------------------------------------------------|
| Navigation       | Hamburger toggle appears; nav links become column, positioned absolute below nav, hidden by default |
| Hero h1          | Falls to `2.5rem`                                   |
| Stats grid       | `1fr` (single column)                               |
| Footer grid      | `1fr` (single column)                               |
| Wayback inner    | `1fr` (single column)                               |
| ASCII computer   | `display: none`                                     |
| Download bar     | Flex column, centered                               |
| Footer bottom    | Flex column, centered                               |

### 9.2 Breakpoint: 480px (Small Mobile)

| Component        | Change                                              |
|------------------|-----------------------------------------------------|
| Hero             | Padding reduced to `3rem 0 2rem`                    |
| CTA group        | Flex column, centered                               |
| Buttons          | `width: 100%; max-width: 280px`                     |
| Stats grid       | `1fr 1fr` (two columns), gap `1rem`                 |

---

## 10. Print Styles

When printed, the site strips all decorative and navigational elements:

```
Hidden:          body::before, body::after (scanlines/noise)
                 .site-nav, .retro-marquee, .site-footer
                 .construction-banner

Simplified:      .hero → white background, black text, no border
                 .hero h1, h2 → black, no text-shadow
                 Links → black
                 Pre → 1px solid #ccc border
```

---

## 11. JavaScript Behaviors

All behaviors live in `assets/js/main.js` (161 lines). The site works fully without JS — these are progressive enhancements.

| Behavior                 | Trigger                                    | Details                                |
|--------------------------|--------------------------------------------|----------------------------------------|
| **FAQ accordion**        | Click `.faq-question`                      | Exclusive open — clicking one closes all others |
| **Smooth scroll**        | Click any `a[href^="#"]`                   | `scrollIntoView({ behavior: 'smooth' })` |
| **Stat counter animation** | IntersectionObserver on `.stats-bar` (50% threshold) | 2s `easeOutCubic` animation, fires once |
| **Konami code**          | Keyboard sequence ↑↑↓↓←→←→BA              | Shows `.easter-egg-overlay`, click to dismiss |
| **Mobile nav auto-close**| Click any `.nav-links a`                   | Removes `.open` class from nav         |
| **Typewriter effect**    | IntersectionObserver on `.typewriter`       | 50–100ms random delay per character, fires once |
| **Console welcome**      | Page load                                  | ASCII art box with amber color in dev console |

---

## 12. Assets

### 12.1 Images

| File                          | Size    | Usage                  |
|-------------------------------|---------|------------------------|
| `assets/img/favicon-32.png`   | 32×32   | Browser favicon        |
| `assets/img/favicon-64.png`   | 64×64   | Browser favicon (HiDPI)|
| `assets/img/appicon-128.png`  | 128×128 | Social/OG meta image   |
| `assets/img/appicon-256.png`  | 256×256 | Social/OG meta image   |

### 12.2 External Dependencies

| Resource        | Source         | Purpose                              |
|-----------------|----------------|--------------------------------------|
| VT323           | Google Fonts   | Pixel/terminal font                  |
| Space Mono      | Google Fonts   | Body monospace font                  |
| Playfair Display| Google Fonts   | Display serif for headings           |
| IBM Plex Mono   | Google Fonts   | Fallback monospace                   |

No other external dependencies. No CDNs, no frameworks, no build tools.

---

## Quick Reference Card

```
Primary BG:      #f5f0e1  (--beige)
Dark BG:         #2c2c2c  (--charcoal)
Accent:          #d4a017  (--amber)
Bright accent:   #ffcc33  (--amber-glow)
Text (light bg):  #5c4033  (--brown)
Text (dark bg):   #ffcc33  (--amber-glow)

Display font:    Playfair Display (900)
Body font:       Space Mono
Pixel font:      VT323

Container:       960px max
Gutter:          2rem
Border:          3px solid
Border-radius:   0 (always)
Transition:      0.2s ease

Breakpoints:     768px, 480px
```

---

*Last updated: April 2026*
