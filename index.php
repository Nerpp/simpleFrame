<?php
session_start([
    'cookie_lifetime' => 0,
]);


require dirname(__FILE__).'/vendor/autoload.php';
// TODO remettre en place les exceptions avant productions
require_once 'src\Config\Exception\ExceptionCustom.php';
require_once 'src\Config\Exception\Exception.php';

// pour ajouter de nouvelle classe à l\'autoload composer dump-autoload --optimize

use App\Config\Exception\ExceptionCustom;
use App\Config\AdministrationTemplates\TemplatesDisplay;

$displayView = new TemplatesDisplay();

// try{
$displayView->showTemplate();
// }
// catch (ExceptionCustom $e)
// {
//     (new ExceptionCustom())->enregistrementErreur($e);
   
// }