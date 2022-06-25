<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['user_id', 'username', 'commento', 'n_like'];

    public $timestamps = false;
    
    protected $primaryKey = 'post_id';

    public function user(){
        return $this->belongsTo("App/Models/User");
    }

    public function like(){
        return $this->belongsToMany("App\Models\User","likes",'comment','user');
    }
}