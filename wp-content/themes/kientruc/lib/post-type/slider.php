<?php
function slider_post_type()
{


    $label = array(
        'name' => 'Slider',
        'singular_name' => 'Slider'
    );

    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Slider', //Mô tả của post type
        'supports' => array(
            'title',
        ),
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-pressthis', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );

    register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'slider_post_type');

function addMetaBox() {
    add_meta_box( "Slider-MetaBox", 'Add Image', 'addImageToSlider', 'slider' );
}
add_action( 'add_meta_boxes', 'addMetaBox', 1, 2 );
//add_action( 'add_meta_boxes', 'addMetaBox' );
function addImageToSlider($post)
{
    $sliders = get_post_meta($post->ID, 'slider_images', true);
    $sliders = unserialize($sliders);
    ?>
    <style>
        span.remove-image {
            float: right;
            font-size: 20px;
            font-weight: 600;
            position: absolute;
            right: 0;
            margin-right: auto;
            top: -9px;
            cursor: pointer;
        }

        p.header {
            position: relative;
            background: #f1f1f1;
            /* color: #fff; */
        }

        p.header {}
    </style>
    <?php $sliders = ($sliders) ? $sliders : [['image'=> '', 'caption' => '']];
   // echo '<pre>';
    //var_dump($sliders[0]->image);
   // exit;
    $i = 0;
        foreach($sliders as $slider) {
            $slider = (array)$slider;
            $close = $i ? '<span class="remove-image">x</span>' : '';
            if ($slider['image']) {
                $src  = wp_get_attachment_image_src(  $slider['image'], 'thumbnail' );
                $imgTag = '<img src="' . reset( $src ) . '" alt="" style="height: 100px;">';
            } else {
                $imgTag = '';
            }

    ?>
            <div class="slider-item">
                <input class="image" name="slider[image][]" value="<?php echo $slider['image'] ?>" type="hidden">

                <div>
                    <p class="header"><strong>Select Media</strong> <?php echo $close ?> </p>
                    <button class="button button-small media-gallery select-image" style="display: inline-block">Images</button>
                    <div class="preview-img" style="margin-top: 5px; display: inline-block"><?php echo $imgTag ?> </div>
                </div>

                <div>
                    <p><strong>Caption</strong></p>
                    <textarea class="large-text caption" rows="3" name="slider[caption][]"><?php echo $slider['caption'] ?></textarea>
                </div>
                <hr>
            </div>
    <?php
            $i++;
        };
    ?>
    <div>
        <p>
            <button class="button button-small add-image">Add Image</button>
        </p>
    </div>
    <?php
}
function saveSlider( $post_id )
{
    $slider =  $_POST['slider'];
    if (!$slider || !count($slider)) {
        return;
    }
    $slider = array_map(function ($image, $caption){
        $data['image'] = $image;
        $data['caption'] = $caption;
        return $data;
    }, $slider['image'], $slider['caption']);
    $slider = serialize($slider);

    update_post_meta( $post_id, 'slider_images', $slider );
}
add_action( 'save_post', 'saveSlider' );

function HookAdminEnqueueScripts( $Hook )
{

    if ( ($Hook == 'post.php' || $Hook == 'post-new.php') && $_GET['post_type'] = 'slider' )
    {
        if ( function_exists( 'wp_enqueue_media' ) )
        {
            wp_enqueue_media();
        }

        wp_enqueue_script( get_template_directory_uri(). 'js/admin.js',  'jquery' , 1.0 );
    }
}

add_action( 'admin_enqueue_scripts', 'HookAdminEnqueueScripts', 10, 1 );

