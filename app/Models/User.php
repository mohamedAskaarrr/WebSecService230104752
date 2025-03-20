<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Traits\HasRoles;

Artisan::call('cache:clear');

use Illuminate\Auth\Notifications\ResetPassword;    

class User extends Authenticatable
{

    

    use HasRoles;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        
         'age'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'permissions' => 'array'
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
          
        ];
    }

    // Add helper methods for role checking
    public function hasPermission($permission)
    {
        // Simple role-based permission check
        if ($this->role === 'admin') {
            return true; // Admin has all permissions
        }
        
        if ($this->role === 'employee') {
            // Define employee permissions
            $employeePermissions = ['edit_users'];
            return in_array($permission, $employeePermissions);
        }
        
        return false; // Regular users have no special permissions
    }



}



