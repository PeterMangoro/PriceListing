<?php

namespace App\DataObjects\Service;

use App\ValueObjects\Address;
use App\ValueObjects\Attachments;
use App\ValueObjects\Ratings;
use App\ValueObjects\Socials;
use Illuminate\Support\Collection;

class ServiceDetailData
{
    public function __construct(
        public readonly  int $id,
        public  readonly  Collection|array $images,
        public  readonly  Collection|array|null $documents,
        public  readonly string $title,
        public  readonly string $detail,
        public  readonly object $location,
        public  readonly string $owner,
        public  readonly string $username,
        public  readonly ?Collection $contact,
        public  readonly ?object $ratings,
    ) {
    }
    public static function toWebPage($service)
    {
        return new self(
            $service->id,
            Attachments::imagesFrom($service->attachments),
            Attachments::documentsFrom($service->documents),
            $service->title,
            $service->detail,
            Address::from($service->user->address),
            $service->user->name,
            $service->user->username,
            Socials::from($service->user->socials),
            Ratings::from($service->ratings),
        );
    }
}
