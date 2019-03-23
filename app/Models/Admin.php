<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

        public $timestamps= false;
        protected $primaryKey='admin_id';
        public $incrementing =false;

        public function getAuthPassword() {
            return $this->password;
        }
}
