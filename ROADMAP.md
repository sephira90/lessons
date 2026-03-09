# Roadmap

## Status
- Current Phase: Phase 0 completed, transitioning to Phase 1
- Current Goal: build stable PHP execution model, begin systematic cognitive development
- Current Gate: Phase 0 passed — toolchain works, baseline diagnostic complete, plan restructured based on real baseline
- Next Deliverables: Unit 1.1 (types and type system) complete with blind reconstruction and working code

## Summary
- Main problem: the bottleneck is not syntax, but weak reproducibility of knowledge, weak causality, and unstable engineering judgment.
- Baseline finding: level is pre-systematic. Residual coding memory exists, but no stable causal model of execution, complexity, or architecture. Pass-by-value reasoning is unstable. Copy-on-write confused with object reference passing. Array operation costs not understood. Code reading at architectural level near zero. Complexity reasoning fragmentary.
- Positive signal: the user more often admits "I do not know" than fabricates confident explanations. This lowers hallucination risk and makes deep training viable.
- Risk profile: "coded before → now vibe-coder" creates false speed without reliable mental models. The plan must not optimise for coverage speed but for model stability.
- Rejected models: "just write code" leads to cargo cult; "just study theory" produces weak transfer; "4 parallel tracks from day one" overloads pre-systematic level with context switching; "5 mandatory artifacts per unit" bureaucratises learning.
- Chosen model: 2 sequential focuses per phase (Focus A 60% + Focus B 40%), block rhythm (2-3 day blocks), spaced retrieval protocol, explicit slowdown protocol.
- Tempo: gate-based, not calendar-first. Realistic range: 32-42 weeks depending on recall stability. Phase durations are ranges, not targets.
- End state: an educational but serious modular-monolith hybrid framework in PHP, one JSON API demo, one SSR demo app, architecture and complexity dossier, and demonstrably stronger systematic and causal thinking.

## Operating Model

### Focus Model
Each phase has two focuses instead of four parallel tracks:
- **Focus A (60% of time):** the main topic — deep model building, implementation, testing.
- **Focus B (40% of time):** a supporting track directly connected to Focus A, reinforcing it from a different angle.

Focus B is never an unrelated topic. It exists to strengthen Focus A through adjacent practice. Example: when Focus A is "PHP execution model", Focus B is "cost reasoning on the same PHP operations" — not "DSA theory" or "framework design".

### Weekly Rhythm
Block-based, not daily switching:
```
Mon-Tue-Wed:  Focus A — sustained deep work on main topic
Thu-Fri:      Focus B — supporting track + next-day recall of Focus A
Sat:          Retrospective + interleaved recall across all prior topics
```
This gives 3 consecutive days of immersion per main topic — the minimum for schema formation. Friday includes a structured recall of Mon-Wed material, creating a 2-day retrieval gap.

### Mandatory Artifacts Per Unit
Two mandatory, one conditional:
1. **Blind reconstruction** (explanation from blank page without any reference) — retrieval practice, the highest-value learning activity.
2. **Working implementation with tests** — procedural encoding. Tests are part of implementation, not a separate artifact.
3. **Trade-off or complexity note** — only for non-trivial decisions where a real trade-off exists. Not for trivial exercises.

### Spaced Retrieval Protocol
| Timing | Exercise | Duration | Failure action |
|---|---|---|---|
| End of session | Micro-recall: write 3 main conclusions from memory | 2 min | Review immediately |
| Next day | Recall: reconstruct key model without notes | 5 min | Flag topic for revisit |
| Day 3 | Recall + Apply: solve a short problem using this model | 10 min | Topic not passed, rework before proceeding |
| Day 7 | Interleaved test: mixed problems from this + previous topics | 15 min | Identify which model is unstable, schedule targeted repair |

A topic is considered learned only when the day-7 interleaved test is passed. Feeling of understanding during a session does not count.

### Slowdown Protocol
```
IF recall at day 3 < 60%:
  → return to topic, rebuild model from a different angle
  → do NOT proceed to next topic

IF a gate takes > 1.5× expected duration:
  → decompose into sub-skills
  → identify which sub-skill is the blocker
  → address the blocker directly, not the whole topic again

IF 3 consecutive topics need > 1.5× expected time:
  → reassess difficulty level of the material
  → consider adding an intermediate preparatory unit
  → adjust phase duration estimate upward without guilt
```
The purpose of the slowdown protocol is to make the plan anti-fragile. Slowing down is not failure — it is the plan working correctly by preventing unstable knowledge from propagating into later phases.

### AI Policy
- First: own framing, design, and attempt. Struggle is where learning happens.
- Then: AI for critique, counterexamples, review, comparison of alternatives, and corrective explanations.
- Never: AI as a first-pass answer generator. AI-generated code that is not understood is worse than no code.
- Exception: when stuck for > 30 minutes on a topic where the mental model is genuinely absent, AI can provide a structured explanation to unblock. But the user must then reconstruct it from memory before moving on.

### Toolchain
- PHP: `C:\OSPanel\modules\PHP-8.4\php.exe`
- Composer: `scripts\composer.cmd` (wraps `.tools\composer.phar`)
- Testing: PHPUnit (added in Phase 1)
- Static analysis: PHPStan (added in Phase 1, strictness raised gradually)
- Code style: PHP-CS-Fixer (added in Phase 1)
- Complexity: PHPMD or phpmetrics (added in Phase 2)
- Debugging: Xdebug (added when profiling becomes relevant, Phase 4+)

### Session Time Rule
85% of every session goes to learning, coding, and retrieval practice. 15% maximum for meta-work: execution logs, protocol updates, administrative tasks. Markdown-only sessions are an exception, not the norm. Every learning session should produce or modify at least one file in `src/` or `tests/`.

### Progress Metric
Not "feels understood", but "can reproduce, explain, defend, implement, and review" — verified through spaced retrieval, not through in-session confidence.

### Learning Validation Stack
Every important topic should move through five loops, not one:
- **Acquisition:** first contact with the idea. Explanation, examples, initial scaffolding.
- **Reconstruction:** explain the model from memory with the chat closed.
- **Transfer:** solve a related but new task without step-by-step AI guidance.
- **Calibration:** compare your model against independent checks: tests, official docs, real runtime behavior, review, interview-style questioning.
- **Capitalization:** convert learning into engineering or market value in a way appropriate to the current phase.

A loop is not complete if only the first stage succeeded. The dangerous failure mode is "intellectual fluency without autonomous transfer."

### Weekly Review Protocol
At the end of each week, complete one short review in `artifacts/reviews/` using the project template. The review is not reflective journaling; it is a control instrument.

Required outputs each week:
- what topics were studied;
- what was reconstructed without notes;
- what was transferred to a new task without AI;
- what was calibrated against tests, docs, runtime, or external critique;
- what became more valuable in real engineering terms.

Core weekly metrics:

