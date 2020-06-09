<?php
namespace App\Http\ViewComposers;

use App\Models\category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $category = category::all();

        $view->with('category', $category);
    }
}
