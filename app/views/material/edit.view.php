<?php

$this->addEditUl('/material/add','/privileges/add','/delete','/print');

$this->startForm();
$this->setInput('text','اسم المادة','corName','4  padding-r',$material->corName);
$this->setInput('text','تفاصيل المادة ','detales','5  padding-r',$material->detales);
$this->setInput('number','درجة المادة','grade','3  padding-r',$material->grade);
    $this->setSubmit();
$this->endForm();