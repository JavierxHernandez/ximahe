<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function document()
    {
        return $this->belongsToMany(Document::class);
    }
}
