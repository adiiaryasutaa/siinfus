<?php

namespace App\Actions;

use App\Actions\Contracts\UpdatesCategories;
use App\Models\Category;

class UpdateCategory implements UpdatesCategories
{
    public function update(Category $category, array $input)
    {
        return $category->update($input);
    }
}
