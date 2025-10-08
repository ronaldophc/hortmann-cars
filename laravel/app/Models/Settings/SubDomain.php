<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubDomain extends Model
{
    protected $fillable = [
        'name',
        'customer_id',
        'active',
        'subdomain',
        'connection_name',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
