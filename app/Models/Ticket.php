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
        return $this->hasOne(Prospect::class, 'ticket_id');
    }

    public function konsumens(): BelongsTo
    {
        return $this->belongsTo(Konsumen::class, 'konsumen_id');
    }

    public function type_service(): HasOne
    {
        return $this->hasOne(TypeService::class, 'id', 'type_service_id');
    }

    public function type_customer(): HasOne
    {
        return $this->hasOne(TypeCustomer::class, 'id', 'type_customer_id');
    }

}
