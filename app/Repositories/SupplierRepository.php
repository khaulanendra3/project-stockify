<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{
    public function getAll()
    {
        return Supplier::latest()->get();
    }

    public function create(array $data)
    {
        return Supplier::create($data);
    }

    public function delete($id)
    {
        return Supplier::destroy($id);
    }
}