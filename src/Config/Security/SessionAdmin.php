<?php
namespace App\Config\Security;


class SessionAdmin
{
    public function __construct()
    {
        if (!isset($_SESSION['tentative'])) {
            $_SESSION['tentative'] = 0;
        }

        if (!isset($_SESSION['mailSent'])) {
            $_SESSION['mailSent'] = 0;
        }
    }

    public function setToken()
    {
      return $_SESSION['token'] = bin2hex(random_bytes('16'));
    }

    public function setTime()
    {
        $_SESSION['time'] = new \DateTime('now');
    }

    public function AddTentative()
    {
        $_SESSION['tentative'] += 1;
    }

    public function AddSend()
    {
        $_SESSION['mailSent'] += 1;
    }
}