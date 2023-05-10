<?php

namespace App\Actions;

use App\Actions\Contracts\CreatesCategories;
use App\Models\Category;

class CreateCategory implements CreatesCategories
{
    public function create(array $input)
    {
        return Category::create($input);
    }
}
