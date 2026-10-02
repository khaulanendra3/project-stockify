<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::with(['category', 'supplier'])->latest()->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }
}