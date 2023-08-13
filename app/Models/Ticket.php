<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prospects(): HasOne
    {
        return $this->hasOne(Prospect::class);
    }

    public function konsumen(): BelongsTo
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function type_service(): HasOne
    {
        return $this->hasOne(TypeService::class, 'type_service_id');
    }

}
