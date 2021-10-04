<?php
/**
 * Change number or products per row to 3
 */

if ( ! function_exists( 'loop_columns' ) ) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter( 'loop_shop_columns', 'loop_columns', 999 );


// Woocommerce breadcrumb disable in shop page
function flipmart_remove_shop_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action( 'template_redirect', 'flipmart_remove_shop_breadcrumbs' );


/**
 * @snippet       Remove "Showing x results"
 */


function flipmart_remove_result_count() {
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
}

add_action( 'init', 'flipmart_remove_result_count' );


/**
 * @snippet       Remove "Default Pagination"
 */

function flipmart_remove_default_shop_pagination() {
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
}

add_action( 'init', 'flipmart_remove_default_shop_pagination' );


/*
 * Shop page pagination with custom class
 * */

function flipmart_shop_page_pagination() {

	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'type'      => 'array',
		'mid_size'  => 4,
		'prev_next' => true,
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'next_text' => '<i class="fa fa-angle-right"></i>',
	) );
	if ( is_array( $pages ) ) {
		$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
		foreach ( $pages as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div>';
	}
}


/*
 * Woocommerce product per page dropdown
 * */

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

function flipmart_woocommerce_catalog_page_ordering() {
	?>
    <div class="lbl-cnt">
		<?php echo '<span class="lbl">Show</span>' ?>
        <div class="fld inline">
            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                <form action="" method="POST" name="results" class="woocommerce-ordering">
                    <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby"
                            onchange="this.form.submit()">
						<?php

						//Get products on page reload
						if ( isset( $_POST['woocommerce-sort-by-columns'] ) && ( ( $_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns'] ) ) ) {
							$numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
						} else {
							$numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
						}

						//  This is where you can change the amounts per page that the user will use. feel free to change the numbers and text as you want.
						$shopCatalog_orderby = apply_filters( 'woocommerce_sortby_page', array(
							//Add as many of these as you like, -1 shows all products per page
//				  ''       => __('Results per page', 'woocommerce'),
							'10' => __( '10', 'flipmart' ),
							'20' => __( '20', 'flipmart' ),
							'30' => __( '30', 'flipmart' ),
							'40' => __( '40', 'flipmart' ),
							'50' => __( '50', 'flipmart' ),
							'-1' => __( 'All', 'flipmart' ),
						) );

						foreach ( $shopCatalog_orderby as $sort_id => $sort_name ) {
							echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
						}
						?>
                    </select>
                </form>
            </div>
        </div>
    </div>
	<?php
}

// now we set our cookie if we need to
function flipmart_sort_by_page( $count ) {
	if ( isset( $_COOKIE['shop_pageResults'] ) ) { // if normal page load with cookie
		$count = $_COOKIE['shop_pageResults'];
	}
	if ( isset( $_POST['woocommerce-sort-by-columns'] ) ) { //if form submitted
		setcookie( 'shop_pageResults', $_POST['woocommerce-sort-by-columns'], time() + 1209600, '/', 'http://localhost/wordpress/', false ); //this will fail if any part of page has been output- hope this works!
		$count = $_POST['woocommerce-sort-by-columns'];
	}

	// else normal page load and no cookie
	return $count;
}

add_filter( 'loop_shop_per_page', 'flipmart_sort_by_page' );


/**
 * Add custom sorting options
 */

add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order']  = __( 'Position', 'flipmart' );
	$sortby['popularity']  = __( 'Sort by popularity', 'flipmart' );
	$sortby['rating']      = __( 'Sort by average rating', 'flipmart' );
	$sortby['date']        = __( 'Sort by newness', 'flipmart' );
	$sortby['price']       = __( 'Sort by price: low to high', 'flipmart' );
	$sortby['price-desc']  = __( 'Sort by price: high to low', 'flipmart' );
	$sortby['random_list'] = __( 'Sort by Random', 'flipmart' );


	return $sortby;
}

/*
 * Woocommerce grid/list default toggole remove
 * */

function remove_plugin_actions() {
	global $WC_List_Grid;
	remove_action( 'woocommerce_before_shop_loop', array( $WC_List_Grid, 'gridlist_toggle_button' ), 30 );
}

add_action( 'woocommerce_archive_description', 'remove_plugin_actions' );