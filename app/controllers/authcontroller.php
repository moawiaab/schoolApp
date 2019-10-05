<?php

namespace FR_MO\Controllers;

use FR_MO\LIB\herber;
use FR_MO\Models\UserModel;
use FR_MO\Lib\Messenger;


class AuthController extends AppController
{
    use herber;
    public function loginMethod()
    {
        $this->_template->swapTemplate([
            'the_view'   => ':action_view',
            'endcontent' => TEMPLATE_PATH .DS. 'endcontent.php'
        ]);
                
        if(isset($_POST['login'])){
           $isfo = UserModel::authenticate($_POST['userName'],$_POST['password'], $this->session);
            if($isfo == 2){
               $this->messenger->add('تم ايقاف حسابك راجع الإدارة' ,Messenger::APP_MESSAGE_WARNING);
            }elseif ($isfo == 1){
              $this->messenger->add('تم تسجيل الدخول بنجاح');
              $this->redirect('/');

            }elseif ($isfo == false){
                 $this->messenger->add('اسم المستخدم أو كلمة المرور غير صحيح' ,Messenger::APP_MESSAGE_ERROR);
            }
        }
          //var_dump($isfo);
        
        $this->setView();
    }
    
    public function logoutMethod()
    {
     
        $this->session->kill();
        $this->redirect('/auth/login');
        
    }

}