<?php

namespace App\DataObjects\Company;

class CompanyData
{
    public function __construct(
        public readonly  string $name,
        public  readonly string $uuid,
        public readonly  int $id,
        public readonly  string $username,
    ) {
    }
    public static function of(object $company)
    {
        return new self(
            $company->name,
            $company->uuid,
            $company->id,
            $company->username,
        );
    }
}
