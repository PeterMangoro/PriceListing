<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class SocialBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'socials.id',
            'title',
            'username',
            'value',
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'socials.id',
            'title',
            'username',
            'value',
        );
    }
    public function belongsToAuthUser()
    {
        return $this->whereRelation('user', 'users.id', Auth::user()->id);
    }

    public function search(?string $terms = null)
    {
        $term = preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('title', 'like', $term);
        });
    }

    public function sort()
    {
        return $this->when(request('column'), function ($query) {
            $query->orderBy(request('column'), request('direction'));
        });
    }
}
