<?php

namespace App\Views\Shared\Profile;

use App\DataObjects\Employee\EmployeeDisplayData;
use App\Models\User;
use App\Views\Shared\BaseView;

class ProfileTeamProps extends BaseView
{
    public User $company;
    public function __construct(
        public User $user
    ) {
        $this->company = $user;
    }

    public function employees()
    {
        return EmployeeDisplayData::toWebPage(
            $this->company->employees()
                ->withDisplayImage()
                ->paginate(12)
        );
    }
}
