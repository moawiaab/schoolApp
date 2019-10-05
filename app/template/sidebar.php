
        <div class="sidebar-reight">
            <ul>
                <li><a href="/"><i class="fas fa-home"></i>الصفحة الرئيسية</a></li>
                <li><a href="/student"><i class="fas fa-graduation-cap"></i> نافذة الطلاب</a></li>
                <li><a href="/teatcher"><i class="fas fa-blind"></i> نافذة المعلمين</a></li>
                <li><a href="/cashed"><i class="fa fa-money-bill-alt"></i> الرسوم الدراسية </a></li>
                <li><a href="/classes"><i class="fab fa-shirtsinbulk"></i> نافذة الفصول</a></li>
                <li><a href="/material"><i class="far fa-folder-open"></i> نافذة المقررات</a></li>
                <li><a href="/users"><i class="fa fa-address-card"></i> نافذة المستخدمين</a></li>
                <li><a href="/usergroup"><i class="fas fa-users"></i> نافذة المجموعات</a></li>
                <li><a href="/privileges"><i class="fas fa-cogs"></i> نافذة الصلاحيات</a></li>
                <li><a href="/report"><i class="fa fa-chart-bar"></i> نافذة التقارير</a></li>
            </ul>
<div class="sideLockout">
<li><a href="/auth/logout"><i class="fas fa-sign-out-alt"></i></a></li>
</div>
        </div>

<div class="main-content">
<div class="message-content">
<?php $message = $this->messenger->getMessages();
    if(!empty($message)):
        foreach ($message as $message) : ?>
        <div class="alert alert-<?= $message[1]?> alert-dismissible default_msessger showClassMessger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?= $message[1]?> ! </strong> <?= $message[0]?>
        </div>
<?php endforeach; endif; ?>
</div> 