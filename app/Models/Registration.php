<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'cnic',
        'email',
        'dob',
        'age',
        'city',
        'notice_period',
        'area_of_expertise_id',
        'sub_area_of_expertise_id',
        'cv_path',
    ];
        public function area() {
            return $this->belongsTo(AreaOfExpertise::class, 'area_of_expertise_id');
        }
        public function subArea() {
            return $this->belongsTo(SubAreaOfExpertise::class, 'sub_area_of_expertise_id');
        }
        public function user()
        {
            return $this->belongsTo(User::class);
        }



}

