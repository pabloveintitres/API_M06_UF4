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
}
