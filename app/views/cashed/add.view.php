<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm();
    $this->startSelect('staId','3 padding-r');
        if($student !== false):foreach($student as $st):
            $this->setOption($st->id,$st->staName);
        endforeach;endif;
    $this->endSelect('اختر اسم الطالبمن فضلك');
    $this->setInput('number','المبلغ','amount','3  padding-r','','1-6','ادخل المبلغ المارد دفعه');
    $this->setInput('text','الملاحظات ','detales','6  padding-r','تم الاستلام','5-100','الملاحظات يجب ان يكون من 5 - 100 حرف');

    $this->setSubmit();
$this->endForm();