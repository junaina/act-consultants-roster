<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaOfExpertise extends Model
{
    protected $table = "areas_of_expertise";
   protected $fillable = ['name'];
   public function subAreas()
   {
    return $this->hasMany(SubAreaOfExpertise::class, 'area_of_expertise_id');
   }
   public function registrations()
    {
        return $this->hasMany(Registration::class, 'area_of_expertise_id');
    }

}
