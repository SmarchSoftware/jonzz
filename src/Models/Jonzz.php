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
    protected $table;

    /*
     * constructor to set table name.
     */
    public function __construct()
    {
        $this->table = config('jonzz.table', 'attributes');
    }

    /**
     * Jonzz Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'value', 'notes'];
}
