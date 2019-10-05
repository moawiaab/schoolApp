<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم المادة','corName','4  padding-r','','3-20','اسم المادة الدراسي يجب ان يكون من 3-20 حرف');
$this->setInput('text','تفاصيل المادة ','detales','5  padding-r','','5-50','تفاصيل المادة يجب ان تكون من 5-50 حرف');
$this->setInput('number','درجة المادة','grade','3  padding-r','','2-3','درجة المادة من 30-100');

$this->setSubmit();
$this->endForm();