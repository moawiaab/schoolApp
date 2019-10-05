<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->setInput('text','اسم الصلاحية','privilegetitle','6 padding-r','','5-30','اسم الصلاحية يجب ان يكون من 5-30 حرف');
    $this->setInput('text','رابط الصلاحية','privilege','6 padding-r','','5-30','رابط الصلاحية يجب ان يكون من 5-30 حرف');
    $this->setSubmit();
$this->endForm();