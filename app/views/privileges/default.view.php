<?php

$this->addEditUl('/privileges/add','/privileges/add','/privileges/delete/0','/print');
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>#</th>
    <th>اسم الصلاحية</th>
    <th>رابط الصلاحية</th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($privileges !== false):foreach($privileges as $privi):?>
    <tr>
    <td><?= $privi->privilegeId?></td>
    <td><?= $privi->privilegetitle?></td>
    <td><?= $privi->privilege?></td>
    
    <td class="control">
        <a href="/privileges/edit/<?= $privi->privilegeId?>"> <i class="fa fa-edit"></i></a>
        <a href="/privileges/delete/<?= $privi->privilegeId?>" onclick="if(!confirm('<?= @$action_delete; ?>')) return false;" ><i class="fa fa-trash"></i></a>
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
