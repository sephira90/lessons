<?php

declare(strict_types=1);

namespace Lessons\Framework\Phase1;

final class LearnerTypeExplorerCases
{
    /**
     * @return list<ComparisonCase>
     */
    public static function cases(): array
    {
        return [
            new ComparisonCase(
                'null против единицы',
                null,
                '==',
                1,
                'null приводится к 0, 1 приводится к 1, 0 сравнивается с 1, результат false'
            ),
            new ComparisonCase(
                'false против единицы',
                false,
                '==',
                1,
                'false приводится к 0, 1 приводится к 1, 0 сравнивается с 1, результат false'
            ),
            new ComparisonCase(
                'числовая строка против единицы',
                '1',
                '==',
                0,
                'строка \'1\' приводится к 1, 0 приводится к 0, результат false'
            ),
            new ComparisonCase(
                'числовая строка против единицы строго',
                '12',
                '===',
                12,
                'типы не совпадают - результат false, полагаю, совпали бы типы - можно было бы проверять по значению, то есть порядок - вначале сравнение типов'
            ),
        ];
    }
}
