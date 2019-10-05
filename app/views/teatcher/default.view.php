<?php

$this->addEditUl('/teatcher/add','/privileges/add','/privileges/delete/0','/print');
    //<?php $this->checkAllBox('1 table','') 
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم المعلم</th>
    <th>العنوان</th>
    <th>رقم الهاتف</th>
    <th>الجنس </th> 
   <th>عدد الكورسات</th>

    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($teatcher !== false):foreach($teatcher as $user):?>
    <tr>
    <td><?= $user->id?></td>
    <td><?= $user->techName?></td>
    <td><?= $user->address?></td>
    <td><?= $user->phone?></td>
    <td><?= $user->sexes?></td>
    <td><?= $user->cours?>  كورس</td>
    
    <td class="control">
        <a href="/teatcher/edit/<?= $user->id?>"> <i class="fa fa-edit"></i></a>
        <a href="/teatcher/cours/<?= $user->id?>"><i class="fa fa-plus"></i></a>
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
