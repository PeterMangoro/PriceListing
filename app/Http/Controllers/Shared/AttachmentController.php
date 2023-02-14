<?php

namespace App\Http\Controllers\Shared;

use App\Handlers\Shared\AttachmentHandler;
use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Models\Shared\Attachment;

class AttachmentController extends Controller
{
    public function update(int $attachment)
    {
        ModelHandler::restore(new Attachment(), $attachment);
        return back()->with('flash.banner', 'Attachment successfully restored');
    }

    public function destroy(Attachment $attachment)
    {
        ModelHandler::delete($attachment);
        return back()->with('flash.banner', 'Attachment deleted');
    }

    public function show(Attachment $attachment)
    {
        return AttachmentHandler::display($attachment);
    }
}
