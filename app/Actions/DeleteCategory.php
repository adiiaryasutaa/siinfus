<?php

namespace App\Actions;

use App\Actions\Contracts\DeletesCategories;
use App\Models\Category;

class DeleteCategory implements DeletesCategories
{
    public function delete(Category $category)
    {
        return $category->delete();
    }
}
