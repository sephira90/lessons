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

    assertFloatExplorerSame(15, $facts['PHP_FLOAT_DIG'], 'PHP_FLOAT_DIG should match current environment');
    assertFloatExplorerSame(true, $facts['PHP_FLOAT_EPSILON'] > 0, 'PHP_FLOAT_EPSILON should be positive');
    assertFloatExplorerSame(false, (0.1 + 0.2) === 0.3, 'strict comparison for 0.1 + 0.2');
    assertFloatExplorerSame(true, $explorer->almostEqual(0.1 + 0.2, 0.3), 'almostEqual should handle classic case');
    assertFloatExplorerSame(10, count($observations), 'float observation count');
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
