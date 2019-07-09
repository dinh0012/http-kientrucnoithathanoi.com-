<?php
function charm_package_post_type()
{


    $label = array(
        'name' => 'Charm Packages',
        'singular_name' => 'Charm Package'
    );

    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Charm Packages', //Mô tả của post type
        'supports' => array(
            'title',
            'editor',
            'thumbnail',

        ),
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-products', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );

    register_post_type('charm_package', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

}
add_action('init', 'charm_package_post_type');


//location
function location_meta_box()
{
    add_meta_box( 'location', 'Location', 'location_output', 'charm_package' );
}
function location_output( $post )
{
    $location = get_post_meta( $post->ID, '_location', true );
    echo ( '<label for="link_download" style="margin-right: 5px">Display In: </label>');
    echo ('<label><input type="radio"  id="location_home" ' . checkedRadio( $location, 'home', true ) . ' name="location" value="home" /> <span style="margin-right: 15px">Home page</span></label>');
    echo ('<label><input type="radio" id="location_service" ' . checkedRadio( $location, 'service' ) . ' name="location" value="service" /> Service page</label>');
}
add_action( 'add_meta_boxes', 'location_meta_box' );
function location_save( $post_id )
{
    $location = sanitize_text_field( $_POST['location'] );
    update_post_meta( $post_id, '_location', $location );
}
add_action( 'save_post', 'location_save' );

function checkedRadio($value, $compare, $default = false) {
    if ($value == $compare) {
        return 'checked="checked"';
    }
    if (!$value && $default) {
        return 'checked="checked"';
    }
}

//icon_package
function icon_package_meta_box()
{
    add_meta_box( 'icon_package', 'Icon', 'icon_package_output', 'charm_package' );
}
function icon_package_output( $post )
{
    $icon = get_post_meta( $post->ID, '_icon_package', true );
    echo ( '<label for="icon_package">Icon Class: </label>');
    echo ('<label><input type="text"  name="icon_package" value="'. $icon . '" /></label>');
}
add_action( 'add_meta_boxes', 'icon_package_meta_box' );
function icon_package_save( $post_id )
{
    $location = sanitize_text_field( $_POST['icon_package'] );
    update_post_meta( $post_id, '_icon_package', $location );
}
add_action( 'save_post', 'icon_package_save' );

