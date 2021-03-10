<?php

namespace System\View;

use System\View\Traits\HasViewLoader;
use System\View\Traits\HasExtendContent;
use System\View\Traits\HasIncludeContent;
use App\Providers\AppServiceProvider;
use Exception;

class ViewBuilder{

    use HasViewLoader,HasExtendContent,HasIncludeContent;
    public $content;
    public $vars=[];

    public function run($dir){

        $this->content=$this->viewLoader($dir);
        $this->checkExtendsContent();
        $this->checkIncludesContent();
        Composer::setViews($this->viewNameArray);
        $this->vars=Composer::getVars();
    }
}

