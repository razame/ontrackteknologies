<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionList extends Model
{
  protected $table = 'region_lists';
  protected $primaryKey = 'code';
  protected $fillable = ['region_type', 'name', 'name_long', 'parent_code', 'searchable'];
}
