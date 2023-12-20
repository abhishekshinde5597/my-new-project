<?php
/**
 * Single view Company information box
 *
 * Hooked into single_job_listing_start priority 30
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing-company.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.14.0
 * @version     1.32.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! get_the_company_name() ) {
	return;
}
?>
<div class="company">
	<?php
$website = get_the_company_website();
?>
<div class="company-de-logo">
<a class="website" href="<?php echo esc_url( $website ); ?>" rel="nofollow">
	<?php the_company_logo(); ?>
	</a>
</div>
	<div class="company_header">
		<div class="cy-details-title">
		<p class="name">
			
			<?php the_company_twitter(); ?>
			
			<a class="website" href="<?php echo esc_url( $website ); ?>" rel="nofollow"><?php echo the_company_name(); ?></a>
			<?php the_company_tagline( '<p class="tagline">', '</p>' ); ?>
		</p>
    </div>
	
	</div>
	<div class="cy-details-anchor">
		<?php if ( $website = get_the_company_website() ) : ?>
				<a class="website" href="<?php echo site_url();?>/postuler/?jobtitle=<?php echo get_the_title(); ?>&companyname=<?php $companyname = get_post_meta( get_the_ID(), '_company_name', true ); echo $companyname ; ?>" rel="nofollow"><?php esc_html_e( 'Postuler', 'wp-job-manager' ); ?></a>
			<?php endif; ?>
	</div>

	<?php the_company_video(); ?>
</div>
