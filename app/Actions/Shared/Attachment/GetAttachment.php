<?php

namespace App\Actions\Shared\Attachment;

use Illuminate\Support\Facades\Storage;

class GetAttachment
{
    public static function forDisplay(object $attachment): string
    {
        $path = str_replace('public/', '', $attachment->path);
        // public/product/documents/J2Tm1gV7l67U2rUlxgHoJVFEk2unxkESBBaKnDJR.pdf
        // /storage/product/images/8224efec82dafeb9eede60b94b609d814a2eaecf4d520c793c45ab8d04e7dff0.jpg
        // dd($attachment->path);
        return Storage::disk('public')->get($path);
    }
}
