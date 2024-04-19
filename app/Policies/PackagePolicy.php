<?php

namespace App\Policies;

use App\Models\User;

class PackagePolicy extends BasePolicy
{

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }
}
