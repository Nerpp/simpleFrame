<?php

namespace App\Config\AbstractController;

// use App\Config\Loader\Loader;
use App\Config\Security\SessionAdmin;
use App\Controller\ContactController;

class AbstractController
{
    protected $_aParams = [];
    protected $_sPage   = '';
    protected $_aErr = [];


    public function _setpage()
    {
        return $this->_sPage;
    }
   
    public function _setParam()
    {
        return $this->_aParams;
    }
    protected function render(string $path, array $params)
    {

        $this->_sPage = $path;
        $this->_aParams = $params;
        var_dump($params);
        
    }
}