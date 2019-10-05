<?php

namespace FR_MO\LIB;

trait herber
{
    public function redirect($path)
    {
        session_write_close();
        header('Location:' .$path);
        
       exit;
    }
    public function goToLoTU($loca,$time){
        echo "
            <script>
            setTimeout(() => {
                window.location.href='".$loca."'
            }, $time);
            </script>

        ";
    }
    public function goToLo(){
        echo "
        <div class='all-style-content'>
        <div class='style-content'>
           <h3 class='Message-Locactin'>جار تنفيذ العملية</h3>
           <div class='crcel'></div>
        </div>
        </div>
        ";
    }
}