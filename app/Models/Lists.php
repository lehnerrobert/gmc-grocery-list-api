<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string Id
 * @property string User_Id
 * @property string Name
 */
class Lists extends Model
{
    use HasFactory;
    protected $fillable = ['Name'];
}
