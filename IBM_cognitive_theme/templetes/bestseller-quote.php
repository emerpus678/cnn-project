<section class="hs-panel bestseller-quote tdFadeInUp" aria-labelledby="bestseller-quote-heading">
	<div class="bestseller-quote__layout">
		<div class="bestseller-quote__media">
			<div class="bestseller-quote__inner">
				<img
					class="bestseller-quote__photo"
					src="<?php echo esc_url( ibm_cognitive_asset_url( 'images/img6.jpg' ) ); ?>"
					alt="<?php esc_attr_e( 'Person typing on a laptop', 'ibm-cognitive' ); ?>"
					loading="lazy"
				>
				<img
					class="bestseller-quote__overlay"
					src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/img4-lines.svg' ) ); ?>"
					alt=""
					aria-hidden="true"
				>
			</div>
		</div>

		<blockquote class="bestseller-quote__quote">
			<p class="bestseller-quote__intro" id="bestseller-quote-heading">
				<?php esc_html_e( 'These tip-of-iceberg insights motivated Bestseller into using Watson as part of its strategy, ultimately boosting sales.', 'ibm-cognitive' ); ?>
			</p>
			<span class="bestseller-quote__mark" aria-hidden="true">“</span>
			<p class="bestseller-quote__text">
				<?php esc_html_e( 'We initially used it for employee engagement and now aim to implement the technology further in fashion decision making to understand future trends with the help of artificial intelligence.', 'ibm-cognitive' ); ?>
			</p>
			<cite class="bestseller-quote__cite">
				<?php
				echo wp_kses_post(
					__( '&mdash; <strong>Vineet Gautam</strong>, CEO, Bestseller India', 'ibm-cognitive' )
				);
				?>
			</cite>
		</blockquote>
	</div>
</section>
