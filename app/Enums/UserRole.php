<?php

namespace App\Enums;

enum UserRole: int
{
    case USER = 1;
    case ADMIN = 2;
    case OWNER = 3;

    public function label(): string
    {
        return match($this) {
            self::USER => 'Пользователь',
            self::ADMIN => 'Администратор',
            self::OWNER => 'Владелец',
        };
    }

    public function isAdmin(): bool
    {
        return $this->value >= self::ADMIN->value;
    }

    public function isOwner(): bool
    {
        return $this === self::OWNER;
    }
}