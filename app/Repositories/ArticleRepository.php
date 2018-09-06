<?php
/**
 * Created by PhpStorm.
 * User: Rust
 * Date: 21.08.2018
 * Time: 13:55
 */

namespace Corp\Repositories;


use Corp\Article;

class ArticleRepository extends Repository
{
    public function __construct(Article $aritcle)
    {
        $this->model = $aritcle;
    }
}