<?php

namespace User\Repositories;

use User\Models\User;
use Core\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
