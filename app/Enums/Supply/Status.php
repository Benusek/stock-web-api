<?php

namespace App\Enums\Supply;

enum Status: string
{
    case COMPLETED = 'completed';
    case DRAFT = 'draft';
    case CANCELED = 'canceled';

    public function label(): string
    {
        return match($this) {
            self::COMPLETED => 'Проведена',
            self::DRAFT => 'Черновик',
            self::CANCELED => 'Отменена',
        };
    }

    public function classes(): string
    {
        return match($this) {
            self::CANCELED => 'bg-red-100 text-red-700',
            self::DRAFT => 'bg-yellow-100 text-yellow-700',
            self::COMPLETED => 'bg-green-100 text-green-700',
        };
    }
}
