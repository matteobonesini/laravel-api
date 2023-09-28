<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'img_src',
        'description',
        'type_id'
    ];

    protected $hidden = [
        'id'
    ];

    protected $appends = [
        'full_img_src'
    ];

    public function getFullImgSrcAttribute() {
        return asset('storage/' . $this->img_src);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
