<?php

declare(strict_types=1);

namespace Lessons\Framework\Phase1;

final class FloatExplorer
{
    /**
     * @return array{
     *     PHP_FLOAT_DIG: int,
     *     PHP_FLOAT_EPSILON: float,
     *     PHP_FLOAT_MAX: float,
     *     PHP_FLOAT_MIN: float
     * }
     */
    public function environmentFacts(): array
    {
        return [
            'PHP_FLOAT_DIG' => PHP_FLOAT_DIG,
            'PHP_FLOAT_EPSILON' => PHP_FLOAT_EPSILON,
            'PHP_FLOAT_MAX' => PHP_FLOAT_MAX,
            'PHP_FLOAT_MIN' => PHP_FLOAT_MIN,
        ];
    }

    /**
     * @return list<FloatObservation>
     */
    public function observations(): array
    {
        $sumTenTenths = $this->sumTenths(10);

        return [
            new FloatObservation(
                'Сумма 0.1 + 0.2',
                '0.1 + 0.2',
                0.1 + 0.2,
                'Числа `0.1` и `0.2` не представимы точно в двоичной форме, поэтому хранится ближайшее приближение, а не идеальное десятичное значение.'
            ),
            new FloatObservation(
                'Строгое сравнение суммы с 0.3',
                '(0.1 + 0.2) === 0.3',
                (0.1 + 0.2) === 0.3,
                '`===` проверяет точное совпадение значения и типа. Приближение для `0.1 + 0.2` не совпадает бит-в-бит с приближением для `0.3`.'
            ),
            new FloatObservation(
                'Нестрогое сравнение суммы с 0.3',
                '(0.1 + 0.2) == 0.3',
                (0.1 + 0.2) == 0.3,
                'Даже нестрогое сравнение не спасает, потому что здесь обе стороны уже одного типа `float`, а различие остаётся в самом значении.'
            ),
            new FloatObservation(
                'Сравнение через epsilon',
                'abs((0.1 + 0.2) - 0.3) < 1e-12',
                $this->almostEqual(0.1 + 0.2, 0.3),
                'Для `float` инженерно полезнее сравнивать не на точное равенство, а на достаточную близость через `epsilon` (очень малый допустимый порог погрешности).'
            ),
            new FloatObservation(
                'Разность 0.3 - 0.2',
                '0.3 - 0.2',
                0.3 - 0.2,
                'Проблема не только в сложении. Разность тоже работает с приближениями и поэтому может дать число, которое выглядит как `0.1`, но хранится иначе.'
            ),
            new FloatObservation(
                'Строгое сравнение разности с 0.1',
                '(0.3 - 0.2) === 0.1',
                (0.3 - 0.2) === 0.1,
                'Даже если напечатанное значение похоже на `0.1`, это не гарантирует точного совпадения внутреннего представления.'
            ),
            new FloatObservation(
                'Умножение 0.1 * 10',
                '0.1 * 10',
                0.1 * 10,
                'Некоторые выражения на `float` случайно попадают в точно представимое значение. Это не делает тип точным вообще, а только показывает, что погрешность иногда компенсируется.'
            ),
            new FloatObservation(
                'Строгое сравнение произведения с 1.0',
                '(0.1 * 10) === 1.0',
                (0.1 * 10) === 1.0,
                'В этом конкретном случае произведение совпало с `1.0` точно. Это хороший контрпример против слишком грубой модели "с `float` всегда всё неточно".'
            ),
            new FloatObservation(
                'Накопление 0.1 десять раз',
                '$sum = 0.0; repeat 10 times { $sum += 0.1; }',
                $sumTenTenths,
                'Повторение операции часто опаснее одного выражения: маленькая ошибка представления может накапливаться и давать заметный итоговый сдвиг.'
            ),
            new FloatObservation(
                'Сравнение накопленной суммы с 1.0 через epsilon',
                'abs($sum - 1.0) < 1e-12',
                $this->almostEqual($sumTenTenths, 1.0),
                'Накопленная сумма может быть не равна `1.0` строго, но оставаться достаточно близкой для инженерной задачи, если это допустимо по доменным требованиям.'
            ),
        ];
    }

    public function almostEqual(float $left, float $right, float $epsilon = 1e-12): bool
    {
        return abs($left - $right) < $epsilon;
    }

    public function sumTenths(int $iterations): float
    {
        $sum = 0.0;

        for ($index = 0; $index < $iterations; $index++) {
            $sum += 0.1;
        }

        return $sum;
    }

    public function render(): string
    {
        $lines = ['Среда float', sprintf('PHP_FLOAT_DIG = %d', PHP_FLOAT_DIG)];
        $lines[] = 'PHP_FLOAT_EPSILON = ' . $this->describe(PHP_FLOAT_EPSILON);
        $lines[] = 'PHP_FLOAT_MAX = ' . $this->describe(PHP_FLOAT_MAX);
        $lines[] = 'PHP_FLOAT_MIN = ' . $this->describe(PHP_FLOAT_MIN);
        $lines[] = '';
        $lines[] = 'Наблюдения';

        foreach ($this->observations() as $index => $observation) {
            $lines[] = sprintf('%d. %s', $index + 1, $observation->expression);
            $lines[] = '   факт: ' . $this->describe($observation->actual);
            $lines[] = '   объяснение: ' . $observation->explanation;
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function describe(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_float($value)) {
            return var_export($value, true);
        }

        return (string) $value;
    }
}
