<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $guarded = ['id','created_at', 'updated_at'];

    protected $table = 'services';
}
