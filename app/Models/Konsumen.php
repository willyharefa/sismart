<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Konsumen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'konsumens';

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'id');
    }
}
