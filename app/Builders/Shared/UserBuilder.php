<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    public function withSocialAccounts()
    {
        // return $this->with('socials:id,user_id,title,username,value');

        return $this->with(['socials' => function($query){
            $query->select(
                'id',
                'user_id',
                'title',
                'username',
                'value'
            )
            ->limit(6);
        }]);
    }
}
