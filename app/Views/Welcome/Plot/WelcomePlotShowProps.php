<?php

namespace App\View\Welcome\Plot;

use App\DataObjects\Plot\PlotDetailData;
use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Plot\PlotHandler;
use App\Models\Mall\Plot;
use App\View\Shared\BaseView;

class WelcomePlotShowProps extends BaseView
{
    public function __construct(
        public object $plot,
        public ?string $city = null,
    ) {
        $this->plot = $plot;
        $this->city = $this->plot->address->city;
        // dd($this->plot->attachments);
    }

    public function plot()
    {
        return PlotDetailData::to_web_page($this->plot);
    }

    public function similar_plots()
    {
        return PlotDisplayData::collection_to_web_page(
            PlotHandler::get_unpaginated_plots(
                Plot::fromSameLocation($this->city)
                    ->dontInclude($this->plot->id),
                6
            )
        );
    }

    public function owner_plots()
    {
        return PlotDisplayData::collection_to_web_page(
            PlotHandler::get_unpaginated_plots(
                Plot::belongsToOwner($this->plot->user->id)
                    ->dontInclude($this->plot->id),
                6
            )
        );
    }

    public function city()
    {
        return $this->city;
    }
}
