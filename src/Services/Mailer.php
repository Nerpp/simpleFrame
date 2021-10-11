<?php
namespace App\Services;

class Mailer
{

    // public function __construct()
    // {
    //     $this->_aConfig                   = new \App\module\ConfigSearch;
    // }

    public function envoitMail(array $_aParams){
        
    $bodyHtml = '<p>'.'Mme Mademoiselle Mr,'.'</p>'.
    '<p>'.$_aParams['prenom'].' '.$_aParams['nom'].'</p>'.
    '<p>'.'<b>'.'Numéros de téléphone : '.'</b>'.$_aParams['telephone'].'</p>'.
    '<p>'.'<b>'.'Mail communiquè : '.'</b>'.$_aParams['mail'].'</p>'.
    '<p>'.'<b>'.'Message : '.'</b>'.$_aParams['message'].'</p>'
    ;

    $bodyPLain = 'Mme Mademoiselle Mr,'.
    $_aParams['prenom'].' '.$_aParams['nom'].
    'Numéros de téléphone : '.$_aParams['telephone'].
    'Mail communiquè : '.$_aParams['mail'].
    'Message : '.$_aParams['message']
    ;
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('smptpserveur@gmail.com')
            ->setPassword('9gU9fzFBDqkj56r');


        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Message'))
            ->setFrom(['smptpserveur@gmail.com' => 'Karl'])
            ->setTo([$_aParams['mail'] => $_aParams['nom']])
            ->setBody($bodyHtml, 'text/html')
            ->addPart($bodyPLain, 'text/plain')
            ;

        $socket = fsockopen('smtp.gmail.com', '465');
        if ($socket) {
            $mailer->send($message);
            return TRUE;
        } 
        return FALSE;
    }
}