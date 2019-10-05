<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم المعلم','techName','6  padding-r',$teatcher->techName);
$this->setInput('text','العنوان ','address','6  padding-r',$teatcher->address);
$this->setInput('text','رقم الهاتف','phone','4  padding-r',$teatcher->phone);
$this->setInput('email','البريد الإلكتروني','email','4  padding-r',$teatcher->email);

$this->startSelect('sexId','4 padding-r');
if($sex_Id !== false):foreach($sex_Id as $gu):
    $this->setOption($gu->id,$gu->sex,$teatcher->sexId);
endforeach;endif;
$this->endSelect('الجنس');

$this->setInput('text','تعريف مختصر عن المعلم','abut','12  padding-r',$teatcher->abut);

$this->setSubmit();
$this->endForm();