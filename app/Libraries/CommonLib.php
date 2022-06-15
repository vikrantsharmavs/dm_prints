<?php

namespace App\Libraries;

class CommonLib
{
    protected $currentDate;
    public $numRows = 10;
    public function currentDateFunction()
    {
        date_default_timezone_set('Asia/Kolkata');
        $this->currentDate =  date('Y-m-d h:i:s');
        return $this->currentDate;
    }
}
