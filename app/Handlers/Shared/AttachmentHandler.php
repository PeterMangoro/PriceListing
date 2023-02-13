<?php

namespace App\Handlers\Shared;

use App\Actions\Shared\Attachment\GetAttachment;

class AttachmentHandler
{
    public static function display(object $attachment)
    {
        $file = GetAttachment::forDisplay($attachment);

        return response($file)
            ->header('Content-Type', $attachment->mime_type);
    }
}
