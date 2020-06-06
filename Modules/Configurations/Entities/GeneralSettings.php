<?php

namespace Modules\Configurations\Entities;

use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'general_settings';
}
