<?php
include 'form.html';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $password = $_REQUEST['password'];
    echo(checkPassword($password));
}

function checkPassword(string $password)
{
    if(!preg_match("/.{10,}/", $password))
    {
        return "Длина пароля должна быть не меньше 10 символов";
    }
    if(!preg_match('/.*[a-z].*[a-z].*/',$password ))
    {
        return "Пароль должен содержать хотя бы двe латинские строчные буквы";
    }
    if(!preg_match('/.*[A-Z].*[A-Z].*/',$password ))
    {
        return "Пароль должен содержать хотя бы двe латинские прописные буквы";
    }
    if(!preg_match('/.*[0-9].*[0-9].*/',$password ))
    {
        return "Пароль должен содержать хотя бы двe цифры";
    }
    if(!preg_match('/.*[%$#_*].*[%$#_*].*/',$password ))
    {
        return "Пароль должен содержать хотя бы двa символа из: %$#_*";
    }
    if(preg_match('/[a-z]{4,}/',$password ))
    {
        return "Пароль не должен содержать более трех латинских строчных букв подряд";
    }
    if(preg_match('/[A-Z]{4,}/',$password ))
    {
        return "Пароль не должен содержать более трех латинских прописных букв подряд";
    }
    if(preg_match('/[0-9]{4,}/',$password ))
    {
        return "Пароль не должен содержать более цифр подряд";
    }
    if(preg_match('/[%$#_*]{4,}/',$password ))
    {
        return "Пароль не должен содержать более трех символов %$#_* подряд";
    }
    return "You did it!!!";
}
