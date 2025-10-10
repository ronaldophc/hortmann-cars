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

    public static function generateConnectionName($domainName, $name)
    {
        $slug = \Illuminate\Support\Str::slug($name, '_');
        $formated = preg_replace('/[^a-z0-9_]/', '', strtolower($slug));
        return "{$domainName}_{$formated}";
    }
}
