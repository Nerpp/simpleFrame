<?php
namespace App\Config\AdministrationTemplates;

use App\Config\Router\Router;
// use Twig\TwigFilter;

class TemplatesDisplay extends Router 
{
    
    public function showTemplate()
    {

        $loader = new \Twig\Loader\FilesystemLoader('templates');

        //Todo Supprimer debbug et mettre cache en TRUE pour mettre en production
        $twig = new \Twig\Environment($loader, [
            'cache' => FALSE, //'tmp',
            'debug' => true,
        ]);

         //Todo Supprimer debbug et mettre cache en TRUE pour mettre en production
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $twig->addExtension(new MesExtensions());

        $currentPage = $this->_sFolder."\\".'index.view.twig';


//        $twig->addGlobal('session', $_SESSION);
        $twig->addGlobal('current_page', $currentPage);

       return print_r($twig->render($currentPage, $this->_aParam));
    }

}
