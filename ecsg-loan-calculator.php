<?php
/*
Plugin Name: Singapore Mortgage And Loan Calculator
Description: A widget to calculate Mortgage And Loan in Singapore.
Version: 1.0.0
Author: ExecutiveCondominiums.com.sg
*/

function ecsg_loan_calculator_scripts() {
	wp_register_script( 'ecsg_loan_calculator', 'http://executivecondominiums.com.sg/api/ecsg-loan-calculator/widget.js', array('jquery', 'jquery-ui-dialog'), '1.0', true );
	wp_enqueue_script( 'ecsg_loan_calculator' );
}
add_action( 'wp_enqueue_scripts', 'ecsg_loan_calculator_scripts' );

class ECSGLoanCalculator_Widget extends WP_Widget {
	function ECSGLoanCalculator_Widget() {
		$widget_ops = array('description' => 'A widget to calculate Mortgage And Loan in Singapore.' );
		parent::WP_Widget(false, 'Singapore Mortgage And Loan Calculator Widget', $widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		$title      = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ($title) { echo $before_title . $title . $after_title; }
?>

	<div id="ecsg-loan-calculator-AB984axtgvQcaE34"></div>

<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget("ECSGLoanCalculator_Widget");' ) );
?>
