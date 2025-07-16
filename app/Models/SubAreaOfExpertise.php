<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubAreaOfExpertise extends Model
{
    protected $table = "sub_areas_of_expertise";
    protected $fillable = [
        'name',
        'area_of_expertise_id'  // ✅ Match form + DB
    ];

    public function area()
    {
        return $this->belongsTo(AreaOfExpertise::class, 'area_of_expertise_id'); // ✅ Consistent
    }
}
