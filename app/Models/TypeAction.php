<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TypeAction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prospect(): HasOne
    {
        return $this->hasOne(Prospect::class);
    }
}
