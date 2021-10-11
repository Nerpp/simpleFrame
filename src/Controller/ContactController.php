<?php

namespace App\Controller;

use App\Services\Mailer;
use App\Config\Security\Captcha;
use App\Config\Security\SessionAdmin;
use App\Config\Security\SecurityContact;
use App\Config\AbstractController\AbstractController;


final class ContactController extends AbstractController
{
   
   public function __construct()
   {

      $this->captcha = new Captcha();
      $this->sendMail = new Mailer;
      $this->session = new SessionAdmin;
      $this->contactTreatment();
   }


   private function contactTreatment()
   {
      var_dump($_SESSION['token']);
      if (isset($this->_aParams['token']) && isset($this->_aParams['token']) === isset($_SESSION['token']) ) {

        $securityContact = new SecurityContact($this->_aParams);
        $checkInformation = $securityContact->_setErr();

        if (!is_null($checkInformation)) {
         $this->_aParams['captcha'] = $this->captcha->_setQuestion();
         $this->_aParams['Err'] = $checkInformation;
         $this->session->AddTentative();
         return;
        }
        
        $mail = $this->sendMail ->envoitMail($securityContact->_setParams());

        if (!$mail) {
         $this->_sPage = 'contact';
         $this->_aParams['Err']['flash'] = 'Une erreur est survenue veuiller réessayer plus tard';
         return;
        }

        $this->_sPage = 'index';
        $this->session->AddSend();
        $this->_aParams['Msg']['flash'] = 'Votre message à bien été envoyé, merci pour votre intérêt nous vous recontacterons le plus rapidement possible';
        
        return;
      }

      $this->_aParams['captcha'] = $this->captcha->_setQuestion();
      $this->session->setTime();
      $this->_aParams['token'] = $this->session->setToken();

      $this->render('contact', $this->_aParams);
   }

    
}
