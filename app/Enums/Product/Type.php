<?php

namespace App\Enums\Product;

enum Type: string
{
    case INGREDIENT = 'ingredient';
    case FINISHED = 'finished';

    public function label(): string
    {
        return match($this) {
            self::INGREDIENT => 'Ингридиент',
            self::FINISHED => 'Готовый',
        };
    }

    public function classes(): string
    {
        return match($this) {
            self::INGREDIENT => 'bg-blue-100 text-blue-700',
            self::FINISHED => 'bg-green-100 text-green-700',
        };
    }
}
