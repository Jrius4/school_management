<?php
namespace App\Views\Composers;

use App\QuoteRequest;
use Illuminate\View\View;

class ModalComposer
{
    public function compose(View $view)
    {
        $this->composeQuoteRequest($view);
    }

    private function composeQuoteRequest(View $view)
    {
        $quote_request = new QuoteRequest();

        $view->with('quote_request', $quote_request);
    }

}
