<?php

namespace Corp\Repositories;

use Config;


abstract class Repository
{
    protected $model = FALSE;

    public function get($select = '*', $take = FALSE, $pagination = FALSE)
    {
        $builder = $this->model->select($select);

        if($take){
            $builder->take($take);
        }
        if($pagination){
            return $this->check($builder->paginate(Config::get('settings.articles_paginate')));
        }

        return $this->check($builder->get());
    }
    /*
     * проверка естьи ли объект, если есть то декодируем значение image
     */
    protected function check($result)
    {
        if($result->isEmpty()){
            return FALSE;
        }

        $result->transform(function ($item, $key){
            if (is_string($item->image) && is_object(json_decode($item->image)) && json_last_error() == JSON_ERROR_NONE){
                $item->image = json_decode($item->image);
            }
            return $item;
        });

        return $result;

    }


}