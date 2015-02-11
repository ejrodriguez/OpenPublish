<?php


use Pingpong\Menus\Builder;
use Pingpong\Menus\MenuItem;

MenuGen::create('top', function(Builder $menu)
{
   
    if (Auth::user()->check())
    {

        $ListCartas= User::find(Auth::user()->get()->id)->cartas;
        
        foreach ($ListCartas as  $value) {
            // global $value;
            global $IdMenu;
            $IdMenu=$value->MenuId;
            
            if($value->pivot->ViewStatus=='t')
            {
                $menu->dropdown($value->MenuDescrip, function(MenuItem $sub)
                    {
                        global $IdMenu;

                        $MenuList=Menu::find($IdMenu);
                        $SubmenuList= $MenuList->submenus;

                        foreach ($SubmenuList as $valuesub) {

                            $sub->route('index', $valuesub->SubmenuDescrip, null, $arrayName1 = array('icon' => 'fa '.$valuesub->SubmenuIcon , 'id' => $valuesub->SubmenuRouteAlias));
                        }

                        
                 
                    },$arrayName = array('icon' => 'fa '.$value->MenuIcon,'id' => $value->MenuRouteAlias ));
            }

        }

          
    }
    else
    {


        $ListCartas= Menu::find(5);
        
        // foreach ($ListCartas as  $value) {
            // global $value;
            global $IdMenu;
            $IdMenu=$ListCartas->MenuId;
            
            // if($ListCartas->pivot->ViewStatus=='t')
            // {
                $menu->dropdown($ListCartas->MenuDescrip, function(MenuItem $sub)
                    {
                        global $IdMenu;

                        $MenuList=Menu::find($IdMenu);
                        $SubmenuList= $MenuList->submenus;

                        foreach ($SubmenuList as $valuesub) {

                            $sub->route($valuesub->SubmenuRouteAlias, $valuesub->SubmenuDescrip, null, $arrayName1 = array('icon' => 'fa '.$valuesub->SubmenuIcon , 'id' => $valuesub->SubmenuRouteAlias));
                        }

                        
                 
                    },$arrayName = array('icon' => 'fa '.$ListCartas->MenuIcon ));
            // }

        // }
        // $rol_usuario=3;

        // $sub->route('index', $valuesub->SubmenuDescrip, null, $arrayName1 = array('icon' => 'fa '.$valuesub->SubmenuIcon , 'id' => 'crearusuario'));
        // // $menu->route('login', $rol_usuario); 
        // // $menu->route('login', 'Ingresar');


        
    }
    

});


?>