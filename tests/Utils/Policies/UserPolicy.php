<?php

namespace Tests\Utils\Policies;

use Tests\Utils\Models\User;

class UserPolicy
{
    const ADMIN = 'admin';

    public function adminOnly(User $user): bool
    {
        return $user->name === self::ADMIN;
    }

    public function alwaysTrue(): bool
    {
        return true;
    }

    public function guestOnly($viewer = null): bool
    {
        return $viewer === null;
    }

    public function view(User $viewer, User $queriedUser): bool
    {
        return true;
    }

    public function dependingOnArg($viewer, bool $pass): bool
    {
        return $pass;
    }

    public function severalArgs($user, array $input): bool
    {
        return $input['key1'] === 'foo' && $input['key2'] === 'foo2' && $input['key2'] === 'foo3';
    }
}
