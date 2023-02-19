<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UUID;

    protected $table = 'posts';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check()) 
                $model->user_id = auth()->user()->id;
        });

    }
    
    protected $fillable = [
        "description",
        "title"
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [ 
        'id' => 'integer'
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
