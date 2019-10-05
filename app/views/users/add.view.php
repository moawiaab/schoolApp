<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم الاول','firstname','4  padding-r','','3-10','الاسم الاول يجب ان يكون من 3-10 حرف');
$this->setInput('text','اسم الثاني','lastname','4  padding-r','','3-10','الاسم الثاني يجب ان يكون من 3-10 حرف');
$this->setInput('text','اسم المستخدم','Username','4  padding-r','','6-12','اسم المستخدم يجب ان يكون من 6-12 حرف');
$this->setInput('password','كلمة المرور','Password','6  padding-r','','5-10',';كلمة المرور يجب ان يكون من 5-10 حرف');
$this->setInput('email','البريد الإلكتروني','Email','6  padding-r','','6-40',' البريد الالكتروني يجب ان يكون من 6-40 حرف');
$this->setInput('text','رقم الهاتف','PhoneNumber','8  padding-r','','10-30',' رقم الهاتف يجب ان يكون من 10-30 حرف');

$this->startSelect('GroupId','4 padding-r');
if($group !== false):foreach($group as $gu):
$this->setOption($gu->GroupId,$gu->GroupName);
endforeach;endif;
$this->endSelect('صلاحية المستخدم');


$this->setSubmit();
$this->endForm();