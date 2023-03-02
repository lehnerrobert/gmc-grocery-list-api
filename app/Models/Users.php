<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string Id
 * @property string FirstName
 * @property string LastName
 * @property string Email
 */
class Users extends Model
{
    protected $fillable = ['FirstName','LastName','Email'];
}
