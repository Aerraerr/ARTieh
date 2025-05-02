<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    //display total number of cart kang user
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $cart = Cart::where('user_id', auth()->id())->with('items')->first();
                $cartItemCount = $cart ? $cart->items->count() : 0;
                $view->with('cartItemCount', $cartItemCount);
            } else {
                $view->with('cartItemCount', 0);
            }
        });
    }
}