| Metric | Question | Failure signal |
|---|---|---|
| Reconstruction Score | What can I explain from memory without reopening chat or notes? | Need to re-read before explaining |
| No-AI Transfer Score | What similar task did I solve independently? | Only works when guided step by step |
| Calibration Score | What independent check corrected or confirmed my model? | No external correction path exists |
| Delivery Score | What working code or artifact did I finish this week? | Week was "intellectually rich" but produced no usable result |
| Market Translation Score | Can I explain this topic in framework, interview, or real backend language? | Understanding exists only inside the local project dialect |
| AI Dependency Risk | At what step did AI become a crutch instead of a critic? | AI used before own framing, own attempt, or own explanation |

### Phase-Based Capitalization Ramp
Market focus must be phased, not absolute:
- **Phase 1-2:** 70% model stability and autonomous reasoning, 20% transfer, 10% market translation.
- **Phase 3-4:** 55% engineering design and transfer, 25% calibration, 20% market translation.
- **Phase 5-7:** 40% framework quality, 30% calibration and external comparison, 30% market capitalization through demos, explanations, and production-like reasoning.

This prevents two bad extremes:
- optimizing too early for "money language" without a stable core model;
- optimizing forever for intellectual purity without ever producing market value.

## Cognitive Development Protocol

### Core Thinking Operations
These are trainable cognitive skills, developed through specific exercises at each phase. They are not abstract goals — each has concrete exercise types.

| # | Skill | Description | Primary phases |
|---|---|---|---|
| 1 | Prediction and Verification | Predict behavior → run → compare → explain discrepancy | Phase 1 |
| 2 | Causal Tracing | Given effect → find cause. Given cause → predict effects | Phase 1-2 |
| 3 | Decomposition | Break system into independent parts, identify interfaces | Phase 2-3 |
| 4 | Invariant Identification | What must always be true? What preserves correctness? | Phase 2-3 |
| 5 | Cost Reasoning | Time, space, cognitive, maintenance cost of every decision | Phase 2-3 |
| 6 | Failure Mode Analysis | How can this break? What assumptions must hold? | Phase 3-4 |
| 7 | Boundary and Contract Thinking | Where does the system end? What crosses the boundary? What guarantees exist? | Phase 3-4 |
| 8 | Abstraction Level Navigation | Same problem at different levels. Knowing which level to reason at | Phase 4-5 |
| 9 | Second-Order Effects | What happens after the first effect? What feedback loops exist? | Phase 5-7 |
| 10 | Architectural Reasoning | System-level trade-offs, change cost, evolution, scalability | Phase 5-7 |

### Exercise Types
Each thinking operation is developed through specific, repeatable exercises:

1. **Predict-Verify-Explain (PVE):** predict code output → run → if wrong, explain why the mental model failed, not just what the correct answer is. The explanation of failure is more valuable than the correct answer.
2. **"What Breaks?" (WB):** for any solution, list 3 realistic ways it can fail in production. Not theoretical — specific scenarios with specific consequences.
3. **"Why Not the Other Way?" (WNOW):** after implementing solution A, construct the strongest argument for solution B. Forces consideration of alternatives and strengthens trade-off reasoning.
4. **"What Changes?" (WC):** given a new requirement, trace all code that must change. Measures coupling awareness and architectural understanding.
5. **"Draw It" (DI):** execution diagrams, memory layouts, dependency graphs, state machines — visual externalization of mental models. If you cannot draw it, you do not understand it.
6. **"Explain to Zero" (EZ):** reconstruct a concept from blank page without any reference. Pure retrieval practice. The gaps in the explanation are the gaps in understanding.
7. **"Steelman then Attack" (SA):** build the strongest version of an idea, then find its single weakest point. Trains intellectual honesty and precision.
8. **"Cost It" (CI):** for any design decision, enumerate what you pay: complexity, performance, flexibility, cognitive load, maintenance burden. Every choice has a price.

### Self-Diagnostic Questions
At the end of every unit, answer honestly:
1. Can I reconstruct this from memory tomorrow? (retrieval readiness)
2. Can I predict behavior of code using this concept? (causal model stability)
3. Can I explain why this works, not just that it works? (depth of understanding)
4. Can I identify where this would break? (failure mode awareness)
5. Can I compare this with an alternative and articulate the trade-off? (judgment)
6. Can I solve a similar problem without AI? (transfer)
7. Can I describe this in real framework, backend, or interview language? (capitalization readiness)

If any answer is "no" or "probably", the unit is not complete.

## Progress Tracker

| Unit | Status | Started | Gate |
|---|---|---|---|
| **Phase 0** | COMPLETED | 2026-03-08 | 2026-03-09 |
| **Phase 1** | | | |
| 1.1 Types and Type System | in progress | 2026-03-09 | |
| 1.2 Variables, Values, Memory Model | not started | | |
| 1.3 PHP Arrays Deep Dive | not started | | |
| 1.4 Functions, Parameters, Scope | not started | | |
| 1.5 Control Flow and Exceptions | not started | | |
| 1.6 Namespaces, Autoloading, Composer | not started | | |
| 1.7 Phase 1 Integration Exercise | not started | | |

Phase 2-7 units added to tracker when Phase 1 gate is passed.

## Phase Roadmap

### Phase 0 / 1 week: Bootstrap and Anti-Vibe Reset
**Status: COMPLETED** (2026-03-08 — 2026-03-09)

Delivered: toolchain, git, project structure, note templates, ADR journal, glossary, complexity log, failure log. Baseline diagnostic completed and reviewed.

Key baseline finding: pre-systematic level. Execution model, complexity reasoning, and architectural code reading are the three primary gaps. Plan restructured accordingly.

---

### Phase 1 / 3-4 weeks: PHP Execution Model and Language Discipline

**Objective:** build a stable, reproducible causal model of PHP runtime behavior. After this phase, the user can predict what PHP code does and explain why — not by memorizing examples, but by reasoning from a model.

**Focus A (60%):** PHP execution model — types, values, memory, functions, control flow.
**Focus B (40%):** cost reasoning tied to PHP operations — not abstract Big-O yet, but "why is this operation expensive and that one cheap?"

**Cognitive targets:** Prediction and Verification (primary), Causal Tracing (primary), Cost Reasoning (introductory).

#### Unit 1.1: Types and Type System (2-3 days)
**Topics:** scalar types (int, float, string, bool), type juggling rules, `==` vs `===`, `strict_types` declaration, union types, nullable, type declarations in function signatures and return types.
**Build:** type-explorer CLI script demonstrating juggling edge cases: `0 == "0"`, `"" == false`, `"0" == false`, `null == false`, `null == 0`. The script must predict, then verify, then print the explanation.
**Thinking:** PVE — predict 15 type comparison results before running code. Track hit rate. EZ — explain type juggling rules from blank page after the exercise.
**Gate:** can predict type comparison results for 12/15 cases without running code. Can explain when `strict_types` matters and what it does not protect against.

