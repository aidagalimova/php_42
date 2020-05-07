<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});

class RandomExceptions
{
    function method1(){
        $rnd = rand(0,1);
        if($rnd == 0) {
            throw new Exceptions\Exception1();
        }
        else{
            throw new Exceptions\Exception2();
        }
    }
    function method2(){
        $rnd = rand(0,1);
        if($rnd == 0) {
            throw new Exceptions\Exception2();
        }
        else{
            throw new Exceptions\Exception3();
        }
    }
    function method3(){
        $rnd = rand(0,1);
        if($rnd == 0) {
            throw new Exceptions\Exception3();
        }
        else{
            throw new Exceptions\Exception4();
        }
    }
    function method4(){
        $rnd = rand(0,1);
        if($rnd == 0) {
            throw new Exceptions\Exception4();
        }
        else{
            throw new Exceptions\Exception5();
        }
    }
}