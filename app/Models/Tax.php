<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
      protected $fillable = [
        'name',
        'rate',
        'type',
        'active'
    ];

    public function calculate(float $amount): float
    {
        return $this->type === 'percent'
            ? ($amount * $this->value / 100)
            : $this->value;
    }

}
