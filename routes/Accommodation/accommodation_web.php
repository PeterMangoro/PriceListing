<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accommodation\Room\RoomController;
use App\Http\Controllers\Accommodation\AccommodationController;
use App\Http\Controllers\Accommodation\Room\RoomBookingController;
use App\Http\Controllers\Accommodation\AccommodationTrashedController;
use App\Http\Controllers\Shared\Payment\Accommodation\AccommodationRoomPaymentController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('user')
        ->group(function () {
            Route::resource('accommodations', AccommodationController::class)->except('show');

            Route::resource('accommodations/trashed', AccommodationTrashedController::class)
                ->only(['index','show'])->names([
                    'index' => 'accommodations.trashed.index',
                    'show' => 'accommodations.trashed.show',
                ])->withTrashed();

            Route::resource('accommodations.rooms', RoomController::class)->scoped([
                'accommodation' => 'uuid',
            ]);

            Route::post('booking/room/{room}', [RoomBookingController::class,'store'])->name('accommodation.room.check_in');
            Route::delete('booking/room/{room}', [RoomBookingController::class,'destroy'])->name('accommodation.room.check_out');

            Route::controller(AccommodationRoomPaymentController::class)
                ->prefix('accommodations/{accommodation:uuid}/payments')
                ->name('accommodations.payments.')
                ->group(function () {
                    Route::get('today', 'today')->name('today');
                    Route::get('week', 'week')->name('week');
                    Route::get('month', 'month')->name('month');
                    Route::get('year', 'year')->name('year');
                    Route::get('all', 'index')->name('all');
                });
        });
});
