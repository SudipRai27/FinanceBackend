<?php

namespace Modules\Forex\Entities;

use Illuminate\Database\Eloquent\Model;

class Forex extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'forex';
}
