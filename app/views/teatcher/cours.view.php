<?php
$this->addEditUl('/add','/privileges/add','/delete','/print');


$this->startForm();
$this->startSelect('corsId','6 padding-r');
if($Material !== false):foreach($Material as $me):
    $this->setOption($me->id,$me->corName);
endforeach;endif;
$this->endSelect('المادة الدراسية');

$this->startSelect('tachId','6 padding-r');
if($Teatcher !== false):foreach($Teatcher as $te):
    $this->setOption($te->id,$te->className);
endforeach;endif;
$this->endSelect('الفصل الدراسي');

$this->setSubmit();
$this->endForm();
?>
<hr class="contentHR">
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم المادة</th>
    <th>الفصل الدراسي </th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($courses !== false):foreach($courses as $cours):?>
    <tr>
    <td><?= $cours->id?></td>
    <td><?= $cours->corName?></td>
    <td><?= $cours->techName?></td>
    <td class="control">
        <a href="/classes/delete/<?= $cours->id?>"> <i class="fa fa-trash"></i></a>
    </td>
</tr>
<?php endforeach;endif?>
</tbody>
</table>
