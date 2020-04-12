<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryComposer
{

    /**
     * Create a new profile composer.
     *
     * @internal param UserRepository $users
     * @param Category $category
     * @internal param Catalog $catalog
     * @internal param Menu $menu
     */

    public function __construct(Category $category)
    {
        $this->category = $category;
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
        $categoriesItems = $this->category->getCategoriesItems();
        $view->with('categoriesItems', $categoriesItems);
    }
}

?>