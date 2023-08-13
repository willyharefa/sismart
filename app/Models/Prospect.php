<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prospect extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $table ='tickets';

    public function tickets(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'tickets_id');
    }

    public function type_action(): BelongsTo
    {
        return $this->belongsTo(TypeAction::class, 'type_action_id');
    }
}
