<?php

class SearchSidebar extends WP_Widget {


    function __construct() {
        parent::__construct (
            'search_widget',
            'Search Sidebar',

            array(
                'description' => 'Search form in Sidebar'
            )
        );
    }

    function form( $instance ) {
        parent::form( $instance );


        $default = array(
            'title' => 'Search Sidebar'
        );


        $instance = wp_parse_args( (array) $instance, $default);


        $title = esc_attr( $instance['title'] );

        echo 'Title: <input class="widefat" type="text" name="' . $this->get_field_name('title') . '" value="' . $title . '" />';

    }

    function update( $new_instance, $old_instance ) {
        parent::update( $new_instance, $old_instance );

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function widget( $args, $instance ) {
        extract( $args );
        echo $before_widget;

        $html = '<div  class="form_new_right">';
        $html .= '<div  class="new_group">';
        $html .= '<form role="search" method="get" action="' . get_home_url() .'">';
        $html .= '<input type="search" class="form-control Enter_form" placeholder="Search" value="" name="s">';
        $html .= '<button type="submit" class="btn btn_enter_form"><i class="fa fa-search" aria-hidden="true"></i></button>';
        $html .= '</form>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;

        echo $after_widget;
    }

}

add_action( 'widgets_init', 'create_search_widget' );
function create_search_widget() {
    register_widget('SearchSidebar');
}