<?php

namespace App\Handlers\Shared;

use App\Models\Shared\Social;
use App\Events\Social\CreatingSocial;
use App\Events\Social\UpdatingSocial;
use App\DataObjects\Social\SocialCreateData;
use App\DataObjects\Social\SocialUpdateData;
use App\Http\Requests\Shared\Social\CreateSocialRequest;
use App\Http\Requests\Shared\Social\UpdateSocialRequest;



class SocialHandler
{


    public static function store(CreateSocialRequest $request)
    {
        $validated_object = SocialCreateData::fromRequest($request);
       
        event(new CreatingSocial($validated_object));
    }

    public static function update(UpdateSocialRequest $request, Social $social)
    {
        $validated_object = SocialUpdateData::fromRequest($request);      
        event(new UpdatingSocial($validated_object,$social));
    }

   
}
