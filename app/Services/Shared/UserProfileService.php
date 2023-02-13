<?php

namespace App\Services\Shared;

use App\Actions\Shared\Profile\UpdateProfile;
use App\Http\Requests\Shared\Profile\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileService
{
    public static function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $location = [
            'street' => $request->street,
            'town' => $request->town,
            'city' => $request->city,
            'country' => $request->country,
        ];

        if ($request->document) {
            $model = Auth::user()->profile;

            if ($model) {
                AttachmentService::addDocument(
                    [
                        'document' => $request->document,
                        'title' => $request->document_title,
                        'mime_type' => $request->document->getClientMimeType(),
                    ],
                    $model,
                    'company'
                );
            } else {
                UpdateProfile::information($request);

                AttachmentService::addDocument(
                    [
                        'document' => $request->document,
                        'title' => $request->document_title,
                        'mime_type' => $request->document->getClientMimeType(),
                    ],
                    $model,
                    'company'
                );
            }
        } elseif ($request->street) {
            AddressService::updateForModel($user, $location);
        } else {
            UpdateProfile::information($request);
        }
    }
}
