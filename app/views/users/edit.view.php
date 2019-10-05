<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->setInput('text','رقم الهاتف','PhoneNumber','6  padding-r',$users->PhoneNumber);

    $this->startSelect('GroupId','3 padding-r');
        if($group !== false):foreach($group as $gu):
        $this->setOption($gu->GroupId,$gu->GroupName,$users->GroupId);
        endforeach;endif;
    $this->endSelect('صلاحية المستخدم');

    $this->startSelect('status','3 padding-r');
        $this->setOption(1,"تفعيل الحساب",$users->status);
        $this->setOption(2,"ايقاف الحساب",$users->status);
    $this->endSelect('حالة الحساب');
    $this->setSubmit();
$this->endForm();