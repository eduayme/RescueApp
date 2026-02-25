<?php

namespace App\Providers;

use App\Services\CustomMarkdownParser;
use BinaryTorch\LaRecipe\Contracts\MarkdownParser;
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
