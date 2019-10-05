<?php

$this->addEditUl('/add','/privileges/add','/delete','/print');

$this->startForm('multipart/form-data');
$this->setInput('text','اسم الطالب','staName','6  padding-r',$student->staName);
$this->setInput('text','العنوان ','address','6  padding-r',$student->address);
$this->setInput('number','العمر الطالب بالسنين','age','3  padding-r',$student->age);
$this->setInput('text','رقم الهاتف','phone','3  padding-r',$student->phone);
$this->setInput('number','الرسوم ','amunt','2  padding-r');

$this->startSelect('sex','4 padding-r',$student->sex);
if($sexes !== false):foreach($sexes as $gu):
    $this->setOption($gu->id,$gu->sex);
endforeach;endif;
$this->endSelect('الجنس');

$this->startSelect('classId','4 padding-r',$student->classId);
if($classes !== false):foreach($classes as $gua):
    $this->setOption($gua->id,$gua->className);
endforeach;endif;
$this->endSelect('الفصل الدراسي');
$this->setInput('text','تعريف مختصر عن الطالب','feeding','8  padding-r',$student->feeding);

$this->setSubmit();
$this->endForm();
?>
