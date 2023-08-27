<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeCustomer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'type_customers';

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'type_customer_id');
    }
}
