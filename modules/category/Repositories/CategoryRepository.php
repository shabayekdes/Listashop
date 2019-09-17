<?php

namespace Category\Repositories;

use Category\Models\Category;
use Core\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
    }
}
