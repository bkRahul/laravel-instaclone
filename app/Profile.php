<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/oYZukJQHYAHWWdAceBR4nyI4R5f47huQhy6OvD98.png';
        
        return '/storage/'. $imagePath;
    }
    
    public function followers()
    {
        return $this->belongsToMany( User::class );
    }
}
