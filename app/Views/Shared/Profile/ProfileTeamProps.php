<?php

namespace App\View\Shared\Profile;

use App\DataObjects\Employee\EmployeeDisplayData;
use App\Models\User;
use App\View\Shared\BaseView;

class ProfileTeamProps extends BaseView
{
    public function __construct(
        public User $user
    ) {
        $this->company = $user;
    }

    public function employees()
    {
        return 
        EmployeeDisplayData::toWebPage(
            $this->company->employees()
                ->withDisplayImage()
                ->paginate(12)
        );
    }
}
