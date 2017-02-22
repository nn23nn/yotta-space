<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'alias', 'status'];

    public function scopeLikeName($query, $name)
    {
        return !empty($name) ? $query->where('name', 'like', "%{$name}%") : $query;
    }

    public function scopeLikeAlias($query, $alias)
    {
        return !empty($alias) ? $query->where('alias', 'like', "%{$alias}%") : $query;
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }
}
