<?php
    $logo = get_theme_option('logoHome');
    $imgsStr = WPEX_Theme_Options::get_theme_option('imgs');
    $imgs = explode(",", $imgsStr);
    $html = "";
    foreach ($imgs as $index=>$img) {
        $active = ($index == 0) ?  "active" : '';
        $img = wp_get_attachment_image_url($img,"large");
        $html .= '<div class="carousel-item '.$active.'">
                    <img class="d-block" src="' .$img. '">
                  </div>';
    }
?>
<head>
    <!-- Mirrored from www.tramdecor.com/vn/thiet-ke-noi-that by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Oct 2018 07:06:22 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <!-- -->
    <title>
        <?php the_title() ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css"
          href="//fonts.googleapis.com/css?family=Comfortaa:400,700|Prompt:700,700i,400i,400,300|Quicksand:400"/>
    <meta charset="utf-8">
    <?php wp_head(); ?>
</head>

<style>.row-home{height:100%}</style>
<div class="container">
    <div class="row row-home">
        <div class="col align-self-center">
            <div class="container-home">
                <div class="img-on-home">
                    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel"
                     data-interval="4000">
                        <div class="carousel-inner">
                            <?php echo $html; ?>
                        </div>
                    </div>
                </div>
                <div class="log-on-home">
                    <img src="<?php echo $logo ?>">
                </div>
                <div class="link-to-index">
<<<<<<< HEAD
                    <a href="/thiet-ke-noi-that/">Welcome</a>
=======
                    <a href="/trang-chu/">Welcome</a>
>>>>>>> 2b2f88fb217b22900acd57c2f1a224e235bfaf20
                </div>
            </div>

        </div>
    </div>
</div>
<?php wp_footer(); ?>