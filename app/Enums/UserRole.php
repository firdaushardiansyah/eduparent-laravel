<?php

namespace App\Enums;

enum UserRole: string
{
    case Guru = 'guru';
    case Ortu = 'ortu';

    /**
     * Get the display label for the role.
     */
    public function label(): string
    {
        return match ($this) {
            self::Guru => 'Guru',
            self::Ortu => 'Orang Tua',
        };
    }

    /**
     * Get all role values.
     *
     * @return array<string>
     */
    public static function values(): array
    {
        return array_map(fn (self $role) => $role->value, self::cases());
    }
}
