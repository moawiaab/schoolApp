<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm('multipart/form-data');
$this->setInput('text','اسم الطالب','staName','6  padding-r','','6-40','اسم الطالب يجب ان يكون من 6-40 حرف');
$this->setInput('text','العنوان ','address','6  padding-r','','6-40','عنوان الطالب يجب ان يكون من 6-40 حرف');
$this->setInput('number','العمر الطالب بالسنين','age','4  padding-r','','1-2','ادخل عمر صحيح للطالب');
$this->setInput('text','رقم الهاتف','phone','4  padding-r','','10-30',' رقم الهاتف يجب ان يكون من 10-30 حرف');
$this->setInput('number','الرسوم ','amunt','4  padding-r','','2-6','ادخل الرسوم الدراسية');

$this->startSelect('sex','4 padding-r');
if($sexes !== false):foreach($sexes as $gu):
    $this->setOption($gu->id,$gu->sex);
endforeach;endif;
$this->endSelect('الجنس');

$this->startSelect('classId','4 padding-r');
if($classes !== false):foreach($classes as $gua):
    $this->setOption($gua->id,$gua->className);
endforeach;endif;
$this->endSelect('الفصل الدراسي');

$this->setInput('file','الصورة الفتغرافية','stu-img','4  padding-r');
$this->setInput('text','تعريف مختصر عن الطالب','feeding','12  padding-r','','6-40','نبذة مختصرة عن الطالب يجب ان يكون من 6-40 حرف');

$this->setSubmit();
$this->endForm();
?>
