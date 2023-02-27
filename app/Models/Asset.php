<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'asset';

    protected $fillable = [
        'name', 'author'
    ];

    public function aiData(){

        return $this->belongsToMany(AiData::class,'asset_aidata','asset_id','aidata_id');
    }

    public function image(){
        return $this->belongsToMany(Image::class,'asset_image','asset_id','image_id');
    }
}
