<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;

class Content extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['title', 'img', 'p'];
    
    protected $hidden = ['id'];

}
