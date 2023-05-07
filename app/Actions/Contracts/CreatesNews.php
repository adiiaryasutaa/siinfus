<?php

namespace App\Actions\Contracts;

use App\Models\News;
use App\Models\User;

interface CreatesNews
{
    public function create(User $user, array $input): News;
}
