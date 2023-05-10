<?php

namespace App\Actions\Contracts;

use App\Models\Category;

interface DeletesCategories
{
    public function delete(Category $category);
}
