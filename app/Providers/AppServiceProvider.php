<?php

namespace App\Providers;

use App\SiteSettings;
use Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
    Schema::defaultStringLength(191);
    Passport::routes();
    $site_settings = SiteSettings::orWhere('name', 'site_title')
      ->orWhere('name', 'site_description')
      ->orWhere('name', 'site_keywords')
      ->orWhere('name', 'site_about_ontrack')
      ->orWhere('name', 'site_copyrights_text')
      ->get();
    foreach ($site_settings as $site_setting) {
      view()->share($site_setting->name, $site_setting->value);
    }

  }
}
