# Execution Log - 2026-03-09 - Terminology Protocol

## Context

- The project rules already required brief Russian explanations for English terms.
- The user requested a stronger rule: always explain anglicisms, English terms, and also difficult Russian terms.
- Source document: [AGENTS.md](/c:/OSPanel/home/lessons.ru/lessons/AGENTS.md)

## Key Findings

1. The previous wording was too weak and too narrow:
   - it covered English terms only;
   - it did not explicitly cover anglicisms, abbreviations, or difficult Russian formal terms;
   - it did not distinguish explanation from mere transliteration.
2. Without a stricter terminology rule, dense technical language can create false understanding:
   - the term sounds familiar;
   - the function and operational meaning remain unclear;
   - the conversation becomes rhetorically dense but cognitively weak.

## Decisions

1. Add a dedicated `Терминологический протокол` section to [AGENTS.md](/c:/OSPanel/home/lessons.ru/lessons/AGENTS.md).
2. Require explanation at first meaningful use for:
   - English terms;
   - anglicisms;
   - abbreviations;
   - difficult Russian terms.
3. Explicitly forbid treating transliteration as explanation.
4. Prioritize operational explanation:
   - what the term is;
   - why it matters;
   - where it applies;
   - what breaks if it is misunderstood.

## What This Changes

- Future lessons, reviews, and explanations must be more explicit about terminology.
- Dense language without semantic unpacking is now a project-level violation, not just a style weakness.
- Both imported vocabulary and formal Russian vocabulary must now be treated as potential sources of false clarity.

## Next Actions

1. Follow the terminology protocol in all further explanations.
2. When lesson materials are created, explain new terms at first use instead of assuming passive recognition.
