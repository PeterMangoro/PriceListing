<?php

namespace App\ValueObjects;

class Attachments
{
    public static function imagesFrom(object $value)
    {
        return count($value) > 0
            ? $value->map(
                fn ($image) => [
                    'path' => str_replace('public/', '/storage/', $image->path),
                ]
            )
            :
             [
                 ['path' => '/storage/no-thumbnail/no-thumbnail.webp'],
             ];
    }

    public static function documentsFrom(object $value)
    {
        return count($value) > 0
            ? $value->map(fn ($document) => [
                'path' => $document->path,
                'name' => $document->title,
                'uuid' => $document->uuid,
            ])
            : [[
                'name' => 'No Documents Found',
                'uuid' => 'null',
            ],
            ];
    }

    public static function imagesForEdit(object $value)
    {
        return count($value) > 0
            ? $value->map(fn ($image) => [
                'path' => $image->path,
                'id' => $image->id,
                'deleted_at' => $image->deleted_at,
            ])
            : null;
    }

    public static function documentsForEdit(object $value)
    {
        return count($value) > 0
            ? $value->map(fn ($document) => [
                'path' => $document->path,
                'name' => $document->title,
                'uuid' => $document->uuid,
                'id' => $document->id,
                'deleted_at' => $document->deleted_at,
            ])
            : null;
    }

    public static function imagesForDisplay(object $value): string
    {
        if ((collect($value)['latest_image'])) {
            return str_replace('public/', '/storage/', collect($value)['latest_image']['path']);
        }

        if ($value->featurable) {
            return collect($value)['featurable']['latest_image']['path'];
        }
        return '/storage/no-thumbnail/no-thumbnail.webp';
    }
}
