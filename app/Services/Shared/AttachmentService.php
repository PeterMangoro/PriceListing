<?php

namespace App\Services\Shared;

use App\Actions\Shared\Attachment\AddAttachmentAction;

class AttachmentService
{
    public static function addImages(
        array $images,
        object $product,
        string $type,
        int $size
    ): void {
        (new AddAttachmentAction())->handleImage(
            $images,
            $product,
            $type,
            $size
        );
    }

    public static function addEmployeeImage(
        array $avatar,
        object $employee,
        string $type,
        int $size
    ): void {
        (new AddAttachmentAction())->handleEmployeeImage(
            $avatar,
            $employee,
            $type,
            $size
        );
    }

    public static function addDocument(
        array $document,
        object $model,
        string $type
    ): void {
        AddAttachmentAction::handleDocument(
            $document,
            $model,
            $type
        );
    }
}
