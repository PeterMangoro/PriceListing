<?php

namespace App\ValueObjects;

use Illuminate\Support\Collection;

class Ratings
{
    public function __construct(
        public string $av_rating,
        public Collection $comments,
    ) {
        $this->av_rating = $av_rating;
        $this->comments = $comments;
    }

    public static function from(object $ratings): self
    {
        return new self(
            AvgRating::of($ratings),
            $ratings->map(fn ($rating) => [
                'comment' => $rating->comment,
                'rating' => $rating->rating,
                'user' => $rating->name,
            ])
        );
    }
}
