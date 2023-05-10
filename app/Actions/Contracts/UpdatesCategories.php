<?php

namespace App\Actions\Contracts;

use App\Models\Category;

interface UpdatesCategories
{
    public function update(Category $category, array $input);
}
