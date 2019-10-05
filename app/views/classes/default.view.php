<?php

$this->addEditUl('/classes/add','/privileges/add','/privileges/delete/0','/print');
    //<?php $this->checkAllBox('1 table','') 
?>
<table class="display table-responsive" id="mytable">

<thead >
<tr class="tr_th">
    <th>الرقم</th>
    <th>اسم الفصل</th>
    <th>تفاصيل الفصل</th>
    <th>عدد المواد </th>
    <th id="controlTd"> التحكم</th>
   
</tr>
</thead>
<tbody>
    <?php
    if($classes !== false):foreach($classes as $cours):?>
    <tr>
    <td><?= $cours->id?></td>
    <td><?= $cours->className?></td>
    <td><?= $cours->detales?></td>
    <td><?= $cours->cours?> مادة</td>
    <td class="control">
        <a href="/classes/edit/<?= $cours->id?>"> <i class="fa fa-edit"></i></a>
        <a href="/classes/cours/<?= $cours->id?>"><i class="fa fa-plus"></i></a>
    </td>
</tr>
<?php endforeach;endif?>
</tbody>
</table>

<?php

