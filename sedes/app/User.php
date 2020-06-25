<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','estado','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function perfil()
    {
        return $this->BelongsTo(Perfil::class);
    }

    public function cuadernos()
    {
        return $this->HasMany(Cuaderno::class);
    }

    public function mordeduras()
    {
        return $this->HasMany(Mordedura::class);
    }
    public function certificados()
    {
        return $this->HasMany(Certificado::class);
    }
    public function copros()
    {
        return $this->HasMany(Copro::class);
    }
}

