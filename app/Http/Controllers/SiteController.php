<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Menu as LavMenu;

class SiteController extends Controller
{
  protected $menu_rep;
  protected $article_rep;
  protected $portfolio_rep;
  protected $slider_rep;

  protected $keywords;
  protected $meta_desc;
  protected $title;

  protected $templite;
  protected $vars = [];
  protected $contentRightSidebar = FALSE;
  protected $content_left_sitebar = FALSE;
  protected $content_right_sitebar = FALSE;

  public function __construct(MenuRepository $menu_rep){
        $this->menu_rep = $menu_rep;
  }

  protected function renderOutput(){
      $menu = $this->getMenu();
      //dd($menu);
      $navigation = view(env('THEME').'.main-menu')->with('menu',$menu)->render();
      $this->vars = array_add($this->vars, 'navigation', $navigation);

      $this->vars = array_add($this->vars, 'keywords', $this->keywords);
      $this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);
      $this->vars = array_add($this->vars, 'title', $this->title);

      if($this->contentRightSidebar){
          $rightBar = view(env('THEME').'.rightBar')->with('content_rightBar', $this->contentRightSidebar)->render();
          $this->vars = array_add($this->vars, 'rightBar', $rightBar);
      }

    return view($this->templite)->with($this->vars);
  }

    public function getMenu()
    {
        $menu = $this->menu_rep->get();
        $menuBuilder = LavMenu::make('MyNavMenu', function ($m) use ($menu){
            foreach ($menu as $item){
                if($item->parent_id == 0){
                    $m->add($item->title, $item->path)->id($item->id);
                }
                else{
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
        //dd($menuBuilder);
        return $menuBuilder;
  }
}
