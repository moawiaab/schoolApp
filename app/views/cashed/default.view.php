<?php

$this->addEditUl('/cashed/add','/privileges/add','/privileges/delete/0','/print');
    //<?php $this->checkAllBox('1 table','') 
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم الطالب</th>
    <th>الفصل الدراسي</th>
    <th>المبلغ</th>
    <th>تاريخ السداد</th>
    <th>المستلم</th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($cashed !== false):foreach($cashed as $cours):?>
    <tr>
    <td><?= $cours->id?></td>
    <td><?= $cours->staName?></td>
    <td><?= $cours->className?></td>
    <td><?= $cours->amount?></td>
    <td><?= $cours->date?></td>
    <td><?= $cours->detales?></td>

    <td class="control">
        <a href="/cashed/edit/<?= $cours->id?>"> <i class="fa fa-edit"></i></a>
        <a href="/cashed/delete/<?= $cours->id?>" onclick="if(!confirm('هل تريد حذف هذه المادة')) return false;" ><i class="fa fa-trash"></i></a>
    </td>
</tr>
<?php endforeach;endif?>
</tbody>
</table>

<?php
//$this->setModelBtn();
//$this->startForm();
//$this->startModel('add new privileges');
//$this->endModel();
//$this->endForm();
