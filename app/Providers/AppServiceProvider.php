<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

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
        // this is the first code will implement in the project
        $settings = Setting::checkSettings();
        $categories = Category::with('child')->where('parent', 0)->orWhere('parent', null)->get();
        $lastFivePosts = Post::with('category', 'user')->orderBy('id')->limit(5)->get();

        // to share this values  to all views in the project use this view()->share()
        view()->share([
            'setting' => $settings,
            'categories' => $categories,
            'lastFivePosts' => $lastFivePosts,
        ]);
    }
}