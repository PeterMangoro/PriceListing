<?php

namespace App\DataObjects\Accommodation;

class AccommodationUpdateData
{
    public function __construct(
        public readonly ?array $images,
        public readonly ?array $document,
        public readonly string $a_rooms,
        public readonly string $detail,
        public readonly array $location,
        public readonly float $price,
        public readonly ?array $categories,
        public readonly bool $sale_status,
        public readonly ?array $discount,
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

        $discount = [
            'price' => $request->discount,
            'exp_date' => $request->date,
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
            $request->sale_status,
            $discount
        );
    }
}
