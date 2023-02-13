<?php

namespace App\DataObjects\Company;

use App\ValueObjects\Attachments;
use App\ValueObjects\Values;
use Illuminate\Support\Collection;

class CompanyProfileData
{
    public function __construct(
        public readonly  ?array $values,
        public  readonly ?string $history,
        public  readonly ?string $mission,
        public  readonly ?string $vision,
        public  readonly ?string $date,
        public readonly  Collection|array|null $documents,
    ) {
    }

    public static function of(?object $company)
    {
        if ($company === null) {
            return new self(
                null,
                null,
                null,
                null,
                null,
                null
            );
        }
        return new self(
            Values::fromString($company->company_values),
            $company->history,
            $company->mission,
            $company->vision,
            $company->year,
            Attachments::documentsFrom($company->documents)
        );
    }
}
