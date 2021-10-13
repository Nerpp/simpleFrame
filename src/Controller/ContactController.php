<?php

namespace App\Controller;

use App\Services\Mailer;
use App\Services\Captcha;
use App\Config\Security\SessionAdmin;
use App\Config\Security\SecurityContact;
use App\Config\AbstractController\AbstractController;


final class ContactController extends AbstractController
{

   public function __construct()
   {
      $this->session = new SessionAdmin;
      $this->contactTreatment();
   }


   protected function contactTreatment()
   {
      $securityContact = new SecurityContact();
      $param = $securityContact->_getParam();

     
      if (isset($param['token']) && $param['token'] === $_SESSION['token']) {

         $checkInformation = $securityContact->_getErr();

         if (!is_null($checkInformation)) {
            $this->session->AddTentative();
            $this->render('Contact', [
               'captcha' => (new Captcha())->captcha(),
               'token' => $this->session->setToken(),
               'Err' => $checkInformation,
               'flash' => 'Des éléments érroné ont été communiqué',
               'Valid' => $param
            ]);
            return;
         }
         $mailer = new Mailer;
         $mail = $mailer->envoitMail($param);

         if (!$mail) {
            $this->render('Contact', [
               'captcha' => (new Captcha())->captcha(),
               'token' => $this->session->setToken(),
               'Err' => $checkInformation,
               'flash' => 'Une erreur est survenue veuiller réessayer plus tard',
               'Valid' => $param
            ]);
            return;
         }
         $this->session->AddSend();
         $this->render('index', [
            'flash' => 'Votre message à bien été envoyé, merci pour votre intérêt nous vous recontacterons le plus rapidement possible'
         ]);
         return;
      }

      $this->session->setTime();

      $this->render('Contact', [
         'captcha' => (new Captcha())->captcha(),
         'token' => $this->session->setToken(),
      ]);
   }
}
