<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'asset_code', 
        'name', 
        'status', 
        'acquisition_value', 
        'purchase_date',
        'last_modified_by',
    ];

    public function modifier()
    {
        return $this->belongsTo(User::class, 'last_modified_by');
    }
}