<?php

namespace Corp\Http\Controllers;

use Config;
use Corp\Menu;
use Corp\Repositories\ArticleRepository;
use Corp\Repositories\MenuRepository;
use Corp\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class ArticleController extends SiteController
{
    public function __construct(PortfolioRepository $portfolio_rep, ArticleRepository $article_rep){
        parent::__construct(new MenuRepository(new Menu()));
        $this->portfolio_rep = $portfolio_rep;
        $this->article_rep = $article_rep;
        $this->templite = env('THEME').'.articles';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->keywords='Articles page';
        $this->meta_desc='Articles page';
        $this->title='Articles page';

        $articles = $this->getArticles();
        //dd($articles);
        $articles_content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'articles_content', $articles_content);

        $portfolio = $this->getPortfolio();
        $this->contentRightSidebar = view(env('THEME').'.indexBar')->with('articles', $portfolio)->render();
        
        return $this->renderOutput();
    }

    public function getArticles($alias = FALSE)
    {
        $articles = $this->article_rep->get('*', FALSE, TRUE);
        if($articles){
            //$articles->load('user','category', 'comments');
        }
        //dd($articles);
        return $articles;
    }

    public function getPortfolio()
    {
        $portfolios = $this->portfolio_rep->get(['title', 'created_at', 'image', 'slug'], Config::get('settings.home_articles_count'));
        return $portfolios;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
