<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/Phase1/FloatExplorerTest.php';
require_once __DIR__ . '/Phase1/TypeExplorerTest.php';

use function Lessons\Framework\Tests\Phase1\runFloatExplorerTests;
use function Lessons\Framework\Tests\Phase1\runTypeExplorerTests;

runFloatExplorerTests();
runTypeExplorerTests();

echo 'All tests passed.' . PHP_EOL;
