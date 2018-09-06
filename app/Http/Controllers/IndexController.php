<?php

namespace Corp\Http\Controllers;

use Corp\Menu;
use Corp\Repositories\ArticleRepository;
use Corp\Repositories\PortfolioRepository;
use Corp\Repositories\SliderRepository;
use Illuminate\Http\Request;
use Corp\Repositories\MenuRepository;
use Config;

class IndexController extends SiteController
{

    public function __construct(SliderRepository $slier_rep, PortfolioRepository $portfolio_rep, ArticleRepository $article_rep){
      parent::__construct(new MenuRepository(new Menu()));
      $this->portfolio_rep = $portfolio_rep;
      $this->slider_rep = $slier_rep;
      $this->sitebar = 'right';
      $this->article_rep = $article_rep;
      $this->templite = env('THEME').'.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->keywords='Home page';
        $this->meta_desc='Home page';
        $this->title='Home page';

        $portfolio = $this->getPortfolio();
        $portfolio_content = view(env('THEME').'.portfolio_content')->with('portfolios', $portfolio)->render();
        $this->vars = array_add($this->vars, 'portfolio_content', $portfolio_content);

        $sliderItems = $this->getSlider();
        $slider = view(env('THEME').'.slider')->with('sliders', $sliderItems)->render();
        $this->vars = array_add($this->vars,'slider', $slider);

        $articles = $this->getArticles();
        $this->contentRightSidebar = view(env('THEME').'.indexBar')->with('articles', $articles)->render();

        return $this->renderOutput();
    }

    public function getArticles()
    {
        $articles = $this->article_rep->get(['title', 'created_at', 'image', 'slug'], Config::get('settings.home_articles_count'));
        return $articles;
    }
    public function getPortfolio()
    {
        $portfolio = $this->portfolio_rep->get('*', Config::get('settings.home_port_count'));
        if($portfolio->isEmpty()){
            return FALSE;
        }
        return $portfolio;
    }
    public function getSlider()
    {

        $slider = $this->slider_rep->get();
        if($slider->isEmpty()){
            return FALSE;
        }
        $slider->transform(function ($item, $key){  //функция Laravel для коллекций
            $item->image = 'img/'.Config::get('settings.slider_path').'/'.$item->image;
            return $item;
        });

        return $slider;
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
