<?php

class Kirki_Customize_Text_Control extends WP_Customize_Control {

	public $type = 'text';

	public $description = '';

	public $subtitle = '';

	public $separator = false;

	public $required;

	public function render_content() { ?>

		<label class="customizer-text">
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>

				<?php if ( isset( $this->description ) && '' != $this->description ) { ?>
					<a href="#" class="button tooltip" title="<?php echo strip_tags( esc_html( $this->description ) ); ?>">?</a>
				<?php } ?>
			</span>

			<?php if ( '' != $this->subtitle ) : ?>
				<div class="customizer-subtitle"><?php echo $this->subtitle; ?></div>
			<?php endif; ?>

			<input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
		</label>
		<?php if ( $this->separator ) echo '<hr class="customizer-separator">'; ?>
		<?php foreach ( $this->required as $id => $value ) :

			if ( isset($id) && isset($value) && get_theme_mod($id,0)==$value ) { ?>
				<script>
				jQuery(document).ready(function($) {
					$( "#customize-control-<?php echo $this->id; ?>" ).show();
					$( "#<?php echo $id . get_theme_mod($id,0); ?>" ).click(function(){
						$( "#customize-control-<?php echo $this->id; ?>" ).fadeOut(300);
					});
					$( "#<?php echo $id . $value; ?>" ).click(function(){
						$( "#customize-control-<?php echo $this->id; ?>" ).fadeIn(300);
					});
				});
				</script>
			<?php }

			if ( isset($id) && isset($value) && get_theme_mod($id,0)!=$value ) { ?>
				<script>
				jQuery(document).ready(function($) {
					$( "#customize-control-<?php echo $this->id; ?>" ).hide();
					$( "#<?php echo $id . get_theme_mod($id,0); ?>" ).click(function(){
						$( "#customize-control-<?php echo $this->id; ?>" ).fadeOut(300);
					});
					$( "#<?php echo $id . $value; ?>" ).click(function(){
						$( "#customize-control-<?php echo $this->id; ?>" ).fadeIn(300);
					});
				});
				</script>
			<?php }

		endforeach;
	}
}
