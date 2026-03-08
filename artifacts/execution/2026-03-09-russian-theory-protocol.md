# Execution Log - 2026-03-09 - Russian Theory Protocol

## Context

- The user requested that theoretical learning must go in Russian.
- The request applied not only to a rule, but also to the active learning materials already present in the project.
- Sources:
  - [AGENTS.md](/c:/OSPanel/home/lessons.ru/lessons/AGENTS.md)
  - [unit-1-1-types-and-type-system.md](/c:/OSPanel/home/lessons.ru/lessons/notes/lessons/phase-1/unit-1-1-types-and-type-system.md)
  - [TypeExplorer.php](/c:/OSPanel/home/lessons.ru/lessons/src/Phase1/TypeExplorer.php)
  - [type-explorer.php](/c:/OSPanel/home/lessons.ru/lessons/bin/type-explorer.php)

## Key Findings

1. The project already required explaining English terms, but it did not require that theoretical teaching itself be conducted in Russian.
2. The active Unit 1.1 lesson pack was still written in English.
3. The active CLI learning tool also used English prompts and English explanations, which meant the practical part of the lesson contradicted the desired language model.

## Decisions

1. Add a dedicated `Язык теоретического обучения` section to [AGENTS.md](/c:/OSPanel/home/lessons.ru/lessons/AGENTS.md).
2. Require theory-facing materials to be Russian-first:
   - lesson packs;
   - conceptual notes;
   - guided exercises;
   - blind reconstruction prompts;
   - learner-facing script prompts and explanations.
3. Keep English only where it is structurally necessary:
   - syntax;
   - code identifiers;
   - standards;
   - original technical terms with explanation.
4. Translate the currently active lesson and CLI teaching flow into Russian.

## What This Changes

- The project now distinguishes clearly between:
  - the language of code, which may remain English where appropriate;
  - the language of theoretical learning, which must now be Russian.
- Active learning materials now match the project rule set instead of violating it.

## Next Actions

1. Keep future lesson packs Russian-first.
2. When adding new learning scripts, make all learner-facing text Russian by default.
