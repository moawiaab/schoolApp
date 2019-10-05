<?php

$this->addEditUl('/users/add','/privileges/add','/privileges/delete/0','/print');
    //<?php $this->checkAllBox('1 table','') 
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم المستخدم</th>
    <th>البريد</th>
    <th>رقم الهاتف</th>
    <th>أخر دخول</th> 
   <th>المجموعة</th>

    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($users !== false):foreach($users as $user):?>
    <tr>
    <td><?= $user->UserId?></td>
    <td><?= $user->Username?></td>
    <td><?= $user->Email?></td>
    <td><?= $user->PhoneNumber?></td>
    <td><?= $user->lastLogin?></td>
    <td><?= $user->GroupName?></td>
    
    <td class="control">
        <a href="/users/edit/<?= $user->UserId?>"> <i class="fa fa-edit"></i></a>
        <a href="/privileges/delete/<?= $user->UserId?>" onclick="if(!confirm('<?= @$action_delete; ?>')) return false;" ><i class="fa fa-trash"></i></a>
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
