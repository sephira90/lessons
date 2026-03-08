<?php

declare(strict_types=1);

namespace Lessons\Framework\Phase1;

final readonly class FloatObservation
{
    public function __construct(
        public string $label,
        public string $expression,
        public mixed $actual,
        public string $explanation
    ) {
    }
}
