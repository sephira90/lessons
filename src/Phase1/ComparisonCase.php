<?php

declare(strict_types=1);

namespace Lessons\Framework\Phase1;

final readonly class ComparisonCase
{
    public function __construct(
        public string $label,
        public mixed $left,
        public string $operator,
        public mixed $right,
        public string $explanation
    ) {
    }
}
