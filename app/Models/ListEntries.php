<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string Id
 * @property string List_Id
 * @property string Name
 * @property bool Bought
 */
class ListEntries extends Model
{
    use HasFactory;
    protected $fillable = ['List_Id','Name','Bought'];
}
