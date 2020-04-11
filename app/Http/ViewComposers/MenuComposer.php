<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Menu;

class MenuComposer
{

    /**
     * Create a new profile composer.
     *
     * @internal param UserRepository $users
     * @param Menu $menu
     */

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
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
        $menuItems = $this->menu->getMenuItems();
        $view->with('menuItems', $menuItems);
    }
}

?>