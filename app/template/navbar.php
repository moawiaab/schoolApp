<div class="mybody">
<div class="main-header">
        <div class="logo-title-log">
<a href="/"><img src="/public/img/school.png" alt=""></a>
        </div>

        <div class="main-head" >
            <ul class="navge">
                <li><i class="fa fa-envelope"></i></li>
                <li><i class="fa fa-bell"></i></li>
                <li class="" id="short_profile"> مرحبا <?=$this->session->u->Username?><i class="fas fa-angle-down"></i>
                    <ul>
                        <li>
                            <a href="/profile"><i class="fas fa-home">  </i>الصفحة الشخصية </i>
                            </a>
                        </li>
                        <li>
                            <a href="/profile/password"> <i class="fas fa-key">  تغير كلمة السر</i></a>
                        </li>
                        <li>
                            <a href=""><i class="fas fa-cog"> </i>إعدادات </i>

                            </a>
                        </li>
                        <li>
                            <a href="/auth/logout"><i class="fas fa-sign-out-alt"> </i> تسجيل خروج</i>

                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>
