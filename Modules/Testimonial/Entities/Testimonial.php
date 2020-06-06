<?php

namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'testimonial';
}
