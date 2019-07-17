<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use TenantModels, Uuid, FormAccessible;
    protected $fillable = ['name','description','price', 'product_id'];


    public function formProductUuidAttribute(){
        return $this->product->uuid;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
