<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->setInput('text','اسم المجموعة','GroupName','12','','6-20','اسم المجموعة يجب ان يكون من 6-20 حرف');
    $this->checkAllBox('12','تحديد الكل');
    if($privileges !== false):foreach($privileges as $priv):
        $this->setCheckBox('3','privileges[]',$priv->privilegetitle,$priv->privilegeId);
    endforeach;endif;
    $this->setSubmit();
$this->endForm();