#### Unit 1.2: Variables, Values, and Memory Model (2-3 days)
**Topics:** copy-on-write (COW) mechanism, pass-by-value semantics, pass-by-reference (`&`), object handles (not references, not values — a third model), `unset` behavior, `memory_get_usage` for observing COW.
**Build:** memory-demo script: assign array `$a` to `$b`, show memory before/after, mutate `$b`, show memory change when COW triggers copy. Same for objects: show that `$obj2 = $obj1` shares the same object (handle), not a copy.
**Thinking:** DI — draw memory diagrams showing what `$a`, `$b`, and the underlying zval look like at each step. PVE — predict values of `$a` and `$b` after mutation chains.
**Gate:** can trace variable values through assignment + mutation chains involving arrays, scalars, and objects. Can explain COW vs `&` vs object handles as three distinct mechanisms.

#### Unit 1.3: PHP Arrays Deep Dive (3-4 days)
**Topics:** internal structure (ordered hash map), numeric vs string keys, implicit reindexing on `array_values`/`array_shift`, operation costs: access by key O(1), append O(1) amortized, `array_shift` O(n), `in_array` O(n), `isset`/`array_key_exists` O(1), sort O(n log n). Distinction: PHP array is not a list, not a pure hash table, not a stack — it is all of these simultaneously, with different costs for each usage pattern.
**Build:** benchmark suite: measure `array_push` vs `array_unshift` vs `array_shift` at sizes 100, 1000, 10000. Observe quadratic blowup of repeated `array_shift`. Compare `in_array` vs `isset($arr[$key])` for membership testing.
**Thinking:** CI — cost every common array operation. PVE — predict benchmark results before running. WB — "if you use `array_shift` in a queue implementation processing 10k items, what happens and why?"
**Gate:** can classify array operation costs without looking them up. Can explain why `array_shift` is O(n). Can choose the right operation for a given task and justify the choice by cost, not by habit.

