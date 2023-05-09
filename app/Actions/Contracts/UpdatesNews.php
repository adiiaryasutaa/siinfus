<?php

namespace App\Actions\Contracts;

use App\Models\News;

interface UpdatesNews
{
    public function update(News $news, array $input);
}
