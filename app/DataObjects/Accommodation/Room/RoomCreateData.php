<?php

namespace App\DataObjects\Accommodation\Room;

class RoomCreateData
{
    public function __construct(
        public readonly  ?array $images,
        public  readonly string $title,
        public readonly  string $detail,
        public readonly  string $type,
        public  readonly float $price,
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(
            $request->images,
            $request->title,
            $request->detail,
            $request->type,
            $request->price,
        );
    }
}
