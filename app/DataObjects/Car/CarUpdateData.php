<?php

namespace App\DataObjects\Car;

class CarUpdateData
{
    public function __construct(
        public readonly  ?array $images,
        public  readonly ?array $document,
        public  readonly int $car_make_id,
        public  readonly int $car_model_id,
        public  readonly ?string $num_plate,
        public  readonly string $detail,
        public  readonly array $location,
        public  readonly float $price,
        public  readonly ?bool $sale_status,
        public  readonly ?bool $rent_status,
        public  readonly ?array $discount,
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
            $request->car_make_id,
            $request->car_model_id,
            $request->num_plate,
            $request->detail,
            $location,
            $request->price,
            $request->sale_status,
            $request->rent_stat,
            $discount
        );
    }
}
