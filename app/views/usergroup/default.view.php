<?php

$this->addEditUl('/usergroup/add','/privileges/add','/privileges/delete/0','/print');
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم المجموعة</th>
    <th>عدد الصلاحيات </th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($usergroup !== false):foreach($usergroup as $group):?>
    <tr>
    <td><?= $group->GroupId?></td>
    <td><?= $group->GroupName?></td>
    <td><?= $group->prcount?> صلاحية</td>
    
    <td class="control">
        <a href="/usergroup/edit/<?= $group->GroupId?>"> <i class="fa fa-edit"></i></a>
        <a href="/usergroup/delete/<?= $group->GroupId?>" onclick="if(!confirm('<?= @$action_delete; ?>')) return false;" ><i class="fa fa-trash"></i></a>
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
