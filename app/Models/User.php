<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'utenti';

    public $timestamps = false;

    protected $primaryKey = 'user_id';

    protected $fillable = ['username', 'nome', 'cognome', 'email', 'password'];
    
    protected $hidden = ['email', 'password'];

    public function comments(){
        return $this->hasMany("App/Models/Comment");
    }

    public function like(){
        return $this->belongsToMany("App\Models\Comment",'likes','user','comment');
    }

}
