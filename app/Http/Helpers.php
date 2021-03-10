<?php

function sideBarActive($url,$contain=true){
    if ($contain){
        return (strpos(currentUrl(),$url)===0)?'active':'';
    }
    else{
        return $url===currentUrl() ?'active':'';
    }
}

function errorClass($name){
    return errorExists($name)?'is-invalid':'';
}

function errorText($name){
    return errorExists($name)?'<div> <small class="text-danger">'.error($name).'</small> </div>':'';
}

function oldOrValue($name,$value){
    return empty(old($name))?$value:old($name);
}
