<?php

declare(strict_types=1);

use Lessons\Framework\Phase1\LearnerTypeExplorerCases;
use Lessons\Framework\Phase1\TypeExplorer;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$explorer = new TypeExplorer();
$learnerCases = LearnerTypeExplorerCases::cases();

echo 'Сначала зафиксируй предсказания в artifacts/answers/phase-1/unit-1-1-types-and-type-system.md, затем запускай этот скрипт для проверки.' . PHP_EOL;
echo PHP_EOL;
echo 'Стандартные кейсы' . PHP_EOL;
echo $explorer->renderReport($explorer->run());
echo PHP_EOL;

if ($learnerCases === []) {
    echo 'Пользовательские кейсы пока не добавлены. Добавь их в src/Phase1/LearnerTypeExplorerCases.php.' . PHP_EOL;
    exit(0);
}

echo 'Пользовательские кейсы' . PHP_EOL;
echo $explorer->renderReport($explorer->run([], $learnerCases));
