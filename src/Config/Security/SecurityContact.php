<?php
namespace App\Config\Security;

use App\Config\Time\Time;

class SecurityContact
{

    protected $_aErr;
    protected $_aParamsDecoded;

    public function __construct(array $_aParams)
    {
      
        if (isset($_aParams['fname'])) {
            header("Location: \\templates\\404\index.view.twig");
        }

        if ($_SESSION['tentative'] >= 3) {
           $this->_aErr['flash'] = 'Le nombre de tentative à expiré veuillez essayer plus tard';
        }

        if ($_SESSION['mailSent'] >= 3) {
            $this->_aErr['flash'] = 'Nous vous recontacterons ultérieurement';
         }
        
        $time = new Time;
        
        if ($time->intervalCheckSecond() < 8) {
            header("Location: \\templates\\404\index.view.twig"); 
        }

        if (!isset($_SESSION['reponse'])) {
            header("Location: \\templates\\404\index.view.twig");
        }elseif ($_SESSION['reponse'] != $_aParams['reponse']) {
            $this->_aErr['captcha'] = "la réponse est érronée";
        }

        if (!isset($_aParams['mail'])) {
            
            $this->_aErr['mail'] = "Veuillez renseigner une adresse mail valide";
        }else {
            $this->_aParamsDecoded['mail'] = html_entity_decode($_aParams['mail'], ENT_QUOTES);
        }

        if (!isset($_aParams['nom'])) {
           
            $this->_aErr['non'] = "Vous devez renseigner votre nom";
        }else {
            $this->_aParamsDecoded['nom'] = html_entity_decode($_aParams['nom'], ENT_QUOTES);
        }

        if (!isset($_aParams['prenom'])) {
           
            $this->_aErr['prenom'] = "Vous devez renseigner votre prenom";
        }else {
            $this->_aParamsDecoded['prenom'] = html_entity_decode($_aParams['prenom'], ENT_QUOTES);
        }

        if (!isset($_aParams['telephone'])) {
            $this->_aErr['telephone'] = "Vous devez renseigner votre numèros de telephone";
        }elseif (!preg_match( '#^0[1-9]{1}\d{8}$#', $_aParams['telephone'] )) {
            $this->_aErr['telephone'] = "Vous devez renseigner un numèros de telephone valide";
        }elseif (isset($_aParams['telephone'])) {
            $this->_aParamsDecoded['telephone'] = $_aParams['telephone'];
        }

        if (!isset($_aParams['message'])) {
            $this->_aErr['message'] = "Vous avez oublié d'écrire votre message";
        }else {
            $this->_aParamsDecoded['message'] = html_entity_decode($_aParams['message'], ENT_QUOTES);
        }

    }

    public function _setErr()
    {
        return $this->_aErr;
    }

    public function _setParams()
    {
        return $this->_aParamsDecoded;
    }

    
}


