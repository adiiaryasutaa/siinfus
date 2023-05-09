<?php

namespace App\Actions;

use App\Actions\Contracts\DeletesNews;
use App\Models\News;

class DeleteNews implements DeletesNews
{
    public function delete(News $news)
    {
        return $news->delete();
    }
}
