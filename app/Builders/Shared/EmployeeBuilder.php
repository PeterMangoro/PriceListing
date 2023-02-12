<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EmployeeBuilder extends Builder
{
    public function selectDetailAttributes()
    {
        return $this->select(
            'id',
            'user_id',
            'name',
            'position'
        );
    }

    public function withRatings()
    {
        return $this->select(
            'id',
            'user_id',
            'name',
            'position'
        );
    }

        public function belongsToAuthUser()
        {
            return $this->where('user_id', Auth::user()->id);
        }

        public function withDisplayImage()
        {
            return $this->with('attachments');
        }

        public function sort()
        {
            return $this->when(request('column'), function ($query) {
                $query->orderBy(request('column'), request('direction'));
            });
        }
}
