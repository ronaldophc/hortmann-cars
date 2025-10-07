<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'settings';

    protected $fillable = array(
        'name',
        'domain',
        'subdomain',
        'active',
    );

}
