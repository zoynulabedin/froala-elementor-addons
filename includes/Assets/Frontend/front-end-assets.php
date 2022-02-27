<?php 
namespace User\froala\Assets\Frontend;
class Front_end_assets{
    public function froala_css(){
        wp_enqueue_style( 'froala-css', plugins_url( '/assets/css/froala_blocks.css', __FILE__ ) );
    }
}