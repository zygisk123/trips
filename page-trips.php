<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trips
 */

get_header();
?>
	<?php
	$query = new WP_QUERY(array(
		'post_type' => 'trips'
	));
	?>

    <main id="primary" class="site-main">
		<div class="container mt-5">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<table class="table" >
						<thead>
							<tr>
								<th>Month</th>
								<th>Distance (km)</th>
								<th>Max people allowed</th>
								<th>With Animals</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if ($query->have_posts()) {
									while ($query->have_posts()) {?>
										<?php $query->the_post(); ?>
										<div class="item d-inline col-3 mt-3 mb-3">
											<tr>
												<td class="tripMonth">
													<?=get_field('month', get_the_ID())?>
												</td>
												<td class="tripDistance">
													<?=get_field('distance', get_the_ID())?>
												</td>  
												<td class="tripPeopleAllowed">
													<?=get_field('max_people_allowed', get_the_ID())?>
												</td>  
												<td class="withAnimals">
													<?=(get_field('with_animals', get_the_ID()))? "yes": "no"?>
												</td>  
											</tr>
										</div>
								<?php }}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-2"></div>
			</div>
		</div>
    </main><!-- #main -->

<?php
get_footer();
