<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\City;

class CityComposer
{

    /**
     * Create a new profile composer.
     *
     * @internal param UserRepository $users
     * @param City $city
     * @internal param Category $category
     * @internal param Catalog $catalog
     * @internal param Menu $menu
     */

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     * @internal param Menu $menu
     */
    public function compose(View $view)
    {
        $city = $this->city->getCity();
        $view->with('city', $city);
    }
}

?>