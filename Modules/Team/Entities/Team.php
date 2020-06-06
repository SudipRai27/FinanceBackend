<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'team';
}
