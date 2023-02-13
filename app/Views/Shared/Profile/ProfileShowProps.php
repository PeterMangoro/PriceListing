<?php

namespace App\Views\Shared\Profile;

use App\DataObjects\Company\CompanyData;
use App\DataObjects\Company\CompanyProfileData;
use App\DataObjects\Employee\EmployeeDisplayData;
use App\Models\User;
use App\ValueObjects\Address;
use App\ValueObjects\Socials;
use App\Views\Shared\BaseView;

class ProfileShowProps extends BaseView
{
    public function __construct(
        public User $user,
        public ?object $company = null
    ) {
        $this->company = $user;
    }

    public function company()
    {
        return CompanyData::of($this->company);
    }

    public function profile()
    {
        return CompanyProfileData::of(
            $this->company->profile()
                ->with('documents')
                ->first()
        );
    }

    public function contacts()
    {
        return Socials::from($this->company->socials);
    }

    public function address()
    {
        return Address::from($this->company->address);
    }

    public function employees()
    {
        return EmployeeDisplayData::collectionToWebPage(
            $this->company->employees()
                ->withDisplayImage()
                ->limit(12)
                ->get()
        );
    }

    public function counts()
    {
        return [
            'accommodations' => $this->company->accommodations()
                ->whereActive()
                ->count(),

            'cars' => $this->company->cars()
                ->whereActive()->count(),
            'products' => $this->company->products()
                ->whereActive()->count(),
            'products' => $this->company->products()
                ->whereActive()->count(),
            'services' => $this->company->services()
                ->whereActive()->count(),
            'plots' => $this->company->plots()
                ->whereActive()->count(),
            'employees' => $this->company->employees()->count(),

        ];
    }
}
