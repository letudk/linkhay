<?php 

class cms_customize {
	public static function register ( $wp_customize ) {
		$wp_customize->add_section( 'cms_options_section', array(
			'title' => __( 'Cài đặt giao diện', 'linkhay' ),
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'description' => __('Cài đặt tùy chọn cho giao diện.', 'linkhay'),
			)
		);
		$wp_customize->add_setting( 'cms_options[logo_url]', array(
			'default' => '',
			'type' => 'option',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( 'cms_logo_url', array(
			'label' => __( 'Logo Url', 'linkhay' ),
			'section' => 'cms_options_section',
			'settings' => 'cms_options[logo_url]',
			'priority' => 10,
			)
		);
	}
}
add_action( 'customize_register' , array( 'cms_customize' , 'register' ) );