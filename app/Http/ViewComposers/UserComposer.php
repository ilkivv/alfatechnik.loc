<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;

class UserComposer
{

    /**
     * Create a new profile composer.
     *
     * @internal param UserRepository $users
     * @param User $user
     * @internal param Menu $menu
     */

    public function __construct(User $user)
    {
        $this->user = $user;
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
        $user = $this->user->getUser();
        $view->with('user', $user);
    }
}

?>