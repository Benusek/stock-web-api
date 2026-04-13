<?php

namespace App\Enums\Product;

enum Unit: string
{
    case LITER = 'liter';
    case PIECE = 'piece';
    case KG = 'kg';

    public function label(): string
    {
        return match($this) {
            self::LITER => 'Литр',
            self::PIECE => 'Штука',
            self::KG => 'Килограмм',
        };
    }
}
