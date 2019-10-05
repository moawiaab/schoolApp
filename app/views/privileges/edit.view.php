<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->setInput('text','اسم الصلاحية','privilegetitle','6 padding-l padding-r',$privilege->privilegetitle);
    $this->setInput('text','رابط الصلاحية','privilege','6',$privilege->privilege);
    $this->setSubmit();
$this->endForm();