<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Customer extends Model
{
    protected $connection = 'settings';

    protected $fillable = array(
        'name',
        'domain',
        'active',
        'connection_name'
    );

    public function subdomains(): HasMany
    {
        return $this->hasMany(SubDomain::class);
    }
}
