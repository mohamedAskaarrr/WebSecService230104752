<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
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
        'Role',
        'premission',
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

    protected $attributes = [
        'role' => 'user', // Default role
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
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission)
    {
        // Simple role-based permission check
        if ($this->Role === 'admin') {
            return true; // Admin has all permissions
        }
        
        if ($this->Role === 'employee') {
            // Define employee permissions
            $employeePermissions = ['edit_users'];
            return in_array($permission, $employeePermissions);
        }
        
        return false; // Regular users have no special permissions
    }

    public function isAdmin()
    {
        return $this->Role === 'admin';
    }

    public function isEmployee()
    {
        return $this->Role === 'employee';
    }

    public function isUser()
    {
        return $this->Role === 'user';
    }
}
