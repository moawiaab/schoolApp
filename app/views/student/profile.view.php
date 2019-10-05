<?php
$this->addEditUl('/student/add','/privileges/add','/delete','/print');
?>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#users" aria-controls="home" role="tab" data-toggle="tab">البطاقة</a></li>
    <li role="presentation"><a href="#groupTab" aria-controls="groupTab" role="tab" data-toggle="tab">الكورسات</a></li>
    <li role="presentation"><a href="#privreshTab" aria-controls="privreshTab" role="tab" data-toggle="tab">الرسوم </a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">ولي الأمر </a></li>
    <li role="presentation"><a href="#inNewUser" aria-controls="inNewUser" role="tab" data-toggle="tab">كفاية القيد</a></li>
  </ul>
  
</div>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="users">
<div class="col-md-12">
  <div class="col-md-8">
  <table class="table table-striped table-hover tableShow" id="tableShow">

      <tr>
        <td class="smallTD">اسم الطالب  </td>
        <td><?= @$student['staName'] ?></td>
      </tr>
      <tr>
        <td class="smallTD">العنوان </td>
        <td><?= @$student['address'] ?></td>
      </tr>
      <tr>
        <td class="smallTD">العمر </td>
        <td><?= @$student['age'] ?></td>
      </tr>
      <tr>
        <td class="smallTD">رقم الهاتف  </td>
        <td><?= @$student['phone'] ?></td>
      </tr>
      <tr>
        <td class="smallTD">الجنس </td>
        <td><?= @$student['sexName'] ?></td>
      </tr>
      <tr>
        <td class="smallTD">الفصل الدراسي </td>
        <td><?= @$student['class'] ?></td>
      </tr>
      <tr>
        <td class="smallTD">عن الطالب </td>
        <td><?= @$student['feeding'] ?></td>
      </tr>
    </table>

<div class="infoToUser">
  <h3>نصائح مهمة</h3>
  <ul>
    <li>من فضلك تأكد من صحة المعلومات المدخلة</li>
    <li>لتأكد من المبالغ المدفوعة إذهب إلى نافذة الرسوم</li>
    <li>نافذة الكورسات يحتوي على الكورسات التي يدروسها الطالب</li>
    <li>نافذة كفاية القيد للتحقق من البيانات الناقصة</li>
    <li>تحليل البيانات لمعرفة مستوى الطالب </li>
  </ul>
</div>
  </div>

  <div class="col-md-4">
    <div class="studnetImg">
      <img src="<?=IMAGE_SHOW_STORAGE .DS.$student['img']?>" alt="no img">
    </div>
    <table class="table table-striped table-hover tableShow" id="tableShow">
      <tr>
        <td>تاريخ الأنشاء</td>
        <td>2018-02-10</td>
      </tr>
      <tr>
        <td>أنشاء بواسطة</td>
        <td>معاوية عبد الله</td>
      </tr>
      <tr>
        <td>اخر تعديل</td>
        <td>معاوية عبد الله</td>
      </tr>
      <tr>
        <td>تاريخ الأنشاء</td>
        <td>2018-02-10</td>
      </tr>
    </table>
  </div>
</div>
    </div>

    <div role="tabpanel" class="tab-pane" id="groupTab">

   <table class="table table-striped table-hover tableShow" id="tableShow">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم المادة</th>
    <th>الدرجة </th>
    <th>الأستاذ </th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($courses !== false):foreach($courses as $cours):?>
    <tr>
    <td><?= $cours->id?></td>
    <td><?= $cours->corName?></td>
    <td><?= $cours->grade?></td>
    <td><?= $cours->techName?></td>
    <td class="control">
        <a href="/classes/delete/<?= $cours->id?>"> <i class="fa fa-trash"></i></a>
    </td>
</tr>
<?php endforeach;endif?>
</tbody>

  </table>

    </div>

    <div role="tabpanel" class="tab-pane" id="privreshTab">

   <table class="table table-striped table-hover tableShow" id="tableShow">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th> تاريخ الدفع</th>
    <th>المبلغ </th>
    <th>الملاحظات </th>
    <th>المستلم </th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($cashed !== false):foreach($cashed as $cash):?>
    <tr>
    <td><?= $cash->id?></td>
    <td><?= $cash->date?></td>
    <td><?= $cash->amount?></td>
    <td><?= $cash->detales?></td>
    <td><?= $cash->username?></td>
    <td class="control">
        <a href="/classes/delete/<?= $cours->id?>"> <i class="fa fa-trash"></i></a>
    </td>
</tr>
<?php endforeach;endif?>
</tbody>

  </table>

    </div>

    <div role="tabpanel" class="tab-pane" id="settings">
<?php
  $this->startForm();
  $this->setInput('text','اسم ولي الأمر','fname','7 padding-r padding-l',@$fathers->fname);
  $this->setInput('text','العنوان','addres','7 padding-r padding-l',@$fathers->addres);
  $this->setInput('text','رقم الهاتف ','phon','7 padding-r padding-l',@$fathers->phon);
  $this->setInput('text','البريد الإلكتروني ','email','7 padding-r padding-l',@$fathers->email);
  $this->setSubmit();
  $this->endForm();

?>
    </div>

    <div role="tabpanel" class="tab-pane" id="inNewUser">
      <table class="table table-striped " id="tableShow">
      <tr>
      <td>
      <div class="infoToUser">
        <h3>اسم البند</h3>
        <ul>
          <li>اسم الطالب</li>
          <li>عنوان الطالب</li>
          <li>رقم الهاتف</li>
          <li>الجنس</li>
          <li>عمر الطالب</li>
          <li>الفصل الدراسي</li>
          <li>الملاحظات العامة </li>
          <li>الصورة الشخصية</li>
          <li>اسم ولي الأمر </li>
          <li>عنوان ولي الأمر </li>
          <li> هاتف ولي الأمر </li>
          <li>بريد ولي الأمر </li>
        </ul>
      </div>
      </td>

      <td id="checkInfo">
      <div class="infoToUser">
        <h3>الحالة</h3>
        <ul>
          <li><?=$student['staName'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['address'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['phone'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['sexName'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['age'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['class'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['feeding'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=$student['img'] != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>

          <li><?=@$fathers->fname != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=@$fathers->addres!= ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=@$fathers->phon != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
          <li><?=@$fathers->email != ''? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'?></li>
        </ul>
      </div>
      </td>
      </tr>
      </table>
    </div>


  </div>

</div>