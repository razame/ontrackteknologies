<?php

namespace App\Http\Controllers\B2B;

use App\Http\Controllers\Controller;
use App\SiteSettings;
use Illuminate\Http\Request;
use Redirect;

class SiteController extends Controller
{

  public function general()
  {
    // $data = ['page_title'=>"test","section1"=>"test serction1","section2"=>"test serction2","section3"=>"test serction3"];
    // dd(serialize($data));
    $data['site_title'] = SiteSettings::where("name", 'site_title')->first()->value;
    $data['site_keywords'] = SiteSettings::where("name", 'site_keywords')->first()->value;
    $data['site_description'] = SiteSettings::where("name", 'site_description')->first()->value;
    $data['site_maintenance_mode'] = SiteSettings::where("name", 'site_maintenance_mode')->first()->value;
    $data['site_about_ontrack'] = SiteSettings::where("name", 'site_about_ontrack')->first()->value;
    $data['site_copyrights_text'] = SiteSettings::where("name", 'site_copyrights_text')->first()->value;

    // $data['about_ontrack'] = "Tripser offers independent travel consultants a flexible, tablet-friendly application that features comprehensive flight and Hotel search results, easy-to-use reporting and financial tools.";
    // $data['copyrights_text'] = "Copyright © 2020. Tripser.ae All rights reserved. Created and manage by ON TRACK TOURISM LLC";
    return view('B2B.site_settings.general', $data);
  }

  public function GeneralUpdate(Request $request)
  {
    request()->validate([
      'site_title' => ['required', 'string', 'max:255'],
      'site_keywords' => ['required', 'string', 'max:255'],
      'site_description' => ['required', 'string', 'max:255'],
      'site_maintenance_mode' => ['required', 'string', 'max:255'],
      'site_about_ontrack' => ['required', 'string', 'max:255'],
      'site_copyrights_text' => ['required', 'string', 'max:255'],
    ]);

    $data = $request->all();
    //save setting
    $site_title = SiteSettings::where("name", 'site_title')->first();
    $site_title->value = $data['site_title'];
    $site_title->save();

    $site_keywords = SiteSettings::where("name", 'site_keywords')->first();
    $site_keywords->value = $data['site_keywords'];
    $site_keywords->save();

    $site_description = SiteSettings::where("name", 'site_description')->first();
    $site_description->value = $data['site_description'];
    $site_description->save();

    $site_maintenance_mode = SiteSettings::where("name", 'site_maintenance_mode')->first();
    $site_maintenance_mode->value = $data['site_maintenance_mode'];
    $site_maintenance_mode->save();

    $site_about_ontrack = SiteSettings::where("name", 'site_about_ontrack')->first();
    $site_about_ontrack->value = $data['site_about_ontrack'];
    $site_about_ontrack->save();

    $site_copyrights_text = SiteSettings::where("name", 'site_copyrights_text')->first();
    $site_copyrights_text->value = $data['site_copyrights_text'];
    $site_copyrights_text->save();

    return Redirect::route("SiteGeneralSettings")->withSuccess('Site General settings saved.');

  }

  // edit pages
  public function Pages(Request $request, $id)
  {
    $data = SiteSettings::find($id);
    // $data1 = ['page_title'=>"test","content"=>"test serction1"];
    // // dd(serialize($data));
    // $data->value = serialize($data1);
    // $data->save();
    $data['unserlized_value'] = unserialize($data['value']);

    return view('B2B.site_settings.pages', ['data' => $data]);
  }


  public function PagesUpdate(Request $request)
  {

    $data = $request->all();
    //save setting
    unset($data['_token']);
    unset($data['id']);

    $pages = SiteSettings::find($request->id);
    $pages->value = serialize($data);
    $pages->save();

    return Redirect::route("SitePages", ['id' => $pages->id])->withSuccess('Page Updated.');

  }


  public function FileManager()
  {

    return view('B2B.site_settings.file_manager');

  }

}
