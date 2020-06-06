<?php

namespace Modules\Superadmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Superadmin extends Authenticatable
  
{
	use Notifiable;

    protected $fillable = [];

    protected $table = "superadmin";

    protected $hidden = ['password', 'remember_token'];	
}

