<?php

namespace App\Actions\Shared\Attachment;

use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

class AddAttachmentAction
{
    /**
     * @param array<string ,mixed> $images
     */
    public function handleImage(
        array $images,
        object $model,
        string $folder,
        int $size
    ): void {
        $this->processImages(
            $images,
            $model,
            $folder,
            $size
        );
    }

    /**
     * @param array<string ,mixed> $images
     */
    public function handleEmployeeImage(
        array $images,
        object $model,
        string $folder,
        int $size
    ): void {
        $model->attachments()
            ->first()
            ->delete();
        $this->processImages(
            $images,
            $model,
            $folder,
            $size
        );
    }

    /**
     * @param array<string ,mixed> $document
     */
    public static function handleDocument(
        array $document,
        object $model,
        string $folder
    ): void {
        $path = $document['document']
            ->store('public/' . $folder . '/documents');
        $model->attachments()->create([
            'path' => $path,
            'type' => 'document',
            'title' => $document['title'],
            'mime_type' => $document['mime_type'],
        ]);
    }
    /**
     * @param array<string ,mixed> $images
     */
    private function processImages(
        array $images,
        object $model,
        string $folder,
        int $size
    ): void {
        Arr::map(
            $images,
            function ($file) use ($model, $folder, $size) {
                //format images
                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $hashName = hash('sha256', $name . time());
                $imageResize = Image::make($file->getRealPath());
                $imageResize->resize(
                    $size,
                    $size,
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                );

                //save to appropriate folder
                $imageResize->save('storage/' . $folder . '/images/' . $hashName . '.' . $ext);

                //save to database
                $model->attachments()->create([
                    'path' => '/storage/' . $folder . '/images/' . $hashName . '.' . $ext,
                    'type' => 'image',
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        );
    }
}
