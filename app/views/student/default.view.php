<?php
$this->addEditUl('/student/add','/privileges/add','/delete','/print');
?>
<table class="display table-responsive" id="mytable">
<thead >
<tr class="tr_th">
    <th>#</th>
    <th>الاسم</th>
    <th>العنوان</th>
    <th>الهاتف</th>
    <th>الصف</th>
    <th>الجنس</th>
    <th>الرسوم</th>
    <th>المبلغ المدفوع</th>
    <th id="controlTd"> التحكم</th>
</tr>
</thead>
<tbody>
 <?php if(false !== $student) : foreach($student as $user) : ?>
    <tr>
    <td><?= $user->id ?></td>
    <td><?= $user->staName ?></td>
    <td><?= $user->address ?></td>
    <td><?= $user->phone ?></td>
    <td><?= $user->class ?></td>
    <td><?= $user->sex ?></td>
    <td><?= $user->amunt ?></td>
    <td><?= $user->getAmount ?></td>
<td class="control">
<a href="/student/profile/<?= $user->id?>"> <i class="fa fa-file"></i></a>
<a href="/student/edit/<?= $user->id ?>"><i class="fa fa-edit"></i></a>
<a href="/student/cashed/<?= $user->id ?>"><i class="fa fa-plus"></i></a>
</td>
    </tr>
<?php  endforeach; endif;?>
</tbody>
</table>