<?php
namespace App\Config\Security;

class Captcha
{
    private $_sQuestion = '';
    
    public function _setQuestion()
    {
        $this->captcha();
        return $this->_sQuestion;
    }

    public function captcha()
    {
        $firstElement =  random_int(0, 30);
        $secondElement = random_int(0, 30);
        $copy = substr(md5(mb_chr(random_int(0,999), 'UTF-8')),-5);

        $question = [
            0 => $firstElement . '+' . $secondElement,
            1 => 'Recopier : '.$copy
        ];

        $reponse = [
            0 => $firstElement + $secondElement,
            1 => $copy
        ];

        $y = random_int(0, 1);

        $_SESSION['reponse'] = $reponse[$y];

        $this->_sQuestion = $question[$y];

    }
}
