<?php 

/**
	* Layout Child Category 1
	* @version     1.0.0
**/
if( $category == '' ){
	return '<div class="alert alert-warning alert-dismissible" role="alert">
		<a class="close" data-dismiss="alert">&times;</a>
		<p>'. esc_html__( 'Please select a category for SW Woo Slider. Layout ', 'sw_woocommerce' ) . $layout .'</p>
	</div>';
}

$widget_id = isset( $widget_id ) ? $widget_id : $this->generateID();
$viewall = get_permalink( wc_get_page_id( 'shop' ) );
$default = array();
if( $category != '' ){
	$default = array(
		'post_type' => 'product',
		'tax_query' => array(
		array(
			'taxonomy'  => 'product_cat',
			'field'     => 'slug',
			'terms'     => $category ) ),
		'orderby' => $orderby,
		'order' => $order,
		'post_status' => 'publish',
		'showposts' => $numberposts
	);
}
$default = sw_check_product_visiblity( $default );

$term_name = '';
$term = get_term_by( 'slug', $category, 'product_cat' );
if( $term ) :
	$term_name = $term->name;
	$viewall = get_term_link( $term->term_id, 'product_cat' );
endif;

$list = new WP_Query( $default );
if ( $list -> have_posts() ){ 
	$x_array = array();
	$key = 0;
	foreach( $list->posts as $item ){
		$m_array = array();
		$terms = get_the_terms( $item->ID, 'product_brand' );
		if( $terms ){
			foreach( $terms as $x => $bterm ){
				$m_array[$x] = $bterm -> term_id;
			}
			$x_array[$key] = implode( $m_array );
			$key ++; 
		}		
	}
?>
	<div id="<?php echo 'slider_' . $widget_id; ?>" class="responsive-slider woo-slider-default sw-child-cat3 <?php echo esc_attr( $style );?> loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<div class="child-top pull-left">
			<div class="child-top-left pull-left">
				<!-- Banner -->
				<?php 
				$banner_links = explode( ',', $banner_links );
				if( $img_banners != '' ) :
					$img_banners = explode( ',', $img_banners );	
				endif;
				?>
				<div class="banner-category clearfix">
					<div id="<?php echo esc_attr( 'banner_' . $widget_id ); ?>" class="banner-slider" data-lg="1" data-md="1" data-sm="1" data-xs="1" data-mobile="1" data-dots="true" data-arrow="false" data-fade="false">
						<div class="banner-responsive">
							<?php foreach( $img_banners as $key => $img ) : ?>
								<div class="item pull-left">
									<a href="<?php echo esc_url( $banner_links[$key] ); ?>"><?php echo wp_get_attachment_image( $img, 'full' ); ?></a>
								</div>
							<?php endforeach;?>
						</div>
					</div>									
				</div>
				<!-- Brand -->
				<?php if( count( $x_array > 0 ) ) : ?>
				<div class="child-cat-brand">
					<?php 
						$x_array = array_unique( $x_array );
						foreach( $x_array as $key => $cat ) {
						if( $key > 2 ){
							break;
						}
							$thumbnail_id 	= absint( get_woocommerce_term_meta( intval( $cat ), 'thumbnail_bid', true ) );
							$thumb = wp_get_attachment_image( $thumbnail_id, array(170, 90) );
							$thubnail = ( $thumb != '' ) ? $thumb : '<img src="http://placehold.it/170x90" alt=""/>';
					?>
					<div class="item-brand">
						<a href="<?php echo get_term_link( intval( $cat ), 'product_brand' ); ?>"><?php echo $thubnail; ?></a>
					</div>
					<?php
						}
					?>
				</div>
				<?php endif; ?> 
			</div>
			<div class="child-top-right pull-left">
				<div class="box-title clearfix">
					<h3><?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h3>
					<button class="button-collapse collapsed pull-right" type="button" data-toggle="collapse" data-target="#<?php echo 'child_' . $widget_id; ?>"  aria-expanded="false">
						<span class="fa fa-bar"></span>
						<span class="fa fa-bar"></span>
						<span class="fa fa-bar"></span>					
					</button>					
				</div>
				<?php 
				if( $term ) :
					$termchild 		= get_terms( 'product_cat', array( 'parent' => $term->term_id, 'hide_empty' => 0, 'number' => $number_child ) );
					if( count( $termchild ) > 0 ){
				?>			
					<div class="childcat-content pull-left"  id="<?php echo 'child_' . $widget_id; ?>">				
					<?php 					
						echo '<ul>';
						echo '<li><a href="' . $viewall . '">' .esc_html__('New products', 'sw_woocommerce') . '</a></li>';
						foreach ( $termchild as $key => $child ) {
							echo '<li><a href="' . get_term_link( $child->term_id, 'product_cat' ) . '">' . $child->name . '</a></li>';
						}
						echo '</ul>';
					?>
					</div>
					<?php } ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="childcat-slider-content clearfix">			
			<div class="resp-slider-container">
				<div class="slider responsive">	
				<?php 
					$count_items 	= 0;
					$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
					$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
					$i 				= 0;
					while($list->have_posts()): $list->the_post();global $product, $post;
					$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
					if( $i % $item_row == 0 ){
				?>
					<div class="item <?php echo esc_attr( $class )?> product">
				<?php } ?>
						<?php include( WCTHEME . '/default-item2.php' ); ?>
					<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
					<?php $i++; endwhile; wp_reset_postdata();?>
				</div>
			</div> 
		</div>
	</div>
	<?php
	}else{
		echo '<div class="alert alert-warning alert-dismissible" role="alert">
		<a class="close" data-dismiss="alert">&times;</a>
		<p>'. esc_html__( 'There is not product in this category', 'sw_woocommerce' ) .'</p>
	</div>';
	}
?>