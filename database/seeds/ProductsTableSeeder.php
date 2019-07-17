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
        Tenant::setTenant(null);
        $categories = \App\Models\Category::all();
        $collectionThumbs = $this->getThumbs();
        $repository = Product::class;
        factory(Product::class, 300)
            ->make()
            ->each(function (Product $product) use ($categories, $repository, $collectionThumbs) {
                $tenantId = rand(1, 3);
                $category = $categories->where(\Tenant::getTenantField(), $tenantId)->random();
                $repository->uploadThumb($product->id, $collectionThumbs->random());
                $product->category_id = $category->id; //2
                $product->company_id = $tenantId;  //1
                $product->save();
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
