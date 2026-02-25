<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BinaryTorch\LaRecipe\Contracts\MarkdownParser;
use App\Services\CustomMarkdownParser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MarkdownParser::class, CustomMarkdownParser::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
