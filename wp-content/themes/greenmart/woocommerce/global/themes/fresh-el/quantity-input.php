<?php

/* translators: %s: Quantity. */
$label = !empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'greenmart'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'greenmart');

?>
<div class="box-quantity <?php echo esc_attr($type == 'hidden' ? 'hidden' : ''); ?>">
	<div class="quantity">
		<?php
        /**
         * Hook to output something before the quantity input field.
         *
         * @since 7.2.0
         */
        do_action('woocommerce_before_quantity_input_field');
        ?>
  		<label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_html($label); ?></label>
		<button class="minus" type="button" value="-" tabindex="0"><i class="tb-icon tb-icon-zz-minus"></i></button>
		<input 
			type="<?php echo esc_attr($type); ?>"
			<?php echo esc_attr($readonly ? 'readonly="readonly"' : ''); ?>
			id="<?php echo esc_attr($input_id); ?>"
			class="<?php echo esc_attr(join(' ', (array) $classes)); ?>"
			min="<?php echo esc_attr($min_value); ?>" 
			max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>" 
			name="<?php echo esc_attr($input_name); ?>" 
			value="<?php echo esc_attr($input_value); ?>" 
			aria-label="<?php esc_attr_e( 'Product quantity', 'greenmart' ); ?>"
			size="4"
			<?php if (!$readonly): ?>
				step="<?php echo esc_attr($step); ?>" 
				placeholder="<?php echo esc_attr($placeholder); ?>"
				inputmode="<?php echo esc_attr($inputmode); ?>" 
				autocomplete="<?php echo esc_attr(isset($autocomplete) ? $autocomplete : 'on'); ?>"
			<?php endif; ?>
		/>
		<button class="plus" type="button" value="+" tabindex="0"><i class="tb-icon tb-icon-zz-plus"></i></button>
		<?php
        /**
         * Hook to output something after quantity input field.
         *
         * @since 3.6.0
         */
        do_action('woocommerce_after_quantity_input_field');
        ?>
	</div>
</div>