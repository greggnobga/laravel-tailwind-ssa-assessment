<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use SoftDeletes, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prefixname',
        'firstname',
        'middlename',
        'lastname',
        'suffixname',
        'username',
        'email',
        'password',
        'photo',
        'type',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** Get avatar attribute accessor. */
    public function getAvatarAttribute()
    {
        if ($this->photo) {
            /** Return path. */
            return $this->photo;
        }

        /** Return a default. */
        return asset('images/avatar.jpg');
    }

    /** Get fullname attribute accessor. */
    public function getFullnameAttribute()
    {
        if ($this->prefixname ||  $this->firstname || $this->middlename || $this->lastname || $this->suffixname) {
            /** Return full name. */
            return trim(ucfirst($this->prefixname) . ' ' . ucfirst($this->firstname) . ' ' . ucfirst($this->middlename) . ' ' . ucfirst($this->lastname) . ' ' . ucfirst($this->suffixname));
        }

        /** Return a default. */
        return $this->firstname;
    }

    /** Get fullname attribute accessor. */
    public function getMiddleinitialAttribute()
    {
        if ($this->middlename) {

            /** Split string. */
            $letters = preg_split('//u', $this->middlename, -1, PREG_SPLIT_NO_EMPTY);

            $initial = $letters[0] . '.';

            /** Return full name. */
            return trim(ucfirst($initial));
        }

        /** Return a default. */
        return $this->firstname;
    }
}