#### Unit 1.4: Functions, Parameters, Scope (2-3 days)
**Topics:** function declaration, closures (`function() use (...) {}`), arrow functions (`fn() =>`), parameter passing by value (default) vs by reference (`&`), variadic parameters, scope rules (local, no implicit global access, `static` variables), closures capturing by value vs by reference, return types including `void` and `never`.
**Build:** function-explorer: demonstrate closure capturing, nested closures, `static` variable persistence across calls. Edge case: closure captures `$x` by value, then `$x` changes outside — closure still has old value.
**Thinking:** PVE — predict output of 5 closure/scope scenarios. DI — draw scope diagrams for nested function calls. Rework baseline `bump()` question: explain causally why `$n` stays 5.
**Gate:** can predict function parameter and closure behavior. Can explain pass-by-value for scalars and why objects appear to "pass by reference" (but don't — they pass handle by value).

#### Unit 1.5: Control Flow and Exceptions (2-3 days)
**Topics:** `if/elseif/else`, `switch` (loose comparison, fall-through), `match` (strict, no fall-through, expression), `for`, `foreach` (internal pointer, key/value, modification during iteration), `while/do-while`. Exceptions: `throw`, `try/catch/finally`, exception hierarchy, custom exceptions. When to use exceptions vs return values vs null — decided by system boundary: exceptions at boundaries, typed returns internally.
**Build:** error-handling strategy demo: same problem solved with (a) exceptions, (b) result object, (c) null-return. Compare: code clarity, caller burden, composability.
**Thinking:** WNOW — after implementing exception-based validation, argue for result-object approach. CI — what is the cost of each error strategy? SA — steelman exceptions everywhere, then attack.
**Gate:** can articulate when exceptions are the right tool (boundary crossings, unrecoverable states) and when they create accidental complexity (internal flow control). Can explain `match` vs `switch` causally (strictness, expression vs statement, fall-through).

#### Unit 1.6: Namespaces, Autoloading, Composer (2-3 days)
**Topics:** `require` vs `include` vs `require_once` (fatal error vs warning vs deduplication), namespaces (declaration, `use`, resolution rules, fully qualified names), PSR-4 autoloading (namespace → directory mapping), Composer: `autoload` section, classmap vs PSR-4 vs files, `vendor/autoload.php`, `composer dump-autoload`.
**Build:** multi-file CLI tool with 3+ classes in different namespaces, loaded via PSR-4. Trace what happens when `new SomeClass()` is called: PHP triggers autoloader → Composer's autoloader maps namespace to file → `require` loads file → class available.
**Thinking:** causal trace: from `new Foo\Bar\Baz()` to file on disk — every step. WB — what happens if namespace doesn't match directory? If file exists but class name is wrong?
**Gate:** can set up PSR-4 autoloading from scratch without copying config. Can trace autoload resolution step by step. Can explain `require` vs `include` through consequence (fatal stop vs silent failure), not through vague "checking".

#### Unit 1.7: Phase 1 Integration Exercise (2-3 days)
**Topics:** combine all Phase 1 skills into one coherent program.
**Build:** CLI tool "PHP Quiz Engine" — reads quiz questions from a JSON file, presents them interactively, validates answers, scores results. Must use: proper types, value objects for Question/Answer, namespaces with PSR-4, exception handling at boundaries, arrays used with correct cost awareness.
**Thinking:** EZ — reconstruct the PHP execution model from blank page: types, values, COW, functions, scope, autoloading. WC — "what changes if we add timed questions?" (trace impact). Full complexity self-review.
**Gate:** Phase 1 gate — integration exercise works, blind reconstruction covers all 6 prior units, day-7 interleaved recall passes for > 70% of Phase 1 material.

---

### Phase 2 / 6-8 weeks: Data Structures, Algorithms, and Complexity

**Objective:** build own implementations of fundamental data structures, understand their cost models, and develop the ability to choose the right structure for a given problem with justified reasoning.

**Focus A (60%):** DSA implementation — build each structure, test it, benchmark it.
**Focus B (40%):** complexity reasoning — algorithmic complexity, amortized analysis, and introduction to cyclomatic and cognitive complexity as code quality metrics.

**Cognitive targets:** Decomposition (primary), Invariant Identification (primary), Cost Reasoning (deepening), Causal Tracing (reinforcing).

#### Unit 2.1: Big-O Foundations (3-4 days)
**Topics:** what Big-O measures (upper bound on growth rate) and what it doesn't (constants, actual runtime, cache behavior). O(1), O(log n), O(n), O(n log n), O(n²), O(2^n) with real code examples. Best / average / worst case: why "O(1)" for hash table access is the average, not a guarantee. Space complexity: O(1) in-place vs O(n) auxiliary.
**Build:** timing harness that measures operation count and wall time for different input sizes. Demonstrate: linear search O(n), nested loop O(n²), binary search O(log n) — plot or table showing growth.
**Thinking:** PVE — estimate complexity of 10 code snippets before analysis. CI — "if this is O(n²) and n = 10000, how many operations? Is this acceptable for a web request?"
**Gate:** can classify code by complexity. Can explain why O(n²) is not always bad (small n) and O(1) is not always good (large constant). Understands the distinction between complexity class and actual performance.

#### Unit 2.2: Amortized Complexity (2-3 days)
**Topics:** amortized analysis: aggregate cost over a sequence of operations. Dynamic array resizing as canonical example: most appends are O(1), occasional resize is O(n), amortized cost is O(1). PHP array growth strategy. Accounting method and aggregate method (informal).
**Build:** dynamic-array simulator: track number of copies during N appends as the array doubles in capacity. Show that total copies ≈ 2N, so amortized cost per append = O(1).
**Thinking:** PVE — predict total cost of 1000 appends with doubling. EZ — explain amortized complexity from blank page without formulas, using the dynamic array example.
**Gate:** can explain amortized O(1) for dynamic array append. Can identify other amortized scenarios (hash table rehashing). Can distinguish amortized from average case.

#### Unit 2.3: Stack and Queue (3-4 days)
**Topics:** stack (LIFO): push, pop, peek, isEmpty — all O(1). Queue (FIFO): enqueue, dequeue, peek — O(1) with proper implementation. Invariants: stack returns most recently added; queue returns least recently added. Real uses: call stack, undo, BFS queue, middleware pipeline (queue of handlers).
**Build:** own `Stack` and `Queue` classes (array-backed). Solve: bracket matching with stack; simulate printer queue. Important: demonstrate that array-based queue with `array_shift` is O(n) per dequeue — motivate circular buffer or doubly-linked approach.
**Thinking:** DI — draw stack frames for recursive function calls. WB — "what happens if you use array_shift for a queue with 100k items?" (connects to Phase 1 Unit 1.3).
**Gate:** can implement stack and queue from scratch. Can explain why naive array-based queue is O(n²) for N operations. Can identify stack and queue patterns in framework code.

#### Unit 2.4: Linked List (3-4 days)
**Topics:** singly linked list: node structure, insert at head O(1), insert at tail O(1) with tail pointer, search O(n), delete O(n). Doubly linked list: previous pointer, delete with known node O(1). Comparison with array: linked list wins at insert/delete at arbitrary position (if node is known), loses at random access and cache locality.
**Build:** own `LinkedList` with insert, delete, search, reverse, cycle detection (Floyd's algorithm). Tests for all operations including edge cases (empty list, single element, cycle).
**Thinking:** DI — draw node diagrams for insert and delete operations. CI — compare linked list vs PHP array for 5 different usage patterns. WNOW — "when would you actually use a linked list in PHP?"
**Gate:** can implement singly and doubly linked list. Can explain cost trade-offs vs array. Can articulate why linked lists are rarely the best choice in PHP specifically (array is usually better due to hash map internals and cache locality).

#### Unit 2.5: Hash Map and Set (4-5 days)
**Topics:** hash function: deterministic, uniform distribution, collision. Collision resolution: chaining (linked list per bucket) vs open addressing (probing). Load factor: ratio of entries to buckets, rehashing when load factor exceeds threshold. Average case O(1) access, worst case O(n) when all keys collide. Set as hash map with keys only. PHP arrays as hash maps: how they actually work under the hood.
**Build:** own `HashTable` with chaining. Implement: put, get, delete, resize. Benchmark against PHP native array. Demonstrate worst case: create N keys that all hash to the same bucket.
**Thinking:** PVE — predict access time with 0.3 vs 0.9 load factor. WB — "what happens if your hash function always returns 1?" SA — steelman "hash tables are always O(1)", then attack.
**Gate:** can implement hash table with collision handling. Can explain why O(1) is average, not guaranteed. Can explain load factor and rehashing. Understands how PHP arrays use this internally.

#### Unit 2.6: Binary Search and Sorting (4-5 days)
**Topics:** binary search: precondition (sorted data), O(log n), off-by-one risks in boundary handling. Sorting: insertion sort O(n²) — simple, good for small/nearly-sorted; merge sort O(n log n) — stable, not in-place; quicksort O(n log n) average / O(n²) worst — in-place, not stable, pivot selection matters. PHP `sort()` internals. Stability: preserves relative order of equal elements.
**Build:** own binary search (iterative, tested for off-by-one), own merge sort, own quicksort. Benchmark all three + PHP's `sort()` at sizes 100, 1000, 10000.
**Thinking:** DI — trace merge sort execution on paper for 8 elements. PVE — predict quicksort worst case (sorted input with first-element pivot). CI — compare sorting algorithms across 5 criteria (time, space, stability, adaptivity, simplicity).
**Gate:** can implement binary search without off-by-one bugs. Can implement merge sort and quicksort. Can explain sorting trade-offs: when insertion sort beats quicksort (small n), when merge sort beats quicksort (stability, worst-case guarantee).

#### Unit 2.7: Trees and BST (4-5 days)
**Topics:** tree terminology: root, leaf, depth, height, balanced. BST: invariant (left < node < right), insert O(h), search O(h), delete O(h) where h = height. Traversals: in-order (sorted output), pre-order (copy structure), post-order (delete safely), level-order (BFS). Balanced vs unbalanced: skewed BST degenerates to linked list → O(n). Mention of balanced trees (AVL, red-black) without full implementation — just the "why".
**Build:** own `BinarySearchTree` with insert, search, in-order traversal, min/max. Visualize tree structure as indented text output. Test with sorted input to demonstrate degeneration.
**Thinking:** DI — draw trees after insertion sequences. PVE — predict tree shape for `insert(1,2,3,4,5)` vs `insert(3,1,5,2,4)`. WB — "what happens if you build a BST from sorted data?"
**Gate:** can implement BST with correct invariant. Can explain why balance matters. Can perform all traversals and explain their use cases.

#### Unit 2.8: Heap and Priority Queue (3-4 days)
**Topics:** min-heap / max-heap: complete binary tree invariant (parent ≤ children for min-heap), shape property (complete tree). Operations: insert O(log n) with sift-up, extract-min O(log n) with sift-down, peek O(1). Array representation: parent at `floor((i-1)/2)`, children at `2i+1` and `2i+2`. Priority queue: abstract interface backed by heap.
**Build:** own `MinHeap` with insert, extractMin, peek. Implement heapsort using the heap. Compare with BST: when heap wins (efficient min/max extraction), when BST wins (ordered traversal, search).
**Thinking:** DI — draw heap array and corresponding tree at each step. PVE — predict heap state after 5 insertions. CI — compare heap vs sorted array vs BST for priority queue use case.
**Gate:** can implement min-heap with correct sift operations. Can explain array representation. Can articulate heap vs BST trade-offs.

#### Unit 2.9: Graph Basics, BFS, DFS (4-5 days)
**Topics:** graph representations: adjacency list (space-efficient for sparse), adjacency matrix (fast lookup for dense), edge list. Directed vs undirected. BFS: queue-based, discovers shortest path in unweighted graph, O(V+E). DFS: stack-based or recursive, finds all reachable nodes, cycle detection, topological sort for DAGs. Real applications: dependency resolution in DI containers, route finding, task scheduling.
**Build:** own `Graph` with adjacency list representation, BFS, DFS. Solve: shortest path in unweighted graph, cycle detection, topological sort. Connect to framework: model a dependency graph between services and resolve in topological order.
**Thinking:** DI — trace BFS and DFS on a graph with 6+ nodes on paper. WC — "how would a DI container use topological sort?" WNOW — when adjacency matrix beats adjacency list and vice versa.
**Gate:** can implement BFS and DFS. Can detect cycles. Can identify graph problems in non-obvious contexts (dependency resolution, build systems).

#### Unit 2.10: Recursion and Backtracking (3-4 days)
**Topics:** recursion: base case, recursive case, call stack. Stack overflow: why it happens, depth limits. Tail recursion and why PHP does not optimize it. Backtracking: try → fail → undo → try next. Memoization: cache results of pure functions to avoid redundant computation.
**Build:** recursive tree traversal (using Unit 2.7 BST). Permutation generator. Simple constraint solver (N-queens or Sudoku validator). Fibonacci with and without memoization to demonstrate exponential vs linear.
**Thinking:** DI — draw full call stack for recursive fibonacci(5). PVE — predict stack depth for different inputs. CI — compare recursive vs iterative for the same problem.
**Gate:** can write correct recursive solutions with proper base cases. Can trace call stack. Understands stack depth risks. Can apply memoization to transform exponential into polynomial.

#### Unit 2.11: Complexity Metrics Beyond Big-O (2-3 days)
**Topics:** cyclomatic complexity: count of independent paths (edges − nodes + 2 for a single function). Cognitive complexity: measures how hard code is to understand (nesting depth, breaks in linear flow, recursion). Coupling: how many other modules this module depends on. Cohesion: how related are the responsibilities within a module. Essential vs accidental complexity.
**Build:** analyze own DSA implementations from this phase: compute cyclomatic complexity by hand, evaluate cognitive complexity, identify where complexity is essential (the problem is inherently branching) vs accidental (poor structure). Refactor one high-complexity function and compare metrics before/after.
**Thinking:** SA — "low cyclomatic complexity means good code" — steelman then attack. EZ — explain 3 types of complexity from blank page with examples.
**Gate:** can compute cyclomatic complexity by hand. Can distinguish essential from accidental complexity. Can explain when low CC hides real problems (scattered complexity, excessive indirection). Can articulate why metrics are signals, not verdicts.

#### Unit 2.12: Phase 2 Integration and DSA Library (3-4 days)
**Topics:** assemble all DSA implementations into a coherent library with consistent interface, tests, and documentation.
**Build:** `Lessons\Framework\DSA` namespace with Stack, Queue, LinkedList, HashTable, BST, MinHeap, Graph. All tested. README with complexity table for every structure and operation.
**Thinking:** EZ — full blind reconstruction of Phase 2: draw the complexity table from memory. WC — "if you needed to add a Trie, where would it fit and what would change?" Full phase retrospective: what was hardest, what was surprising, where was understanding weakest.
**Gate:** Phase 2 gate — all structures implemented and tested. Blind reconstruction of complexity table > 80% correct. Day-7 interleaved recall covers Phase 1 + Phase 2. Can answer: "why not just use PHP arrays for everything?" with specific, cost-based reasoning.

---

### Phase 3 / 5-6 weeks: OOP, Design, and Quality

**Objective:** understand OOP not as class syntax but as a tool for managing complexity, dependencies, extensibility, and the cost of change. Build three mini-systems that prove this understanding.

**Focus A (60%):** OOP mechanics and design principles through implementation.
**Focus B (40%):** failure mode analysis and trade-off evaluation on own designs.

**Cognitive targets:** Failure Mode Analysis (primary), Boundary and Contract Thinking (primary), Cost Reasoning (deepening), Decomposition (reinforcing).

#### Unit 3.1: Classes, Encapsulation, Invariants (3-4 days)
**Topics:** class as behavioral boundary, not data container. Properties, methods, visibility. Constructors, readonly properties, promotion. Encapsulation: protecting invariants, not hiding data. The difference: "private field" is implementation; "the object cannot exist in an invalid state" is the goal.
**Build:** `Money` value object: currency + amount, immutable, arithmetic operations that enforce same-currency invariant. Demonstrate: what happens if the constructor doesn't validate?
**Thinking:** WB — "what breaks if Money allows different currencies to add?" Invariant identification exercise: list the invariants Money must maintain.
**Gate:** can design a class that enforces its invariants through construction constraints. Can explain encapsulation as invariant protection, not as field hiding.

#### Unit 3.2: Value Objects vs Entities (3-4 days)
**Topics:** value object: identity by value (two Emails with same string are equal), immutable, no side effects, freely replaceable. Entity: identity by ID (two Users with same name are different if IDs differ), mutable state, lifecycle. Why this distinction matters: equality semantics, persistence strategy, testing approach.
**Build:** `Email` VO, `UserId` VO, `User` entity. Rework `normalizeEmail` from baseline as `Email::fromString()` factory. Demonstrate: two Emails with same value are equal; two Users with same name but different IDs are not.
**Thinking:** classify 10 real concepts as VO or entity and justify. WB — "what breaks if Email is mutable?" WNOW — "when is the VO/entity distinction not worth the cost?"
**Gate:** can implement both patterns. Can explain when to use which. Can articulate what breaks if the distinction is ignored.

#### Unit 3.3: Composition vs Inheritance, Interfaces (4-5 days)
**Topics:** inheritance: "is-a", Liskov Substitution Principle, fragile base class problem, tight coupling to parent. Composition: "has-a", delegation, flexibility to swap behavior. Interfaces: contracts without implementation, polymorphism without inheritance hierarchy. Abstract classes: shared base with enforced template method. When inheritance is justified: true "is-a" with stable semantics (rare).
**Build:** design a notification system first with inheritance (EmailNotification extends Notification), then refactor to composition (Notification has a Channel). Compare: what happens when you add SlackChannel?
**Thinking:** WC — "adding a new channel type: count the changes in inheritance vs composition version." CI — cost comparison across 5 dimensions. SA — steelman inheritance, then find the weakest point.
**Gate:** can design with composition by default. Can articulate when inheritance is justified (not just "is-a" but stable semantics). Can explain fragile base class problem with a concrete example.

#### Unit 3.4: SOLID as Trade-Off Analysis (5-6 days)
**Topics:** each principle examined as a trade-off, not a commandment:
- **SRP:** increases cohesion, but naive application creates micro-class explosion and distributed complexity.
- **OCP:** enables extension without modification, but premature abstraction creates unused extension points.
- **LSP:** the real constraint on inheritance — subtypes must be substitutable without breaking callers.
- **ISP:** narrow interfaces reduce coupling, but excessive splitting creates interface proliferation.
- **DIP:** decouples from implementations, but indirection for its own sake adds cognitive cost without value.
For each: when it helps (reduces cost of change), when it hurts (adds cost without corresponding benefit), what signals that you've gone too far.
**Build:** take one of the Phase 3 mini-systems (not yet built) and deliberately apply each principle, then evaluate: did complexity decrease or just move? Use complexity metrics from Unit 2.11.
**Thinking:** for each principle, complete: "SRP is valuable when ___, but becomes cargo cult when ___". SA for each. EZ — explain SOLID from blank page through trade-offs, not definitions.
**Gate:** can apply SOLID where it reduces change cost. Can explain when each principle is counterproductive. Can detect cargo cult application in code review.

#### Unit 3.5: DI Container with Correct Lifetime (4-5 days)
**Topics:** what DI solves: decouples construction (how to build) from use (what to call). Constructor injection (preferred), method injection (occasional), property injection (almost never). Container lifetime semantics: transient (new instance each time), singleton (one instance for container lifetime), scoped (one instance per scope/request). Why the baseline Container.php was broken: factory result cached back into bindings = implicit singleton for all callables, no way to get transient behavior.
**Build:** own `Container` with explicit lifetime: `bind($id, $factory, Lifetime::Transient)`, `singleton($id, $factory)`. Resolution with dependency graph traversal. Error handling: circular dependency detection, missing binding.
**Thinking:** compare own container with baseline Container.php from diagnostic. WB — "what happens with circular dependencies?" "What if a transient service depends on a scoped service?" DI — draw resolution graph for 5 interconnected services.
**Gate:** can implement container with correct lifetime management. Can detect circular dependencies. Can explain why the baseline container's hidden singleton is a design flaw, not just a cosmetic issue.

#### Unit 3.6: Error Handling and Contracts (3-4 days)
**Topics:** Design by Contract (DbC): preconditions (what must be true before), postconditions (what is guaranteed after), invariants (what must always hold). Exceptions as boundary signals: throw at system boundaries (user input, external APIs), return typed results internally. Custom exception hierarchy: base exception per module, not per error message. Defensive programming at boundaries, trust internal code.
**Build:** design error handling for the Validator mini-system: which errors are exceptions (programming errors, infrastructure failures) and which are expected validation results (returned as typed ValidationResult).
**Thinking:** WNOW — "why not throw ValidationException for every invalid field?" CI — cognitive and performance cost of exceptions vs result objects.
**Gate:** can design error strategy based on system boundaries. Can explain preconditions/postconditions/invariants. Can distinguish exceptions (unexpected) from expected error results.

#### Unit 3.7: Mini-Systems (5-6 days)
Build three systems that integrate all Phase 3 skills:

**3.7a Validator** — rule composition, error collection, typed results.
- Interface: `Validator::validate($data): ValidationResult`
- Rules as composable objects (not if/else chains)
- ValidationResult holds errors, not exceptions

**3.7b Event Dispatcher** — listener registration, event propagation, priority, stoppable events.
- Interface: `Dispatcher::dispatch(Event $event): Event`
- Listeners registered by event class
- Priority ordering, propagation stop

**3.7c Pipeline / Middleware** — stage composition, ordering, short-circuit.
- Interface: `Pipeline::pipe(Stage $stage): self`, `Pipeline::process($input): $output`
- Demonstrates onion model that will be used in HTTP middleware

Each: design → implement → test → review against SOLID → complexity audit.
**Thinking:** compare all three designs: what patterns repeat? Where did SOLID help? Where would more abstraction be overengineering? Full phase retrospective.
**Gate:** Phase 3 gate — all three mini-systems work with tests. Complexity audit shows controlled essential complexity. Can critique each design for causality and cost. Day-7 interleaved recall covers Phase 1-3.

---

### Phase 4 / 4-5 weeks: Web Foundations

**Objective:** understand the HTTP request lifecycle from browser to PHP response, and build the web primitives that the framework will use.

**Focus A (60%):** HTTP lifecycle and web primitives — own implementations.
**Focus B (40%):** micro-reading of real frameworks. One class or method at a time, tied to the topic being studied. Not full reverse engineering — that requires the architectural base being built in this phase.

**Cognitive targets:** Abstraction Level Navigation (primary), Boundary and Contract Thinking (deepening), Second-Order Effects (introductory).

#### Unit 4.1: HTTP Protocol Essentials (3-4 days)
**Topics:** request/response cycle: method, URI, headers, body, status code. Statelessness and its consequences. Content-Type, Accept, cookies, caching headers. HTTPS: what TLS does (encryption, authentication), what it doesn't (application-level security).
**Build:** raw HTTP parser: given a request string, parse into method, path, headers, body. Given response components, build a valid HTTP response string.
**Thinking:** DI — draw the full request lifecycle: browser → DNS → TCP → TLS → HTTP request → web server → PHP → response → browser. EZ — explain statelessness and why it matters for session management.
**Micro-read:** Symfony `Request::createFromGlobals()` — just the constructor, trace how it reads `$_SERVER`.
**Gate:** can construct valid HTTP request/response by hand. Can explain statelessness and its consequences.

#### Unit 4.2: Front Controller and Boot Sequence (2-3 days)
**Topics:** single entry point pattern: all requests go through `index.php`. Why: centralized routing, middleware, error handling, consistent bootstrap. Boot sequence: autoload → configure → create kernel → handle request → emit response → terminate.
**Build:** minimal front controller (< 30 lines): receive request, match route from a simple array, call handler, send response. No classes yet — just the flow.
**Thinking:** causal trace: from Apache/Nginx receiving a request to PHP echoing a response — every step. WC — "what changes if you add authentication?"
**Micro-read:** Laravel `public/index.php` + bootstrap — trace the boot sequence.
**Gate:** can explain why one-file-per-page is inferior and what centralization enables. Can trace the full boot sequence causally.

#### Unit 4.3: Routing (4-5 days)
**Topics:** route declaration: HTTP method + URL pattern + handler. Matching: literal routes, parameterized routes (`/users/{id}`), parameter constraints. Route collection and matching algorithm: linear scan (simple, O(n)), tree-based (faster, complex), compiled/cached (fastest, most complex). Method filtering: 405 Method Not Allowed vs 404 Not Found distinction.
**Build:** own `Router` with: `addRoute(method, pattern, handler)`, `match(method, uri): RouteMatch|null`. Support literal and parameterized routes. Return 404 (no route) vs 405 (route exists but wrong method).
**Thinking:** CI — evaluate cost of linear scan for 10 routes vs 100 vs 1000. WNOW — "why not use regex for every route?" WB — "what happens with conflicting routes?"
**Micro-read:** Symfony `UrlMatcher` — just the matching algorithm, not the full component.
**Gate:** can implement router with parameterized routes. Can explain matching algorithm cost. Can distinguish 404 from 405.

#### Unit 4.4: Middleware Pipeline (3-4 days)
**Topics:** middleware: code that wraps request handling with before/after logic. Pipeline: ordered chain of middleware. Onion model: each middleware wraps the next, so the last-added middleware runs first (outermost layer). Short-circuiting: middleware can return response without calling the next handler (auth rejection, rate limiting, caching). Middleware vs event listener: middleware is serial with short-circuit capability, events are parallel (fan-out).
**Build:** own `MiddlewarePipeline` reusing Phase 3.7c Pipeline pattern. Adapt for HTTP: middleware receives Request and a callable `$next`, returns Response. Demonstrate ordering and short-circuit.
**Thinking:** DI — draw the onion layers for 3 middleware. PVE — predict execution order for AuthMiddleware → LoggingMiddleware → CorsMiddleware. WB — "what happens if middleware modifies Request after calling $next?"
**Micro-read:** Laravel `Pipeline::then()` — trace the reduce/callback approach.
**Gate:** can implement middleware pipeline with correct onion ordering. Can trace execution flow with short-circuit. Can explain middleware vs event listener distinction.

#### Unit 4.5: Request and Response Abstraction (3-4 days)
**Topics:** why abstract: testability (no reliance on superglobals), type safety, decoupling. Own `Request`: method, path, headers, body, query params — populated from `$_SERVER`, `$_GET`, `$_POST`, `php://input`. Own `Response`: status code, headers, body, `send()` method. PSR-7: immutability (why: middleware safety), `withX()` methods (what they cost: object creation per modification), stream bodies (why: large responses). Why not PSR-7 on day one: immutability adds complexity before you understand why it's needed.
**Build:** own `Request` and `Response` classes. Test without web server by constructing Request manually. Write a comparison document: own API vs PSR-7 — what PSR-7 adds, what it costs.
**Thinking:** WNOW — "why immutable? what problem does mutability actually cause in middleware?" CI — cost of PSR-7 immutability (new object per `withHeader`). Abstraction level exercise: same Request at HTTP string level, at PHP superglobal level, at object level.
**Micro-read:** PSR-7 `ServerRequestInterface` — just the interface, analyze what each method requires.
**Gate:** can create Request from superglobals and Response for output. Can explain PSR-7 trade-offs from direct experience, not from reading.

#### Unit 4.6: Controller Dispatch and Template Rendering (3-4 days)
**Topics:** controller: a callable that receives Request and returns Response. Dispatch: route match → resolve controller class → inject dependencies → call method. Separation: routing finds the handler, dispatcher executes it. Templates: PHP as template language with `extract()` + `include`. Layout pattern: base layout defines blocks, child template fills them. XSS prevention: `htmlspecialchars()` on every output, auto-escaping.
**Build:** own `ControllerDispatcher` that resolves `ClassName::method` with DI from Phase 3.5 container. Own `ViewRenderer` with layout support and auto-escaping helper.
**Thinking:** DI — trace from matched route to rendered HTML: route → dispatcher → controller → view → response. WB — identify XSS vectors in a template. CI — manual escaping vs auto-escaping: trade-off analysis.
**Micro-read:** how Laravel resolves controller from route — just the dispatch step.
**Gate:** can dispatch to controller with dependency injection. Can render templates with escaping. Can explain XSS causally.

#### Unit 4.7: PDO and Database Basics (3-4 days)
**Topics:** PDO: abstraction over database drivers. Prepared statements: why (SQL injection prevention, performance). Parameter binding: positional vs named. SQL injection: how it works (string interpolation into SQL), why prepared statements prevent it (query structure separated from data). Connection management. Transactions: begin/commit/rollback, atomicity.
**Build:** own `Connection` wrapper with: `query(sql, params): Statement`, `transaction(callable): mixed`. CRUD operations against SQLite. Demonstrate SQL injection on unprotected query, then prepared statement defense.
**Thinking:** WB — "what happens without transactions when two requests modify the same row?" DI — trace a prepared statement from PHP through PDO to the database engine. SA — "raw SQL is always bad" — steelman then attack.
**Gate:** can write safe database queries with prepared statements. Can explain SQL injection causally (not "it's bad" but "here's how the attack works mechanically"). Can use transactions correctly.

#### Unit 4.8: Phase 4 Integration (2-3 days)
**Build:** connect all Phase 4 primitives: front controller → router → middleware → controller → view/response → emit. A working mini-app that handles 3-4 routes with middleware and template rendering.
**Thinking:** full integration review: where are the boundaries? What contracts exist between components? What would break if any component's API changed? EZ — reconstruct the HTTP request lifecycle from blank page.
**Gate:** Phase 4 gate — mini-app works end to end. Can explain every component's role and its boundary contracts. Day-7 interleaved recall covers Phase 1-4.

---

### Phase 5 / 6-8 weeks: Framework Core v0

**Objective:** assemble a real framework kernel from Phase 3-4 components. Not a toy — a working system that handles requests, resolves dependencies, catches errors, and produces correct responses.

**Focus A (60%):** framework assembly, integration, edge cases.
**Focus B (40%):** integration testing, error handling design, complexity review.

**Cognitive targets:** Second-Order Effects (primary), Architectural Reasoning (primary), all prior skills reinforcing.

#### Build Sequence
1. **Kernel and Bootstrap** (3-4 days) — application lifecycle: boot → configure → handle → terminate. Configuration loading from PHP files. Environment detection.
2. **HTTP Layer Integration** (2-3 days) — integrate Phase 4 Request/Response/Emitter into the kernel. Request creation from superglobals, response emission.
3. **Router Integration** (3-4 days) — route declaration API, integrate with kernel request handling. Route groups, prefix support.
4. **Middleware Pipeline Integration** (2-3 days) — global middleware, route-specific middleware. Ordering guarantees.
5. **Container Integration** (3-4 days) — service registration, auto-wiring (simple), lifetime management. Container available to kernel, controllers, middleware.
6. **Controller Dispatch Integration** (2-3 days) — route → controller resolution → DI → method call → response.
7. **Error Handler** (3-4 days) — exception → response conversion. Different rendering for API (JSON error) vs web (HTML error page). 404/405/500 handling. Logging contract.
8. **Response Emitter** (1-2 days) — headers, body, status code emission. Edge cases: headers already sent, output buffering.
9. **Demo: JSON Notes API** (4-5 days) — CRUD for notes. Validation, error responses, proper status codes. SQLite storage via Phase 4 Connection.

**Thinking per build step:** WC — "what changes if we add X?" for each component. WB — failure scenarios for each integration point. CI — complexity audit after each integration. SA — "is this component boundary in the right place?"
**Gate:** Phase 5 gate — a request crosses the full pipeline. Dependencies resolve. Errors produce proper HTTP responses. Tests cover happy path + error paths. Complexity review shows no accidental complexity hotspots above CC 15 without justification.

---

### Phase 6 / 6-8 weeks: Hybrid Application Layer

**Objective:** extend the framework to handle server-side rendered applications alongside API responses, without architectural collapse.

**Focus A (60%):** application layer features — validation, persistence, views, sessions.
**Focus B (40%):** reverse engineering of mature frameworks. Now the user has enough architectural understanding to read Symfony/Laravel code at the design level and ask "why did they do it this way?"

#### Build Sequence
1. **Validation Layer** (3-4 days) — integrate Phase 3 Validator. Request validation, form validation, error display in templates.
2. **Database Layer** (4-5 days) — connection management, migrations (up/down), query builder basics (or thin repository pattern without ORM magic).
3. **View Layer Enhancement** (3-4 days) — layouts, partials, auto-escaping, form helpers.
4. **Sessions** (3-4 days) — session start, flash messages, session-based state. Understand: session storage, session hijacking risks, session fixation.
5. **CSRF Protection** (2-3 days) — token generation, token verification middleware, form integration.
6. **Auth Flow** (3-4 days) — only if the core is stable. Session-based login/logout, password hashing, access control middleware.
7. **Demo: Server-Side App** (5-6 days) — blog or task tracker with HTML + JSON endpoints. Full CRUD, validation, flash messages, CSRF, basic auth.

**Reverse engineering targets** (micro-reading evolves into design-level analysis):
- Symfony HttpKernel: request handling flow, event system integration.
- Laravel Container: binding types, contextual binding, auto-resolution.
- Comparison document: "why they did it this way and how our design differs."

**Thinking:** architectural review after each feature: does the framework still hold together? Where is coupling increasing? What would a second developer struggle with?
**Gate:** Phase 6 gate — both API and SSR demo work. No architectural collapse (each feature integrates without breaking existing features). Can explain every boundary. Reverse engineering comparison is written with causal reasoning, not just feature listing.

---

### Phase 7 / 3-4 weeks: Hardening, Observability, and Architectural Reflection

**Objective:** raise quality, document decisions, and produce an honest assessment of the framework and the learning journey.

**Focus A (60%):** quality hardening and documentation.
**Focus B (40%):** architectural reflection and comparison.

#### Work Sequence
1. **PHPStan Strictness** (2-3 days) — raise to maximum practical level, fix all issues.
2. **Complexity Audit** (2-3 days) — run PHPMD/phpmetrics on entire codebase. Identify hotspots. Refactor where accidental complexity exists. Document where essential complexity is justified.
3. **Dependency Audit** (1-2 days) — check coupling between modules. Identify any circular dependencies. Verify that dependency direction follows the architecture.
4. **Documentation** (3-4 days) — architecture document, known limitations, extension points, "why the framework is shaped this way."
5. **Comparison** (2-3 days) — compare against Symfony and Laravel: what problems they solve that we don't, what we did differently and why, what we'd change in v2.
6. **v2 Backlog** (1-2 days) — prioritized list of what to build next, with rationale.
7. **Learning Retrospective** (2-3 days) — honest assessment: what cognitive skills developed, what mental models are now stable, what gaps remain, what the next learning cycle should target.

**Gate:** Phase 7 gate — every important boundary can be defended. Every intentionally deferred feature can be named with rationale. Architecture dossier is complete. The learning retrospective is honest and specific, not vague self-congratulation.

---

## Planned Public Interfaces

Built incrementally across phases. Not designed up front — each interface emerges from the phase where it's implemented.

| Interface | Phase | Purpose |
|---|---|---|
| `Application\Kernel` | 5 | Bootstrap, request handling, exception boundary |
| `Http\Request` | 4-5 | Minimal own HTTP request abstraction |
| `Http\Response` | 4-5 | Minimal own HTTP response abstraction |
| `Http\ResponseEmitter` | 5 | Response output to client |
| `Routing\Router` | 4-5 | Route declaration and matching |
| `Routing\Route`, `RouteMatch` | 4-5 | Route and match result value objects |
| `Middleware\MiddlewareInterface` | 4-5 | Single pipeline contract |
| `Container\ContainerInterface` | 3-5 | Binding and resolution with explicit lifetime |
| `Controller\ControllerDispatcher` | 4-5 | Controller resolution and invocation |
| `View\ViewRenderer` | 4-6 | Template rendering with escaping |
| `Database\Connection` | 4-6 | PDO wrapper with prepared statements |
| `Database\MigrationRunner` | 6 | Schema migration up/down |
| `Validation\Validator` | 3-6 | Rule-based validation with typed results |
| `Event\Dispatcher` | 3 | Event propagation with priority |

PSR compatibility: PSR-4 and PSR-12 from Phase 1. PSR-3 (logging) and PSR-11 (container) after Phase 5 stabilizes. PSR-7 studied and compared but not implemented in full — own HTTP layer is simpler and teaches more at this stage.

## Test Plan

### Learning Tests (every unit)
- Blind reconstruction: explain concept from blank page — verified by AI review for accuracy and completeness.
- Spaced retrieval: day-1 / day-3 / day-7 recall tests as specified in retrieval protocol.
- Code-from-scratch: implement without AI, then compare and correct.

### Code Tests (every implementation)
- Unit tests: each data structure, each component, each mini-system.
- Edge case tests: empty input, null, boundary values, maximum size.
- Integration tests: component interactions (router + dispatcher, middleware + container).
- Failure tests: what happens when things go wrong (missing dependency, invalid route, malformed request).

### Framework Tests (Phase 5+)
- Middleware ordering: verify correct onion execution order.
- Route matching: literal, parameterized, 404, 405.
- Container resolution: transient vs singleton, circular dependency detection.
- Error handling: exception → correct HTTP response (JSON for API, HTML for web).
- Full pipeline: request → route → middleware → controller → response → emit.

### Quality Gates
- PHPStan: start at level 5 in Phase 1, increase 1 level per phase, reach maximum in Phase 7.
- Cyclomatic complexity: methods with CC > 10 require explanation. CC > 15 requires refactoring unless complexity is demonstrably essential.
- Test coverage: not a target number, but every public method and every error path must be tested.
- Review protocol: every phase answers 5 questions:
  1. What is essentially complex here?
  2. What is accidentally complex here?
  3. Where are the boundaries?
  4. What breaks under growth?
  5. What would be overengineering at this stage?

## Assumptions and Defaults
- Learning mode: build plus micro-read, not pure theory-first and not pure build-first. Full reverse engineering deferred until Phase 6 when architectural base is sufficient.
- Optimization criterion: depth and durability at the highest speed that still preserves mastery gates and spaced retrieval verification.
- First-cycle target: educational but serious, not fake production-ready.
- Architecture default: modular monolith; early package splitting is out.
- Standards default: PSR-4 and PSR-12 from Phase 1; PSR-3 and PSR-11 after Phase 5; PSR-7 studied but not implemented.
- Persistence default: SQLite first, then MySQL/MariaDB adaptation. ORM, queues, cache drivers, attribute-heavy magic, async, and full auth scaffolding are out of the first cycle.
- Cognitive development: not a separate track but woven into every unit through specific thinking exercises.
- Recalibration rule: if recall stability is higher than expected, units can be compressed. If understanding is weaker than expected, the calendar does not take priority over the gates. The slowdown protocol is not failure — it is the plan working correctly.
