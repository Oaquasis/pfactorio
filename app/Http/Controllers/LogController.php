<?php

namespace pfactorio\Http\Controllers;

use pfactorio\Log;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function parseLog(){
        $log = $this->getLogFile();

    }

    private function getLogFile(File $file=null){
        $LogFile = New Log();

        if($file == null){
            $LogFile->getDummy();
        }

        return $LogFile;
    }
}
