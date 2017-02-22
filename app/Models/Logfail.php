<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logfail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logfail';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['num', 'ip', 'updated_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

}
