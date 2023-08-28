<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name','area','genre','description','imageURL'];

    public function scopeAreaSearch($query, $area) {
        if(!empty($area)) {
            $query->where('area', $area);
        }
    }

    public function scopeGenreSearch($query, $genre) {
        if(!empty($genre)) {
            $query->where('genre', $genre);
        }
    }

    public function scopeNameSearch($query, $name) {
        if(!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }
    }

    public function isFavoritedBy($userId): bool {
        return Favorite::where('user_id', $userId)->where('shop_id', $this->id)->first() !==null;
    }
}