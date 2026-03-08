# Execution Log - 2026-03-09 - Baseline Review

## Context

- Reviewed baseline answers after the first diagnostic pass.
- Sources:
  - [php-basics-2026-03-08.md](/c:/OSPanel/home/lessons.ru/lessons/artifacts/baseline/answers/php-basics-2026-03-08.md)
  - [code-reading-2026-03-08.md](/c:/OSPanel/home/lessons.ru/lessons/artifacts/baseline/answers/code-reading-2026-03-08.md)
  - [big-o-2026-03-08.md](/c:/OSPanel/home/lessons.ru/lessons/artifacts/baseline/answers/big-o-2026-03-08.md)
  - [Container.php](/c:/OSPanel/home/lessons.ru/lessons/artifacts/baseline/snippets/Container.php)

## Key Findings

1. Current level is not "zero syntax", but `pre-systematic`: there is residual coding memory, but there is no stable causal model of execution, complexity, or architecture.
2. PHP execution model is weak:
   - pass-by-value is not stable in reasoning;
   - copy-on-write is not understood precisely;
   - PHP arrays are described by usage patterns, not by structure and cost model;
   - exceptions, validation, and sanitization are mixed together.
3. Code reading skill is near-zero at the architectural level:
   - syntax is visible;
   - system behavior, contracts, lifetime semantics, and hidden risks are not reconstructed reliably.
4. Complexity reasoning is fragmentary:
   - linear scan and nested loops are recognized;
   - memory cost, amortized complexity, worst-case reasoning, and the distinction between algorithmic/cyclomatic/cognitive complexity are unstable.
5. Positive signal:
   - the user more often admits "I do not know" than fabricates a confident explanation.
   - this lowers hallucination risk and makes deep training more viable.

## Corrective Explanations Locked In

- `normalizeEmail()` was improved, but the previous version still returned the original `$email` lowercased instead of the trimmed validated value.
- The second PHP fragment with `bump(int $value)` prints `5`, not `6`, because the integer is passed by value and the function mutates only a local copy.
- The `array_shift()` loop is expensive because removing the first element from a PHP array shifts or reindexes the remaining elements; repeated in a loop, this leads to quadratic total cost.
- The hidden singleton behavior in the container comes from caching the callable result back into `$bindings[$id]`, so the factory is executed once and all later calls return the cached result.

## Decisions

1. Do not optimize for "finishing baseline fast".
2. Switch to a from-zero rebuild of mental models.
3. Treat baseline as a diagnostic map, not as the main learning format.
4. Prioritize the following sequence:
   - PHP execution model;
   - PHP arrays and operation cost;
   - functions, parameters, exceptions, contracts;
   - Big-O and kinds of complexity;
   - small-scale code reading before framework internals.

## What This Changes In The Roadmap

- Phases 1 and 2 must be taken more seriously than originally hoped.
- Reverse engineering of mature frameworks should not be the primary learning method yet.
- Framework construction must be delayed until execution model and complexity basics become reproducible.

## Next Actions

1. Start Lesson 01 on the PHP execution model.
2. Rework the incorrect baseline answers after the lesson, not before it.
3. Keep using baseline files as checkpoints, but move the main teaching flow into guided lessons.

