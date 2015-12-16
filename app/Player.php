<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  name
 */
class Player extends Model
{
    protected $table = 'players';

    protected $fillable = ['name', 'url'];
}
