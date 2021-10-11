<?php
namespace App\Config\Router;


use App\Config\Security\Filter;
use App\Controller\ContactController;
use App\Config\AbstractController\AbstractController;

class Router 
{
    protected $_aParam = [];
    protected $_sFolder = '';

    

  public function __construct()
  {

    $cleanString = new Filter;
    $path = ltrim($cleanString->stringFilter($_SERVER['REQUEST_URI']), '/');
    $elements = explode('/', $path);

    $page = (empty($elements[1])) ? 'index' : $elements[1];
    
    switch ($page) {
      case 'Contact':
        $test = new ContactController;
        $this->_sFolder = $test->_setpage();
        break;
      
      default:
      $this->_sFolder = $page;
        break;
    }
     // if (!is_null(INPUT_POST)) {
    //   $this->_aParam= ;
    // }
   
  }
    

    protected function router()
    {
    
      
      
      //  var_dump($this->_sPage);
      
     
    }

}