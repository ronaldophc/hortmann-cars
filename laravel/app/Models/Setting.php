<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Logo da Loja
        'logo',
        'logo_alt',
        
        // Informações de Contato
        'phone_1',
        'phone_2',
        'email',
        'address',
        'opening_hours',
        
        // Redes Sociais
        'instagram_url',
        'facebook_url',
        'linkedin_url',
        'x_url',
        
        // Localização
        'google_maps_url',
        'google_maps_embed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    

    /**
     * Get the singleton instance of settings.
     * Since we only need one settings record.
     */
    public static function getSettings()
    {
        return static::first() ?? new static();
    }

    /**
     * Update or create settings.
     */
    public static function updateSettings(array $data)
    {
        $settings = static::first();
        
        if ($settings) {
            $settings->update($data);
        } else {
            $settings = static::create($data);
        }
        
        return $settings;
    }

    /**
     * Get the logo URL.
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    /**
     * Get the alternative logo URL.
     */
    public function getLogoAltUrlAttribute()
    {
        return $this->logo_alt ? asset('storage/' . $this->logo_alt) : null;
    }

    /**
     * Get formatted phone number.
     */
    public function getFormattedPhone1Attribute()
    {
        return $this->formatPhone($this->phone_1);
    }

    /**
     * Get formatted secondary phone number.
     */
    public function getFormattedPhone2Attribute()
    {
        return $this->formatPhone($this->phone_2);
    }

    /**
     * Format phone number for display.
     */
    private function formatPhone($phone)
    {
        if (!$phone) return null;
        
        $phone = preg_replace('/\D/', '', $phone);
        
        if (strlen($phone) === 11) {
            return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 5) . '-' . substr($phone, 7);
        } elseif (strlen($phone) === 10) {
            return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 4) . '-' . substr($phone, 6);
        }
        
        return $phone;
    }

    /**
     * Get clean phone number (only numbers).
     */
    public function getCleanPhone1Attribute()
    {
        return preg_replace('/\D/', '', $this->phone_1);
    }

    /**
     * Get clean secondary phone number (only numbers).
     */
    public function getCleanPhone2Attribute()
    {
        return preg_replace('/\D/', '', $this->phone_2);
    }

    /**
     * Get WhatsApp link for phone 1.
     */
    public function getWhatsappUrl1Attribute()
    {
        $cleanPhone = $this->clean_phone_1;
        return $cleanPhone ? "https://wa.me/55{$cleanPhone}" : null;
    }

    /**
     * Get WhatsApp link for phone 2.
     */
    public function getWhatsappUrl2Attribute()
    {
        $cleanPhone = $this->clean_phone_2;
        return $cleanPhone ? "https://wa.me/55{$cleanPhone}" : null;
    }

    /**
     * Check if has social media links.
     */
    public function hasSocialMediaAttribute()
    {
        return $this->instagram_url || $this->facebook_url || $this->linkedin_url || $this->x_url;
    }

    /**
     * Get all social media links as array.
     */
    public function getSocialMediaLinksAttribute()
    {
        return array_filter([
            'instagram' => $this->instagram_url,
            'facebook' => $this->facebook_url,
            'linkedin' => $this->linkedin_url,
            'x' => $this->x_url,
        ]);
    }

    /**
     * Delete logo file when updating.
     */
    public function deleteLogo()
    {
        if ($this->logo && Storage::disk('public')->exists($this->logo)) {
            Storage::disk('public')->delete($this->logo);
        }
    }

    /**
     * Delete alternative logo file when updating.
     */
    public function deleteLogoAlt()
    {
        if ($this->logo_alt && Storage::disk('public')->exists($this->logo_alt)) {
            Storage::disk('public')->delete($this->logo_alt);
        }
    }
}