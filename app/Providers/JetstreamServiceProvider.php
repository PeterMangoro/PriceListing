<?php

namespace App\Providers;

use Illuminate\Http\Request;
use App\Models\Shared\Profile;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use App\DataObjects\Profile\ProfileData;
use App\DataObjects\Address\Partials\AddressForUpdate;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        //Add custom props to default jestream pages
        Jetstream::inertia()->whenRendering(
            'Profile/Show',
            function (Request $request, array $data) {
                return array_merge($data, [
                    // Custom data...
                    'profile' => ProfileData::for_edit($this->profile()),
                    'address' => $this->address(),
                ]);
            }
        );
    }

    public function profile()
    {
        return Profile::where('user_id', Auth::user()->id)
            ->with('documents', 'trashed_documents')
            ->first();
    }

    public function address()
    {
        return AddressForUpdate::from(
            Auth::user()->address
        );
    }


    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
