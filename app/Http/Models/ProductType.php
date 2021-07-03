<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table='product_types';

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function productTypes()
    {
        return $this->belongsTo('App\Http\Models\ProductType', 'product_type_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Http\Models\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\Http\Models\User', 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo('App\Http\Models\User', 'deleted_by');
    }
}
