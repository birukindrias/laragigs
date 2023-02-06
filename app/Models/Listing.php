<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Foreach_;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',

        'company',
        'location',
        'website',

        'email',

        'tags',

        'description', 'logo'
    ];
    public static function find($id)
    {
        $all = self::all();
        foreach ($all as $list) {
            if ($list['id'] == $id) {
                return $list;
            }
        }
    }
    public  function scopeFilter($query, array $filters)
    {
        if ($filters['tags'] ?? false) {
            $query->where('tags', 'like', '%' . request('tags') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
    public function
    user()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}