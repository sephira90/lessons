<?php

declare(strict_types=1);

namespace Lessons\Framework\Tests\Phase1;

use Lessons\Framework\Phase1\FloatExplorer;
use RuntimeException;

function runFloatExplorerTests(): void
{
    $explorer = new FloatExplorer();
    $facts = $explorer->environmentFacts();
    $observations = $explorer->observations();
    $comparisonObservations = $explorer->comparisonObservations();

    assertFloatExplorerSame(15, $facts['PHP_FLOAT_DIG'], 'PHP_FLOAT_DIG should match current environment');
    assertFloatExplorerSame(true, $facts['PHP_FLOAT_EPSILON'] > 0, 'PHP_FLOAT_EPSILON should be positive');
    assertFloatExplorerSame(false, (0.1 + 0.2) === 0.3, 'strict comparison for 0.1 + 0.2');
    assertFloatExplorerSame(true, $explorer->almostEqual(0.1 + 0.2, 0.3), 'almostEqual should handle classic case');
    assertFloatExplorerSame(true, 1.0 == 1, 'float should equal int loosely');
    assertFloatExplorerSame(false, 1.0 === 1, 'float should not equal int strictly');
    assertFloatExplorerSame(true, 0.0 == false, 'zero float should equal false loosely');
    assertFloatExplorerSame(false, 1.5 == 'foo', 'float should not equal non numeric string');
    assertFloatExplorerSame(9, count($comparisonObservations), 'float comparison observation count');
    assertFloatExplorerSame(19, count($observations), 'float observation count');
    assertFloatExplorerSame(0.9999999999999999, $explorer->sumTenths(10), 'sumTenths should show accumulation error');
}

function assertFloatExplorerSame(mixed $expected, mixed $actual, string $label): void
{
    if ($expected !== $actual) {
        throw new RuntimeException(
            sprintf('%s failed. Expected %s, got %s', $label, var_export($expected, true), var_export($actual, true))
        );
    }
}
