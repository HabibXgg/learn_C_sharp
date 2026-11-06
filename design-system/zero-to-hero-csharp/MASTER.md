# Zero to Hero with C# — Design system

Status: applied to the PHP MVP, 14 September 2026.

## Source and interpretation

Guidance: `D:/Habib/ui-ux-pro-max-skill/.claude/skills/ui-ux-pro-max/SKILL.md` and its web quick reference.

Design-system searches were run for `education learning platform roadmap`, then narrowed to `developer documentation learning platform`. The first search's children's typography/clay treatment was rejected. The second returned Minimalism & Swiss Style, IBM Plex Sans / JetBrains Mono, readable documentation navigation, and restrained interactions. Its support-desk conversion pattern and API-specific rules do not apply to this learning product. The implementation uses the verified typography and layout principles, adapted to the roadmap journey in the PRD.

Blazor/PHP are not available stack presets in the skill. Stack-independent web guidance applies; no React or WPF preset is treated as PHP guidance.

## Visual direction

A calm programming workbook: permanent navigation on desktop, a four-stage vertical learning route, short contextual introduction, and readable article pages. Purple identifies the C# learning brand; the code preview is an actual small C# example. No photographs or decorative raster images are required.

| Role | Value |
| --- | --- |
| Primary / CTA | `#6D42D8` with white text |
| Primary hover | `#5730BC` |
| Text | `#222334` |
| Secondary text | `#5C5D70` |
| Page | `#FAFAFB` |
| Surface | `#FFFFFF` |
| Analogy surface | `#F4EFFA` |
| Code surface | `#252034` |
| Heading and body | IBM Plex Sans, system fallback |
| Code and small technical labels | JetBrains Mono, Consolas fallback |

## Components and interaction

- Sidebar groups product pages and learning stages; current links have a visual selected state.
- Native details/summary expands each stage and discloses exercise solutions.
- Every topic links to a server-rendered PHP article with objectives, explanations, analogy, code, exercise, solution, takeaways, and a source.
- Search and category filters use shareable GET links and work without JavaScript.
- Articles keep a readable column, with an optional desktop table of contents.
- Mobile navigation includes keyboard trapping, Escape, backdrop close, and focus restoration.
- SVG controls use a consistent outline weight, accessible labels, and hidden decorative icons.
- Reduced-motion preference removes transitions. Main prose is 16px or larger; smaller text is reserved for navigation and metadata.

## Learning expansion and motion

Applied in the second iteration at the user's request. The curriculum now contains 40 lessons. New article structure alternates explanations with code, optional concept visualization, walkthrough, deeper sections, common mistakes, tiered practice, and official references.

- Five prepared concept demonstrations illustrate variables, loops, object references, LINQ, and async/await. Each includes a separate complete runnable C# example to distinguish it from the main lesson code.
- Play/pause and previous/next controls belong to the reader. Playback stops at the end, when the demo leaves view, when the page is hidden, or when motion is disabled.
- Step panels share a grid cell and preserve the largest panel's layout height, preventing content beneath the demonstration from jumping.
- A global animation switch remembers a device-local preference. The operating system's reduced-motion preference takes priority. Stepping through content remains available with movement disabled.
- Entry motion runs once, uses only opacity/transform, and never starts by hiding essential content. Plain explanatory paragraphs remain still. No autoplay loop or animated background is used.
- A thin reading-position indicator and current section highlight help navigate longer articles; neither represents course completion.
- Motion guidance was searched with `animation reduced motion --domain ux`. It returned reduced-motion, excessive-motion, and context-sensitive duration guidelines. Native Web Animations and Intersection Observer avoid adding a client library.

## Product boundaries

MVP includes written practice and collapsible explanations. Progress, quiz scoring, code execution, accounts, dark-mode switching, and certificates belong to later phases; the interface does not claim they already exist.

## Verification targets

Check 375, 768, 1024 and 1440px layouts, no page overflow, keyboard navigation, visible focus, search empty states, unknown routes, escaped query text, and source links. Code may scroll horizontally within its own panel. Font loading may fall back to local system fonts without blocking content.
