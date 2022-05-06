<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    public function scopeFilter($query, array $filters) 
    {
       
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' .$search. '%')
                ->orWhere('body', 'like', '%' .$search. '%');
        });

        $query->when($filters['category']?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){ //whereHas mempunyai relasi tabel
                $query->where('slug', $category);
            });
        });

        $query->when($filters['user']?? false, function($query, $user){
            return $query->whereHas('user', function($query) use ($user){
                $query->where('username', $user);
            });
        });

        // $query->when($filters['user'] ?? false, fn($query, $user) =>
        //     $query->whereHas('user', fn($query) =>
        //         $query->where('username', $user)
        //     )
        // );
    }

    // protected $fillable = ['title','user','excerpt','body'];
    protected $guarded = ['id'];
    protected $with = ['user','category'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // menetapkan route model binding dari id menjadi slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}