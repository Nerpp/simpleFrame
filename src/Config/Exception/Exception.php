<?php
namespace App\Config\Exception;

function error2exception($code, $message, $fichier, $ligne)
{
    throw new ExceptionCustom($message,0,$code, $fichier, $ligne);
}

function customException($e)
{
    $oMonException = new ExceptionCustom();
    $oMonException->enregistrementErreur($e);
}

set_error_handler('App\Config\Exception\error2exception');
set_exception_handler('App\Config\Exception\customException');