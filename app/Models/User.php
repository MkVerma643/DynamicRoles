<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function assignRole($role)
    {
        $this->roles()->attach(Role::whereName($role)->first());
    }

    public function revokeRole($role)
    {
        $this->roles()->detach(Role::whereName($role)->first());
    }

    public function givePermissionTo($permission)
    {
        $this->permissions()->attach(Permission::whereName($permission)->first());
    }

    public function revokePermissionTo($permission)
    {
        $this->permissions()->detach(Permission::whereName($permission)->first());
    }
}
