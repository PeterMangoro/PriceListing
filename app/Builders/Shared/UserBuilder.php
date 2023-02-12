<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    public function withSocialAccounts()
    {
        return $this->with('socials:id,user_id,title,username,value');
    }
}
