<?php

namespace App\Actions;

use App\Actions\Contracts\UpdatesNews;
use App\Models\News;

class UpdateNews implements UpdatesNews
{
    public function update(News $news, array $input)
    {
        return $news->update($input);
    }
}
