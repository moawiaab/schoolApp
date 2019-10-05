<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم المعلم','techName','6  padding-r','','6-40','اسم المعلم يجب ان يكون من 6-40 حرف');
$this->setInput('text','العنوان ','address','6  padding-r','','6-40',' عنوانالمعلم يجب ان يكون من 6-40 حرف');
$this->setInput('text','رقم الهاتف','phone','4  padding-r','','10-30',' رقم الهاتف يجب ان يكون من 10-30 حرف');
$this->setInput('email','البريد الإلكتروني','email','4  padding-r','email@gmail.com','6-40',' البريد الالكتروني يجب ان يكون من 6-40 حرف');

$this->startSelect('sexId','4 padding-r');
if($sex_Id !== false):foreach($sex_Id as $gu):
    $this->setOption($gu->id,$gu->sex);
endforeach;endif;
$this->endSelect('الجنس');

$this->setInput('text','تعريف مختصر عن المعلم','abut','12  padding-r','','6-50',' نبذة تعريفية عن المعلم يجب ان يكون من 6-50 حرف');

$this->setSubmit();
$this->endForm();