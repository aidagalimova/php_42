<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});

$obj = new RandomExceptions();
try {
    $obj->method1();
}
catch (Exceptions\Exception2 $exception2) {
    echo("Исключение 2; ");
}
catch (Exceptions\Exception1 $exception1) {
    echo("Исключение 1; ");
}
try {
    $obj->method2();
}
catch (Exceptions\Exception3 $exception3) {
    echo("Исключение 3; ");
}
catch (Exceptions\Exception2 $exception2) {
    echo("Исключение 2; ");
}

try {
    $obj->method3();
}
catch (Exceptions\Exception3 $exception3) {
    echo("Исключение 3; ");
}
catch (Exceptions\Exception4 $exception4) {
    echo("Исключение 4; ");
}
try {
    $obj->method4();
}
catch (Exceptions\Exception4 $exception4) {
    echo("Исключение 4;");
}
catch (Exceptions\Exception5 $exception5) {
    echo("Исключение 5;");
}