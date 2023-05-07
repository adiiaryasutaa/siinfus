<?php

namespace App\Actions;

use App\Actions\Contracts\CreatesNews;
use App\Models\News;
use App\Models\User;

class CreateNews implements CreatesNews
{
    public function create(User $user, array $input): News
    {
        return News::create([
            'user_id'     => $user->id,
            'title'       => $input['title'],
            'content'     => $input['content'],
            'category_id' => $input['category_id'],
        ]);
    }
}
