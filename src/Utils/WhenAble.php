<?php
namespace Gco\KongApiClient\Utils;


trait WhenAble
{
    public function when(bool $condition, callable $callable)
    {
        if($condition === true){
            $callable();
        }
        return $this;
    }
}