<?php

namespace Src\Shared\Domain;

enum DepartmentType: string
{
    case IT = 'it';
    case PM = 'pm';
    case Marketing = 'marketing';
    case Seller = 'seller';

    public static function fromName(string $name): self
    {
        foreach (self::cases() as $status) {
            if(strtolower($name) === strtolower($status->name)){
                return $status;
            }
        }
        throw new \ValueError("$name is not a valid backing value for enum " . self::class );
    }
    public function salary(): int
    {
        return match($this)
        {
            self::IT => 50,
            self::PM => 40,
            self::Marketing => 35,
            self::Seller => 30,
        };
    }
}