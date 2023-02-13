<?php

namespace App\Builders\Transport;

use Carbon\Carbon;
use App\Models\Shared\Attachment;
use Illuminate\Database\Eloquent\Builder;

class TransportBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'transports.id',
            'uuid',
            'user_id',
            'car_id',
            'destination',
            'page_visits',
            'departure',
            'date',
            'price',
            'passengers',
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'uuid',
            'transports.id',
            'user_id',
            'car_id',
            'destination',
            'departure',
            'date',
            'price',
            'passengers',
            'detail'
        );
    }

    public function isScheduled(): self
    {
        return $this->where('date', '>', Carbon::now());
    }

    public function goingTo(string $destination): self
    {
        return $this->orWhere('destination', $destination);
    }

    public function comingFrom(string $departure): self
    {
        return $this->orWhere('departure', $departure);
    }

    public function forSale(): self
    {
        return $this->where('transport', '1');
    }

    public function withDisplayImage(): self
    {
        return $this->addSelect(
            [
                'latest_image' => Attachment::select('path') #'attachment' gives the slot name where the query will be stored
                    ->whereColumn('attachmentable_id', 'car_id') #select where ids match (column in attachments table, column in desired table)  ->whereColumn('product_id','products.id')
                    ->where('attachmentable_type', 'App\Models\Car')
                    ->orderByDesc('created_at') #order by latest pic
                    ->limit(1), #get just 1 attachment becoz sub queries only take 1
            ]
        );
    }

    public function dontInclude($id)
    {
        return $this->whereNot('transports.id', $id);
    }

    public function travelingSameRoute(string $departure, string $destination)
    {
        return $this->where('destination', $destination)
            ->where('departure', $departure);
    }
}
