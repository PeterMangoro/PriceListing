<?php

namespace App\DataObjects\Service;

class ServiceUpdateData
{
    public function __construct(
        public readonly  ?array $images,
        public  readonly ?array $document,
        public  readonly string $title,
        public  readonly string $detail,
        public  readonly ?array $categories,
        public  readonly bool $sale_status,
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
            $request->categories,
            $request->sale_status,
        );
    }
}
