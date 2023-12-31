<?php

if(!function_exists('activeNav')){
    function activeNav($route, $uri){
        return $route == $uri ? 'active' : '';
    }
}
