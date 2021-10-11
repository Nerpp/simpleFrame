<?php

namespace App\Config\Time;

class Time
{
    public function intervalCheckSecond()
    {
        $datetime1 = new \DateTime('now');
        $datetime2 = $_SESSION['time'];
        $interval = $datetime1->diff($datetime2);
        return $interval->s;
    }

    public function frenchSchedule()
    {
        date_default_timezone_set('Europe/Paris');
        $hourFr = date("g:i a");
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $dateFr = strftime("%A %d %B");
        $year = strftime("%Y");
        return $dateFr . ' ' . $hourFr . ' ' . $year;
    }
}
