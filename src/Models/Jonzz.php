<?php

namespace Smarch\Jonzz\Models;

use Illuminate\Database\Eloquent\Model;

class Jonzz extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attributes';

    /**
     * Jonzz Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'value', 'notes'];

}
