<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->setInput('number','المبلغ','amount','6  padding-r');
    $this->setInput('text','الملاحظات ','detales','6  padding-r');
    $this->setSubmit();
$this->endForm();