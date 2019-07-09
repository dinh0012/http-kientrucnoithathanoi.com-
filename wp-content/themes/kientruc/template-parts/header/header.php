<?php
    $logo = get_theme_option('logo');
?>

<header id="header" class="row">
    <div class="container header-inner  align-self-center">
        <div class="row justify-content-between header-container">
            <div class="header-left align-self-start align-self-center">
                <a href="<?php echo get_home_url() ?>" class="Header-branding">
                    <img src="<?php echo $logo ?>" alt="<?php echo get_bloginfo() ?>" class="Header-branding-logo">
                </a>
            </div>
            <div class="header-right align-self-end align-self-center">
                <?php get_template_part( 'template-parts/header/primary-menu' ); ?>
            </div>
        </div>

    </div>
</header>