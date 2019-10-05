<?php

$this->addEditUl('/material/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم الصف الدراسي','className','6  padding-r',$classes->className);
$this->setInput('text','تفاصيل الصف ','detales','6  padding-r',$classes->detales);
    $this->setSubmit();
$this->endForm();