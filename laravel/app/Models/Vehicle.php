<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'model',
        'manufacturer',
        'fuel_type',
        'steering_type',
        'transmission',
        'doors',
        'year',
        'mileage',
        'price',
        'license_plate',
        'description',
        'is_active',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAttributeFormated($attribute)
    {
        $attribute = strtolower($attribute);
        if ($attribute == 'price') {
            return 'R$ ' . number_format($this->attributes[$attribute], 2, ',', '.');
        }

        if ($attribute == 'mileage') {
            return number_format($this->attributes[$attribute], 0, ',', '.');
        }

        if ($attribute == 'year') {
            return $this->attributes[$attribute];
        }

        if ($attribute == 'doors') {
            return $this->attributes[$attribute] . ' portas';
        }

        if ($attribute == 'transmission') {
            return $this->attributes[$attribute] == 'automatic' ? 'Automática' : 'Manual';
        }

        if ($attribute == 'steering_type') {
            return $this->attributes[$attribute] == 'hydraulic' ? 'Hidráulica' : 'Mecânica';
        }

        if ($attribute == 'fuel_type') {
            $value = strtolower($this->attributes[$attribute]);
            if ($value == 'gasoline') {
                return 'Gasolina';
            }
            if ($value == 'alcohol') {
                return 'Alcool';
            }
            if ($value == 'diesel') {
                return 'Diesel';
            }
            if ($value == 'flex') {
                return 'Flex';
            }
        }

        if ($attribute == 'type') {
            return $this->attributes[$attribute] == 'car' ? 'Carro' : 'Moto';
        }

        if ($attribute == 'manufacturer') {
            return ucfirst($this->attributes[$attribute]);
        }

        if ($attribute == 'model') {
            return ucfirst($this->attributes[$attribute]);
        }

        if ($attribute == 'license_plate') {
            return strtoupper($this->attributes[$attribute]);
        }

        if ($attribute == 'description') {
            return nl2br($this->attributes[$attribute]);
        }

        if ($attribute == 'is_active') {
            return $this->attributes[$attribute] ? 'Sim' : 'Não';
        }

        return $this->attributes[$attribute];
    }
}
