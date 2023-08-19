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
    protected $table = 'tickets';

    public function prospects(): HasOne
    {
        return $this->hasOne(Prospect::class);
    }

    public function konsumens(): BelongsTo
    {
        return $this->belongsTo(Konsumen::class, 'id');
    }

    public function type_service(): HasOne
    {
        return $this->hasOne(TypeService::class, 'id');
    }

    public function type_customer(): HasOne
    {
        return $this->hasOne(TypeCustomer::class, 'id');
    }

}
