<?php

namespace App\Http\Controllers;

use App\Handlers\Shared\AttachmentHandler;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    public function update(int $attachment)
    {
        $this->handle()::restore($attachment);           //deletes accommodation
        return back()->with('flash.banner', 'Attachment deleted');
    }

    public function destroy(Attachment $attachment)
    {
        $this->handle()::delete($attachment);           //deletes accommodation
        return back()->with('flash.banner', 'Attachment deleted');
    }

    public function show(Attachment $attachment)
    {
        return $this->handle()::display($attachment);
    }

    public function download(Attachment $attachment)
    {
    }

    private function handle()
    {
        return new AttachmentHandler();
    }
}
