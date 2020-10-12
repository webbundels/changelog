<?php

namespace Webbundels\Changelog;

use Illuminate\Support\ServiceProvider;

class ChangelogServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'ChangelogPackage');
  }
}