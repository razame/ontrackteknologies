<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    // get all data from menu.json file
    $verticalMenuJson = file_get_contents(base_path('resources/json/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    $horizontalMenuJson = file_get_contents(base_path('resources/json/horizontalMenu.json'));
    $horizontalMenuData = json_decode($horizontalMenuJson);

    // super admin menu
    $verticalSuperAdminMenuJson = file_get_contents(base_path('resources/json/verticalSuperAdminMenu.json'));
    $verticalSuperAdminMenuData = json_decode($verticalSuperAdminMenuJson);

    // agent menu
    $verticalAgentMenuJson = file_get_contents(base_path('resources/json/verticalAgentMenu.json'));
    $verticalAgentMenuData = json_decode($verticalAgentMenuJson);

    // branch menu
    $verticalBranchMenuJson = file_get_contents(base_path('resources/json/verticalMenu.json'));
    $verticalBranchMenuData = json_decode($verticalBranchMenuJson);

    // user menu
    $verticalUserMenuJson = file_get_contents(base_path('resources/json/verticalMenu.json'));
    $verticalUserMenuData = json_decode($verticalUserMenuJson);


    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);

    \View::share('customizedMenuData', [
      'SuperAdmin' => $verticalSuperAdminMenuData,
      'Agent' => $verticalAgentMenuData,
      'Branch' => $verticalBranchMenuData,
      'User' => $verticalUserMenuData]);
  }
}
