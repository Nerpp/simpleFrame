<?php
namespace App\Config\Router;

use App\Config\AbstractController\AbstractController;
use App\Config\Security\Filter;
use App\Controller\ContactController;


class Router 
{
    protected $_aParam = [];
    protected $_sFolder = '';

    

  public function __construct()
  {
    $path = ltrim(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH),'/');
    $elements = explode('/', $path);

    $page = (empty($elements[1])) ? 'index' : $elements[1];

    switch ($page) {
      case 'Contact':
        $controller = new ContactController;
        $this->_sFolder = $controller->_setpage();
        $this->_aParam = $controller->_setParam();
        break;
      
      default:
      $this->_sFolder = $page;
        break; 
    }
  }
    
}