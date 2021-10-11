<?php

namespace App\Config\AbstractController;

// use App\Config\Loader\Loader;
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

    protected function render(string $path, array $params)
    {

        $this->_sPage = $path;
        
    }
}