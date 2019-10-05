<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->setInput('text','اسم المجموعة','GroupName','12',$group->GroupName);
    $this->checkAllBox('12','تحديد الكل');
    if($privileges !== false):foreach($privileges as $priv):
        $this->setCheckBox('3','privileges[]',$priv->privilegetitle,$priv->privilegeId,$grouprivilege);
    endforeach;endif;
    $this->setSubmit();
$this->endForm();

