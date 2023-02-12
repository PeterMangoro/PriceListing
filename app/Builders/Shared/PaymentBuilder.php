<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

class PaymentBuilder extends Builder
{
    public function selectMinAttributes()
    {
        return $this->select(
            'id',
            'payable_type',
            'payable_id',
            'amount',
            'service',
            'created_at',
            'guest'
        );
    }
}
