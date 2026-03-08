# Baseline Results

## Meta

- Date: 2026-03-08
- Time spent: ~1 session
- No-AI mode respected: yes

## Scores

- PHP basics: 2/5 — residual memory without causal model
- Code reading: 1/5 — syntax visible, contracts and system behavior not reconstructed
- Big-O and complexity: 1.5/5 — linear scan recognized, everything else fragmentary

## Strengths

- Honest self-assessment: "не знаю" and "хз" used where knowledge is absent, instead of confident fabrication
- Basic PHP syntax is not zero — there is residual coding memory to build on
- Array pass-by-value correctly identified in Block 2.1
- O(1) hash table average case correctly identified

## Gaps

- Pass-by-value model not operational: predicted `bump()` outputs 6 instead of 5
- Copy-on-write confused with object reference passing — these are three distinct mechanisms (COW, `&`, object handles), not two
- PHP arrays described by usage patterns ("можно переходить по элементам"), not by internal structure (ordered hash map) or cost model
- `require` vs `include` — consequence model absent ("вроде, не помню")
- Exceptions described as "обрабатываемая ошибка с логированием" — no distinction between boundary signals and internal error handling
- Container code reading: lifetime model not identified, hidden singleton mechanism not understood, type/contract problems not seen, accidental vs essential complexity not distinguished
- `array_shift` in loop: O(n) given instead of O(n²) total — the quadratic blowup from repeated reindexing not recognized
- Hash table worst case marked O(1) instead of O(n) — collision scenario not understood
- Amortized complexity: "без понятия"
- Cyclomatic vs cognitive complexity: definitions approximate, no operational understanding
- `normalizeEmail()`: validates before trimming, returns original `$email` lowercased instead of trimmed value

## Dangerous Illusions

- `bump()` prediction (6 instead of 5): felt confident about "инкремент применится к переменной, вне зависимости от локальности" — this is exactly the pattern where confidence exceeds understanding
- Hash table "always O(1)": the average-case answer was applied as if it were a universal guarantee
- Code reading felt like "I see the code" but the actual analysis was "геттер и сеттер, хз" — seeing syntax is not reading code

## Phase Impact

- Phase 1 must start from execution model fundamentals, not from syntax review
- Code reading deferred until own implementations provide the architectural vocabulary
- Reverse engineering of mature frameworks (Symfony, Laravel) pushed to Phase 6
- Plan restructured from 4 parallel tracks to 2 sequential focuses per phase
- Spaced retrieval protocol added — the biggest missing piece in the original plan

