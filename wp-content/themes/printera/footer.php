<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package printera
 */

		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$printera_options = get_option( 'printera_options' );
			$footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : '';

			if( $footer_style == 1 ){
				get_template_part( 'template-parts/footer/footer', 'one' );
			}elseif( $printera_options['footer-style'] == "footer-style-1" ){
				get_template_part( 'template-parts/footer/footer', 'one' );
			}else{
				get_template_part( 'template-parts/footer/footer', 'main' );
			}

		} else{
			get_template_part( 'template-parts/footer/footer', 'main' );
		} ?>	
	</div><!-- #page -->
</div><!-- #viewport -->
<?php
if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$printera_options = get_option( 'printera_options' );

	if ( $printera_options['opt-backtotop'] == 1 ) {
		if( ! empty( $printera_options['backtotop-img']['url'] ) && $printera_options['backtotop-de-img'] == 0 ){ ?>
			<a class="section-back-to-top back-to-top-img" id="section-top" href="javascript:void(0);">
				<img class="img-fluid logo" src="<?php echo esc_url( $printera_options['backtotop-img']['url'] ); ?>" alt="<?php esc_attr_e( 'Top', 'printera' ); ?>">
			</a>
			<?php
		} else { ?>
				<div class="back-to-top">
					<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
						<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
					</svg>
				</div>
			<?php
		}
	}
} else {
	?>
	<div class="back-to-top">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<?php
}

get_template_part( 'inc/core/subscribe-popup' );
wp_footer();

?>


<!-- Dark - Light switch CODE -->

<?php
	$printera_options = get_option( 'printera_options' );
	if( $printera_options['dark-light-option'] == 'dark-light-01' ){
	?>
				<label for="night-light-checkbox" class="night-light-label">
						<input type="checkbox" id="night-light-checkbox">
						<span class="night-light-ball"></span>

				<div class="sun-svg">	
				<i class="fa-solid fa-moon"></i>
				<h6>light</h6> 	
				</div>
				<div  class="moon-svg">	
				<i class="fa-solid fa-sun"></i>	
				<h6>dark</h6>
				</div>
					</label>


					<?php }else{ ?>
		
	<?php } ?>


</body>
</html>



<!-- Dark - Light switch JS -->
<script>
	
	const darkCheck = document.getElementById('night-light-checkbox');

	darkCheck.addEventListener('click', () => {
	if (darkCheck.checked) {
		document.body.classList.add('dark-mode');
		localStorage.setItem('dark-switcher', 'dark');
	} else {
		document.body.classList.remove('dark-mode');
		localStorage.removeItem('dark-switcher');
	}
	});

	if (localStorage.getItem('dark-switcher')) {
	document.body.classList.add('dark-mode');
	darkCheck.checked = true;
	}

</script>

<!-- Dark - Light switch CSS -->
<style>
.night-light-label #night-light-checkbox {
  position: absolute;
  visibility: hidden;
}

.night-light-label {
  position: fixed;
top: 70%;
bottom: auto;
left: 10px;
right: auto;
writing-mode: vertical-rl;
transform: rotate(180deg);
-webkit-transform: rotate(180deg);
-moz-transform: rotate(180deg);
-ms-transform: rotate(180deg);
-o-transform: rotate(180deg);
width: 33px;
height: 120px;
border-radius: 25px;
-moz-border-radius: 25px;
-webkit-border-radius: 25px;
-khtml-border-radius: 25px;
background: var(--color-text);
display: flex;
align-items: center;
justify-content: space-around;
z-index: 999;
border: none;
margin: 0;
overflow: hidden;
padding: 0 4px 0 0;
outline: #fff solid 2px;
padding: 10px 0;
	cursor:pointer;
}

.night-light-label .night-light-ball {
 position: absolute;
width: 23px;
height: 54px;
top: auto;
left: 5px;
border-radius: 25px;
/* background: var(--primary-color); */
z-index: -1;
transition: 300ms;
bottom: 60px;
}

.night-light-label #night-light-checkbox:checked + .night-light-ball {
  transform: translateY(50px);
}
.moon-svg,.sun-svg{
display: flex;
align-items: center;
justify-content: center;
}
.moon-svg h6,.sun-svg h6{
color: #fff;
font-size: 14px;
margin: 0;
color: #fff;
font-size: 14px;
margin: 0;
font-family: var(--secondary-font);
text-transform: capitalize;	
}
.moon-svg svg,.sun-svg svg{
color: #fff;
font-size: 14px;
display: none;
}
@media (max-width:991px) {
.night-light-label{
height: 70px;
            width: 30px;
padding: 6px;
}
.moon-svg h6,.sun-svg h6 {
            font-size: 0;
            display: none;
        }
 .moon-svg svg,.sun-svg svg {
            display: block !important;
            margin: 0;
        }
.night-light-label .night-light-ball {
    height: 22px;
    width: 22px;
    top: 39px;
    border-radius: 50%;
    left: 4px;
}
.night-light-label #night-light-checkbox:checked + .night-light-ball {
    transform: translateY(-29px);
}
}

</style>
</body>
</html>
