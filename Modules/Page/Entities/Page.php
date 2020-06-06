<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id','created_at', 'updated_at'];

    protected $table = 'page';
}
