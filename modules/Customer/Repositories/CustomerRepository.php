<?php

namespace ListaShop\Customer\Repositories;

use ListaShop\Customer\Models\Customer;
use ListaShop\Core\Eloquent\BaseRepository;

class CustomerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }
}
