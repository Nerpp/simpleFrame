<?php
namespace App\Services;

class Captcha
{
    
    public function captcha()
    {
        $firstElement =  random_int(0, 30);
        $secondElement = random_int(0, 30);
        
        $question = $firstElement . '+' . $secondElement ;
        $reponse = $firstElement + $secondElement;

        $_SESSION['reponse'] = $reponse;
        return $question;
    }


}
