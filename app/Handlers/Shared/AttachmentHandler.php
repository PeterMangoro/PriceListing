<?php

namespace App\Handlers\Shared;

use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\Model\ModelService;
use App\Actions\Shared\Attachment\GetAttachment;
use App\Actions\Shared\Attachment\RestoreAttachment;
use App\Actions\Shared\Attachment\DeleteAttachmentAction;

class AttachmentHandler
{
    public static function display(object $attachment)
    {
        $file = GetAttachment::forDisplay($attachment);

        return 
        response($file)
        ->header('Content-Type', $attachment->mime_type);
    }
}
