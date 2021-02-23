<?php

namespace App\Providers;

use App\Model\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $contact = Contact::select('fb', 'twitter', 'linkedin', 'instagram')->first();
        View::share('contact', $contact);
    }
}
