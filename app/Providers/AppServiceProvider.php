<?php

namespace App\Providers;

use App\Model\Contact;
use App\Model\Notice;
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
        $notices = Notice::select('id', 'title')->orderBy('date', 'desc')->take(5)->get();
        View::share(['contact' => $contact, 'notices' => $notices]);
    }
}
