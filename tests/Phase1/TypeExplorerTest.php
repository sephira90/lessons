<?php

declare(strict_types=1);

namespace Lessons\Framework\Tests\Phase1;

use InvalidArgumentException;
use Lessons\Framework\Phase1\ComparisonCase;
use Lessons\Framework\Phase1\TypeExplorer;
use RuntimeException;

function runTypeExplorerTests(): void
{
    $explorer = new TypeExplorer();
    $results = $explorer->run();
    $customResults = $explorer->run([], [
        new ComparisonCase(
            'custom strict case',
            '1',
            '===',
            1,
            'Строгое сравнение не приводит типы.'
        ),
    ]);

    assertSame(8, count($results), 'default case count');
    assertSame(true, $results[0]['actual'], '0 == "0" should be true');
    assertSame(false, $results[5]['actual'], '0 === "0" should be false');
    assertSame(9, count($explorer->allCases([
        new ComparisonCase('x', null, '==', false, 'x'),
    ])), 'allCases should merge default and custom cases');
    assertSame(1, count($customResults), 'custom run should use provided cases');
    assertSame(false, $customResults[0]['actual'], 'strict custom case should be false');
    assertSame(true, $explorer->normalizePrediction('YES'), 'normalize YES');
    assertSame(false, $explorer->normalizePrediction('0'), 'normalize 0');

    try {
        $explorer->normalizePrediction('maybe');
        throw new RuntimeException('normalizePrediction should reject invalid values');
    } catch (InvalidArgumentException) {
    }
}

function assertSame(mixed $expected, mixed $actual, string $label): void
{
    if ($expected !== $actual) {
        throw new RuntimeException(
            sprintf('%s failed. Expected %s, got %s', $label, var_export($expected, true), var_export($actual, true))
        );
    }
}
