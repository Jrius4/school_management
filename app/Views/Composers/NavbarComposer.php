<?php
namespace App\Views\Composers;


use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view)
    {
        $this->composeNewPageActive($view);
        $this->composeNewPage($view);
    }

    public function composeNewPageActive(View $view)
    {

        $new_page_active = '';

        $view->with('new_page_active',$new_page_active);
    }

    public function composeNewPage(View $view)
    {
        $new_page = 0;

        $view->with('new_page',$new_page);
    }

}
