<?php

namespace App\DataObjects\Accommodation;

class AccommodationCreateData
{
    public function __construct(
        public readonly  array $images,
        public  readonly ?array $document,
        public  readonly int $a_rooms,
        public  readonly string $detail,
        public  readonly array $location,
        public  readonly float $price,
        public  readonly array $categories,
    ) {
       
    }
    public static function fromRequest($request)
    {
        $location = [
            'street' => $request->street,
            'town' => $request->town,
            'city' => $request->city,
            'country' => $request->country,
        ];

        if ($request->document) {
            $document = [
                'document' => $request->document,
                'title' => $request->document_title,
                'mime_type' => $request->document->getClientMimeType(),
            ];
        } else {
            $document = null;
        }

        return new self(
            $request->images,
            $document,
            $request->a_rooms,
            $request->detail,
            $location,
            $request->price,
            $request->categories,
        );
    }
}
