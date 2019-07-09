<?php
$logo = get_theme_option('logo');
$homeUrl = get_home_url();
?>

<div id="menubar" style="width:100%">
    <div style="position:relative">
        <div class="flex-container menu-bar " style="position:relative">
            <div class="mnu-left">
                <div class="show-m">
                    <a class="btn-nav-m" href="#menu"><img src="images/nav-m.png"/></a>
                </div>

                <ul class="nav left">
                    <li class="bar">
                        <a href="<?php echo $homeUrl ?>">
                            <i class="fa fa-home"aria-hidden="true"></i>
                        </a>
                    </li>
                    <?php if (has_nav_menu('main_menu_left')) { ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main_menu_left',
                            'menu_class' => 'bar',
                            //'menu_id' => 'mmenu',
                            'container' => 'false',
                            'items_wrap' => '%3$s',
                            'walker' => new Custom_Walker_Nav_Menu_Top
                        )); ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="mnu-right">
                <div class="show-m">
                    <a class="btn-saerch-m" href="javascript:void(0)">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </div>
                <ul class="nav right">
                    <?php if (has_nav_menu('main_menu_right')) { ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main_menu_right',
                            'menu_class' => 'bar',
                            //'menu_id' => 'mmenu',
                            'container' => 'false',
                            'items_wrap' => '%3$s',
                            'walker' => new Custom_Walker_Nav_Menu_Top
                        )); ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="logosite">
            <div class="lgsite">
                <a href="<?php echo $homeUrl ?>">
                    <h1 style="margin:0;padding:0">
                        <img src="<?php echo $logo ?>" alt="<?php echo get_bloginfo() ?>"/>
                    </h1>
                </a>
            </div>
        </div>
    </div>
</div>