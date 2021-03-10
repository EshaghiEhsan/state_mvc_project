<?php

namespace System\View\Traits;

trait HasExtendContent{

    private $extendsContent;


    private function checkExtendsContent(){
        $layoutFilePath=$this->findExtends();
        if ($layoutFilePath){
            $this->extendsContent=$this->viewLoader($layoutFilePath);
            $yieldsNameArray=$this->findYieldsNames();
            if ($yieldsNameArray){
                foreach ($yieldsNameArray as $yieldName){
                    $this->initialYields($yieldName);
                }
            }
            $this->content=$this->extendsContent;
        }
    }

    private function findExtends(){

        $filePathArray=[];
        preg_match("/s*@extends+\('([^)]+)'\)/",$this->content,$filePathArray);
        return isset($filePathArray[1])?$filePathArray[1]:false;
    }

    private function findYieldsNames(){

        $yieldsNameArray=[];
        preg_match_all("/@yield+\('([^)]+)'\)/",$this->extendsContent,$yieldsNameArray);
        return isset($yieldsNameArray[1])?$yieldsNameArray[1]:false;
    }

    private function initialYields($yieldName){
        $string=$this->content;
        $startWord="@section('" . $yieldName . "')";
        $endWord="@endsection";

        $startPos=strpos($string,$startWord);
        if ($startPos===false){
            return $this->extendsContent=str_replace("@yield('$yieldName')","",$this->extendsContent);
        }
        $startPos+=strlen($startWord);
        $endPos=strpos($string,$endWord,$startPos);

        if ($endPos===false){
            return $this->extendsContent=str_replace("@yield('$yieldName')","",$this->extendsContent);
        }

        $length=$endPos-$startPos;
        $sectionContent=substr($string,$startPos,$length);
        return $this->extendsContent=str_replace("@yield('$yieldName')",$sectionContent,$this->extendsContent);

    }



}