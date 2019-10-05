<div class="message-logon">
<?php $message = $this->messenger->getMessages();
    if(!empty($message)):
        foreach ($message as $message) : ?>
        <div class="alert alert-<?= $message[1]?> alert-dismissible default_msessger showClassMessger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?= $message[1]?> ! </strong> <?= $message[0]?>
        </div>
<?php endforeach; endif; ?>
</div>            
<div class="login_box">
    <?php
$this->startForm();
    $this->setImg('/public/img/user.png','login');
    $this->setInput('text','أدخل اسم المستخدم','userName',12);
    $this->setInput('password','ادخل كلمة السر','password',12);
    $this->setSubmit('تسجيل الدخول','login');
$this->endForm();
    ?>
    </div>