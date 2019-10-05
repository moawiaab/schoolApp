<?php

$this->addEditUl('/material/add','/privileges/add','/privileges/delete/0','/print');
    //<?php $this->checkAllBox('1 table','') 
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم المادة</th>
    <th>تفاصيل المادة</th>
    <th>الدرجة </th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($material !== false):foreach($material as $cours):?>
    <tr>
    <td><?= $cours->id?></td>
    <td><?= $cours->corName?></td>
    <td><?= $cours->detales?></td>
    <td><?= $cours->grade?></td>

    <td class="control">
        <a href="/material/edit/<?= $cours->id?>"> <i class="fa fa-edit"></i></a>
        <a href="/material/delete/<?= $cours->id?>" onclick="if(!confirm('هل تريد حذف هذه المادة')) return false;" ><i class="fa fa-trash"></i></a>
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
