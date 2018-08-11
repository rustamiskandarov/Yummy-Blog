<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenuRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
  protected $menu_rep;
  protected $article_rep;
  protected $portfolio_rep;
  protected $slider_rep;
  
  protected $templite;
  protected $vars = [];
  protected $sitebar = FALSE;
  protected $content_left_sitebar = FALSE;
  protected $content_right_sitebar = FALSE;

  public function __construct(MenuRepository $menu_rep){
        $this->menu_rep = $menu_rep;
  }

  protected function renderOutput(){
      $menu = $this->getMenu();
      $navigation = view(env('THEME').'.main-menu')->render();
      $this->vars = array_add($this->vars, 'navigation', $navigation);
    return view($this->templite)->with($this->vars);
  }

    public function getMenu()
    {
        $menu = $this->menu_rep->get();
  }
}
