<?php

namespace App\DataObjects\Service\Partials;

use App\ValueObjects\Attachments;

class ServiceForUpdate
{
    public function __construct(
        public readonly  string $uuid,
        public  readonly object $attachments,
        public  readonly ?object $trashed_images,
        public  readonly ?object $documents,
        public  readonly ?object $trashed_documents,
        public  readonly object $categories,
        public  readonly array $detail,
        public readonly  int $id,
        public readonly  bool $sale_status,
        public  readonly string $title,
    ) {
    }

    public static function from(object $service)
    {
        return new self(
            $service->uuid,
            Attachments::imagesForEdit($service->attachments),
            Attachments::imagesForEdit($service->trashed_attachments),
            Attachments::documentsForEdit($service->documents),
            Attachments::documentsForEdit($service->trashed_documents),
            (object) $service->categories,
            $service->detail,
            $service->id,
            $service->sale_status,
            $service->title,
        );
    }
}
