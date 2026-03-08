<?php

declare(strict_types=1);

namespace Lessons\Framework\Phase1;

use InvalidArgumentException;

final class TypeExplorer
{
    /**
     * @return list<ComparisonCase>
     */
    public function defaultCases(): array
    {
        return [
            new ComparisonCase(
                'целое ноль против строки ноль',
                0,
                '==',
                '0',
                '`==` выполняет type juggling (автоматическое приведение типов), поэтому целое число `0` и строка `\'0\'` считаются равными.'
            ),
            new ComparisonCase(
                'пустая строка против false',
                '',
                '==',
                false,
                'Пустая строка при loose comparison (нестрогом сравнении) приводится так, что становится равной `false`.'
            ),
            new ComparisonCase(
                'строка ноль против false',
                '0',
                '==',
                false,
                'Строка `\'0\'` - один из классических edge cases (краевых случаев): при нестрогом сравнении она считается равной `false`.'
            ),
            new ComparisonCase(
                'null против false',
                null,
                '==',
                false,
                '`null` и `false` становятся равными при нестрогом сравнении, поэтому `==` опасно использовать на границах системы и в проверках входных данных.'
            ),
            new ComparisonCase(
                'null против нуля',
                null,
                '==',
                0,
                '`null == 0` даёт `true`, потому что при loose comparison (нестрогом сравнении) обе стороны через coercion (приведение) переводятся к сопоставимым скалярным значениям.'
            ),
            new ComparisonCase(
                'целое ноль против строки ноль строго',
                0,
                '===',
                '0',
                '`===` сравнивает и значение, и тип, поэтому целое `0` не идентично строке `\'0\'`.'
            ),
            new ComparisonCase(
                'false против нуля строго',
                false,
                '===',
                0,
                '`false` и целое `0` могут быть нестрого равны, но не являются идентичными, потому что их типы различаются.'
            ),
            new ComparisonCase(
                'строка один против целого один',
                '1',
                '==',
                1,
                'При нестрогом сравнении числовая строка приводится к целому числу, поэтому значения совпадают.'
            ),
        ];
    }

    /**
     * @param list<ComparisonCase> $additionalCases
     * @return list<ComparisonCase>
     */
    public function allCases(array $additionalCases = []): array
    {
        return [...$this->defaultCases(), ...$additionalCases];
    }

    public function evaluate(ComparisonCase $case): bool
    {
        return match ($case->operator) {
            '==' => $case->left == $case->right,
            '===' => $case->left === $case->right,
            default => throw new InvalidArgumentException("Неподдерживаемый оператор: {$case->operator}"),
        };
    }

    /**
     * @param array<string, string> $predictions
     * @param list<ComparisonCase>|null $cases
     * @return list<array{
     *     label: string,
     *     expression: string,
     *     predicted: ?bool,
     *     actual: bool,
     *     correct: ?bool,
     *     explanation: string
     * }>
     */
    public function run(array $predictions = [], ?array $cases = null): array
    {
        $results = [];
        $cases ??= $this->defaultCases();

        foreach ($cases as $case) {
            $predicted = array_key_exists($case->label, $predictions)
                ? $this->normalizePrediction($predictions[$case->label])
                : null;
            $actual = $this->evaluate($case);

            $results[] = [
                'label' => $case->label,
                'expression' => $this->describe($case->left) . ' ' . $case->operator . ' ' . $this->describe($case->right),
                'predicted' => $predicted,
                'actual' => $actual,
                'correct' => $predicted === null ? null : $predicted === $actual,
                'explanation' => $case->explanation,
            ];
        }

        return $results;
    }

    public function normalizePrediction(string $prediction): bool
    {
        return match (strtolower(trim($prediction))) {
            'true', 't', '1', 'yes', 'y', 'да', 'д', 'истина' => true,
            'false', 'f', '0', 'no', 'n', 'нет', 'н', 'ложь' => false,
            default => throw new InvalidArgumentException("Неподдерживаемое значение предсказания: {$prediction}"),
        };
    }

    /**
     * @param list<array{
     *     label: string,
     *     expression: string,
     *     predicted: ?bool,
     *     actual: bool,
     *     correct: ?bool,
     *     explanation: string
     * }> $results
     */
    public function renderReport(array $results): string
    {
        $lines = [];

        foreach ($results as $index => $result) {
            $lines[] = sprintf('%d. %s', $index + 1, $result['expression']);

            if ($result['predicted'] !== null) {
                $lines[] = '   предсказание: ' . $this->booleanToWord($result['predicted']);
                $lines[] = '   верно: ' . ($result['correct'] ? 'да' : 'нет');
            }

            $lines[] = '   факт: ' . $this->booleanToWord($result['actual']);
            $lines[] = '   объяснение: ' . $result['explanation'];
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function booleanToWord(bool $value): string
    {
        return $value ? 'true' : 'false';
    }

    private function describe(mixed $value): string
    {
        if ($value === null) {
            return 'null';
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_string($value)) {
            return "'" . $value . "'";
        }

        return (string) $value;
    }
}
