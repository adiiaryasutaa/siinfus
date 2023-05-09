<?php

namespace App\Actions\Contracts;

use App\Models\News;

interface DeletesNews
{
    public function delete(News $news);
}
