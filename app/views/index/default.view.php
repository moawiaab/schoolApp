<?php
 $this->addEditUl('/add','/edit','/delete','/print');
 if($allNumber !== false):foreach($allNumber as $num):
?>

<div class="container-panel">
  <h2>لوحة التحكم </h2>
  <div class="col-md-8">
  <div class="panel-group">

    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <i class="fas fa-graduation-cap"></i>
            <span><?= $num->studenum?></span>
            </div>
            <div class="panel-body">
                <a href="/student">نافذة الطلاب <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

        <div class="col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
            <i class="fas fa-blind"></i>
            <span><?= $num->teachnum?></span>
            </div>
            <div class="panel-body">
                <a href="/teatcher">نافذة المعلمين <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
            <i class="far fa-money-bill-alt"></i>
            <span><?= $num->cashednum?></span>
            </div>
            <div class="panel-body">
                <a href="/cashed"> الرسوم الدراسية <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>


     <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
            <i class="fab fa-odnoklassniki"></i>
            <span><?= $num->classnum?></span>
            </div>
            <div class="panel-body">
                <a href="/classes">نافذة الفصول <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

        <div class="col-md-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
             <i class="far fa-folder-open"></i>
            <span><?= $num->cournum?></span>
            </div>
            <div class="panel-body">
                <a href="/material">الكورسات الدراسية<span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <i class="fa fa-address-card"></i>
            <span><?= $num->usernum?></span>
            </div>
            <div class="panel-body">
                <a href="/users"> نافذة المستخدمين<span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

        <div class="col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
            <i class="fas fa-users"></i>
            <span><?= $num->groupnum?></span>
            </div>
            <div class="panel-body">
                <a href="/usergroup">نافذة المجموعات <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

            <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
            <i class="fas fa-cogs"></i>
            <span><?= $num->privnum?></span>
            </div>
            <div class="panel-body">
                <a href="/privileges">نافذة الصلاحيات <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

        <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
            <i class="fa fa-chart-bar"></i>
            <span>R</span>
            </div>
            <div class="panel-body">
                <a href="/teatcher">نافذة التقارير <span><i class="fas fa-cog"></i></span></a>
            </div>
        </div>
    </div>

  </div>
  </div>
 <?php endforeach; endif;?>
<div class="col-md-4 colm">
<div class="panel panel-default">   
<div class="panel-heading">
    <p>الإنتقال السريع</p>
</div>
<div class="panel-body">
    <div class="goFastToLinke">
<ul>
    <li><a href="/student/add">إضافة طالب جديد<span><i class="far fa-plus-square"></i></span></a></li>
    <li><a href="/teatcher/add"> إضافة معلم جديد<span><i class="fa fa-plus-circle"></i></span></a></li>
    <li><a href="/cashed/add">توريد رسوم لطالب <span><i class="far fa-plus-square"></i></span></a></li>
    <li><a href="/classes/add">إضافة فصل دراسي جديد <span><i class="fa fa-plus-circle"></i></span></a></li>
    <li><a href="/material/add">إضافة مادة دراسية جديدة<span><i class="far fa-plus-square"></i></span></a></li>
    <li><a href="/users/add">إضافة مستخدم جديد<span><i class="fa fa-plus-circle"></i></span></a></li>
    <li><a href="/usergroup/add">إضافة مجموعة جديدة <span><i class="far fa-plus-square"></i></span></a></li>
    <li><a href="/privileges/add">إضافة صلاحية جديدة <span><i class="fa fa-plus-circle"></i></span></a></li>

</ul>
</div>
</div>
</div>
</div>


</div>

