<?php

namespace ListaShop\User\Repositories;

use ListaShop\User\Models\User;
use ListaShop\Core\Eloquent\BaseRepository;

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
