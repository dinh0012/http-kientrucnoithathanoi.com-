<?php
$email = get_theme_option('email');
$hotLine = get_theme_option('hot_line');
?>
<div class="flex-container top-page">
    <div align="left" class="text-top topleft">
        <a href="mailto:<?=$email?>"
           class="emailtop"><?=$email?></a>
    </div>
    <div class="text-top topright" align="right">
        <a class="hotlinetop" href="tel:<?=$hotLine?>">Hotline: <strong><?=$hotLine?></strong></a>
        <a href="javascript:void(0)" class="fa fa-search searchtop"></a>
    </div>
    <div class="frmsaerch">
        <div class="inner-frmsaerch">
            <form action="https://kientrucanhung.com/search/" method="get" id="searchfordes">
                <input name="qr" type="text" placeholder=""/>
                <a href="javascript:void(0)" class="btn-search"><i class="fa fa-search"
                                                                   aria-hidden="true"></i></a>
            </form>
        </div>
    </div>
</div>