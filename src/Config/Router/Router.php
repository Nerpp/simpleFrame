<?php
namespace App\Config\Router;


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
        $test = new ContactController;
        $this->_sFolder = $test->_setpage();
        $this->_aParam = $test->_setParam();
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
    
      
      // $this->_sFolder= 'contact';
      //  var_dump($this->_sPage);
      
     
    }

}