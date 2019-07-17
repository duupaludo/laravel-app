<?php

namespace App\Models;

use App\Media\ProductPaths;
use App\Media\ThumbUploads;
use App\Tenant\TenantModels;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Product extends Model
{
    use ThumbUploads;
    use ProductPaths;
    use TenantModels, Uuid, FormAccessible;
    protected $fillable = ['name','description','price', 'thumb', 'category_id'];


    public function formCategoryUuidAttribute(){
        return $this->category->uuid;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function uploadThumb(UploadedFile $file){}
}

//'category_uuid'
