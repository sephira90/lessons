<?php

declare(strict_types=1);

use Lessons\Framework\Phase1\FloatExplorer;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$explorer = new FloatExplorer();

echo 'Сначала зафиксируй предсказания в artifacts/answers/phase-1/unit-1-1a-float-and-precision.md, затем запускай этот скрипт для проверки.' . PHP_EOL;
echo PHP_EOL;
echo $explorer->render();
