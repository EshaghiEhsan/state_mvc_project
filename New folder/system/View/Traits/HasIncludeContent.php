<?php


namespace System\View\Traits;

trait HasIncludeContent
{


    private function checkIncludesContent()
    {
        while (1){
            $includesNameArray=$this->findIncludesNames();
            if (!empty($includesNameArray)){
                foreach ($includesNameArray as $includeName) {
                    $this->initialIncludes($includeName);
                }
            }
            else
                break;
        }
    }



    private function findIncludesNames()
    {

        $includesNameArray = [];
        preg_match_all("/@include+\('([^)]+)'\)/", $this->content, $includesNameArray);
        return isset($includesNameArray[1]) ? $includesNameArray[1] : false;
    }

    private function initialIncludes($includeName)
    {
        return $this->content = str_replace("@include('$includeName')", $this->viewLoader($includeName), $this->content);

    }


}