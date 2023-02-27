<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';

    public $timestamps = true;

    protected $fillable = [
        'path',
    ];

    public function asset(){
        return $this->belongsToMany(Asset::class,'asset_image','image_id','asset_id');
    }
}
