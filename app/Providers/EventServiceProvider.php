<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


// CreatingEvents
use App\Events\{    
    Accommodation\CreatingAccommodation,
    Accommodation\Room\CreatingAccommodationRoom,
    Accommodation\Booking\CreatingAccommodationBooking,
    Car\CreatingCar,
    Car\Insurance\CreatingCarInsurance,
    Plot\CreatingPlot,
    Product\CreatingProduct,
    Service\CreatingService,
    Transport\CreatingTransport,
    Employee\CreatingEmployee,
    Social\CreatingSocial,
   
};


//UpdatingEvents
use App\Events\{
    Accommodation\UpdatingAccommodation,
    Accommodation\Room\UpdatingAccommodationRoom,
    Accommodation\Booking\UpdatingAccommodationBooking,
    Car\UpdatingCar,
    Car\Insurance\UpdatingCarInsurance,
    Product\UpdatingProduct,
    Plot\UpdatingPlot,
    Service\UpdatingService,
    Transport\UpdatingTransport,
    Employee\UpdatingEmployee,
    Social\UpdatingSocial,
   
};

// CreatingListeners
use App\Listeners\{   
    Accommodation\CreateAccommodation,
    Accommodation\Room\CreateAccommodationRoom,
    Accommodation\Booking\CreateAccommodationBooking,
    Car\CreateCar,
    Car\Insurance\CreateCarInsurance,
    Plot\CreatePlot,
    Product\CreateProduct,
    Service\CreateService,
    Transport\CreateTransport,
    Employee\CreateEmployee,
    Social\CreateSocial,
   
};

//UpdatingListeners
use App\Listeners\{   
    Accommodation\UpdateAccommodation,
    Accommodation\Room\UpdateAccommodationRoom,
    Accommodation\Booking\UpdateAccommodationBooking,
    Car\UpdateCar,
    Car\Insurance\UpdateCarInsurance,
    Plot\UpdatePlot,
    Product\UpdateProduct,
    Service\UpdateService,
    Transport\UpdateTransport,
    Employee\UpdateEmployee,
    Social\UpdateSocial,
   
};
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        //  Creating
         CreatingAccommodation::class => [
            CreateAccommodation::class,
        ],
        CreatingAccommodationRoom::class => [
            CreateAccommodationRoom::class,
        ],


        CreatingAccommodationBooking::class => [
            CreateAccommodationBooking::class,
        ],


        CreatingCar::class => [
            CreateCar::class,
        ],

        CreatingCarInsurance::class => [
            CreateCarInsurance::class,
        ],

        CreatingProduct::class => [
            CreateProduct::class,
        ],


        CreatingPlot::class => [
            CreatePlot::class,
        ],

        CreatingService::class => [
            CreateService::class,
        ],

        CreatingTransport::class => [
            CreateTransport::class,
        ],

        CreatingEmployee::class => [
            CreateEmployee::class,
        ],

        CreatingSocial::class => [
            CreateSocial::class,
        ],

        //Updating
        UpdatingProduct::class => [
            UpdateProduct::class,
        ],

        UpdatingAccommodation::class => [
            UpdateAccommodation::class,
        ],

        UpdatingAccommodationRoom::class => [
            UpdateAccommodationRoom::class,
        ],


        UpdatingAccommodationBooking::class => [
            UpdateAccommodationBooking::class,
        ],

        UpdatingCar::class => [
            UpdateCar::class,
        ],

        UpdatingCarInsurance::class => [
            UpdateCarInsurance::class,
        ],


        UpdatingPlot::class => [
            UpdatePlot::class,
        ],

        UpdatingTransport::class => [
            UpdateTransport::class,
        ],

        UpdatingEmployee::class => [
            UpdateEmployee::class,
        ],

        UpdatingService::class => [
            UpdateService::class,
        ],

        UpdatingSocial::class => [
            UpdateSocial::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
