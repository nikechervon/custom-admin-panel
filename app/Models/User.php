<?php

namespace App\Models;

use App\Enums\Roles;
use App\Traits\CheckUserRolesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CheckUserRolesTrait;

    /**
     * @var array
     */
    protected $fillable = ['email', 'password', 'role_id'];

    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(
            ManagerEmployee::class,
            'manager_id'
        );
    }
}
