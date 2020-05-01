<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Videogame extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'company', 'author', 'launch_date'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }
}
