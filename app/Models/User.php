<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\Authentication;
use App\Models\Availability;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     protected $table = 'USERS';

    protected $primaryKey = 'User_ID';

    public $timestamps = true;

    protected $fillable = [
       'First_Name',
        'Last_Name',
        'Date_of_Birth',
        'Physical_Address',
        'Phone_Number',
        'Email',
        'Password',
        'Role',
        'created_at',
        'updated_at'

    ];
    public function Client(): HasOne
    {
        return $this->hasOne(Client::class );
    }
   
    // Relationship with Lawyer
    public function lawyer(): HasOne
    {
        return $this->hasOne(Lawyer::class);
    }

    // Relationships
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class, 'User_ID', 'User_ID');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(UserLogs::class, 'User_ID', 'User_ID');
    }

    public function settings(): HasOne
    {
        return $this->hasOne(Settings::class, 'User_ID', 'User_ID');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notifications::class, 'User_ID', 'User_ID');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Sessions::class, 'User_ID', 'User_ID');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}
