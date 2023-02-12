<?php

namespace App\DataObjects\Product;

class ProductCreateData
{
    public function __construct(
        public readonly array $images,
        public readonly ?array $document,
        public readonly string $title,
        public readonly string $detail,
        public readonly float $price,
        public readonly array $categories,
    ) {
        
    }
    public static function fromRequest($request)
    {
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
            $request->title,
            $request->detail,
            $request->price,
            $request->categories,
        );
    }
}
