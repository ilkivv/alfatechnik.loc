<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;
use Illuminate\Session\SessionManager;

class SessionComposer
{

    /**
     * Create a new profile composer.
     *
     * @internal param UserRepository $users
     * @param SessionManager $session
     * @internal param Category $category
     * @internal param Catalog $catalog
     * @internal param Menu $menu
     */

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
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
        $view->with('session', $this->session);
    }
}

?>