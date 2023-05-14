<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'user_details';

    // Define the fillable columns for mass assignment
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'address',
        'summary'
    ];
}
