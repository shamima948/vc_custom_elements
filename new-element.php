<?php

/*
*
Element: VC Text Box
*
*/


// Element Class
class VCtextBox extends WPBakeryShortCode
{
	// Element Init
	function __construct()
	{
		add_action('init', array( $this, 'vc_textbox_mapping' ));
		add_shortcode('vc_textbox', array($this, 'vc_textbox_html'));
	}



	// Element mapping
	public function vc_textbox_mapping()
	{
		// stop all function if visual composser is not enable
		if ( !defined('WPB_VC_VERSION')) {
			return;
		}

		// map the block in visual composser with vc_map()
		vc_map(

			array(

				'name' => __('VC Text Box', 'text-domain'),
				'base' => 'vc_textbox',
				'description' => __('Simple text editor box', 'text-domain'),
				'category' => __('New custom element','text-domain'),
				'icon' => get_template_directory_uri().'/assets/image/text.png',
				'params' => array(

					array(

						'type' => 'textfield',
						'holder' => 'h4',
						'class' => 'title-class',
						'heading' => __('Title', 'text-domain'),
						'description' => __('Content title', 'text-domain'),
						'param_name' => 'title',
						'value' => __('', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom New Group',

						),
					array(

						'type' => 'attach_image',
						'heading' => __('Image', 'text-domain'),
						'description' => __('Select image from library', 'text-domain'),
						'param_name' => 'image',
						'value' => '',
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom New Group',

						),
			
					array(

						'type' => 'textarea_html',
						'holder' => 'div',
						'heading' => __('Text', 'text-domain'),
						'description' => __('Content description', 'text-domain'),
						'param_name' => 'content',
						'value' => __('', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom New Group',

					),
				)


			)
		);
	}



	// Element Html
	public function vc_textbox_html( $atts, $content )
	{
		// params extraction
		extract(
			shortcode_atts(
				array(
					'title' => '',
					'image' =>'',
				),
				$atts
			)
			 
		);

		$atts['content'] = $content;

		$image_link = wp_get_attachment_url($image);
		
		
		$html = '

		<div class="vc_textbox_sha">

		
		<div class="vc_textbox_img"> 
			<img src="'.$image_link.'" alt="Test">
		</div>
		<h4 class="vc_textbox_title"> '.$title.' </h4>
		<div class="vc_textbox_content"> '.$content.' </div>


		</div>';

		return $html;

	}
}// End Element Class

// Element class Init
new VCtextBox();
?>
