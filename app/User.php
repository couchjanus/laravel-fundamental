<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Hash;
use Cache;
use App\VerificationToken;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    /**
     * Build Social Relationships.
     *
     * @var array
     */
    public function social()
    {
        return $this->hasMany('App\Social');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }


    public function permissions()
    {
        return $this->hasManyThrough('App\Permission', 'App\Role');
    }

    /**
    * Checks a Permission
    */

    public function isSuperVisor()
    {
        if ($this->roles->contains('slug', 'admin')) {
            return true;
        }

        return false;
    }


    public function hasRole($role)
    {
        if ($this->isSuperVisor()) {
            return true;
        }

        if (is_string($role)) {
            return $this->role->contains('slug', $role);
        }

        return !! $this->roles->intersect($role)->count();
    }

    public function verificationToken()
    {
        return $this->hasOne(VerificationToken::class);
    }

    public function hasVerifiedEmail()
    {
        return $this->verified;
    }

    public static function byEmail($email)
    {
        return static::where('email', $email);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}
