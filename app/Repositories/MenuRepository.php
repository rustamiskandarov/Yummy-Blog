<?php

namespace Corp\Repositories;

use Corp\Menu;
/**
 * Created by PhpStorm.
 * User: Руслан
 * Date: 12.08.2018
 * Time: 0:47
 */
class MenuRepository extends Repository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }
}