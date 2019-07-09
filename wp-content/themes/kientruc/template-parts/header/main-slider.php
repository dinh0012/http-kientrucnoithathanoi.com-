<?php
$imgsStr = WPEX_Theme_Options::get_theme_option('slider_home');
$imgs = explode(",", $imgsStr);
$html = "";
foreach ($imgs as $index => $img) {
    $active = ($index == 0) ? "active" : '';
    $img = wp_get_attachment_image_url($img, "large");
    $html .= '<li class="carousel-item ' . $active . '">
                    <img class="d-block" src="' . $img . '">
                  </li>';
}
?>
<?php if ($html): ?>
    <div class="main-slide">
        <div class="box-slide">
            <section class="slider">
                <div class="flexslider" id="bigslideshow">
                    <ul class="slides">
                        <?= $html ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
<?php endif; ?>