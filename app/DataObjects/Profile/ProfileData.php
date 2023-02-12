<?php

namespace App\DataObjects\Profile;

use App\ValueObjects\Attachments;

class ProfileData
{
    public function __construct(
        public readonly  ?string $mission,
        public  readonly ?string $vision,
        public readonly  ?string $values,
        public readonly  ?string $history,
        public readonly  ?object $documents,
        public  readonly ?object $trashed_documents,
    ) {
        
    }

    public static function for_edit(?object $data)
    {
      
        if ($data === null) {
            return new self(
                null,
                null,
                null,
                null,
                null,
                null,
            );
        }
        return new self(
            $data ? $data->mission : null,
            $data ? $data->vision : null,
            $data ? $data->company_values : null,
            $data ? $data->history : null,
            $data->documents ? 
            Attachments::documentsForEdit($data->documents) : null,
            $data->trashed_documents ? 
            Attachments::documentsForEdit($data->trashed_documents) : null,
        );
    }
}
