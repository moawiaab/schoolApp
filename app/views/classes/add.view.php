<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم الفصل الدراسي','className','6  padding-r','','3-20','اسم المادة يجب ان يكون من 3-20');
$this->setInput('text','تفاصيل الفصل الدراسي ','detales','6  padding-r','','5-50','تفاصيل المادة يجب ان يكون من 5-50');
$this->setSubmit();
$this->endForm();