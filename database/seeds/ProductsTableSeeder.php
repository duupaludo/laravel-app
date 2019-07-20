<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootPath = config('filesystems.disks.images_local.root');
        \File::deleteDirectory($rootPath, true);
        Tenant::setTenant(null);
        $categories = \App\Models\Category::all();
        $collectionThumbs = $this->getThumbs();
        factory(Product::class, 30)
            ->make()
            ->each(function (Product $product) use ($categories, $collectionThumbs) {
                $tenantId = rand(1, 3);
                $category = $categories->where(\Tenant::getTenantField(), $tenantId)->random();
                $product->category_id = $category->id; //2
                $product->company_id = $tenantId;  //1
                $product->save();
                $product->uploadThumb($product->id, $collectionThumbs->random());
            });
    }

    protected function getThumbs()
    {
        return new Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/thumbs/thumb.jpg'), 'thumb.jpg'
            )
        ]);
    }
}
