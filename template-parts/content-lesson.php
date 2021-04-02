<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- шапка поста -->
  <header class="entry-header <?php echo get_post_type(); ?>-header" style="background: linear-gradient(0deg, rgba(38, 45, 51, 0.75), rgba(38, 45, 51, 0.75));">
		<div class="container">
      <div class="post-header-wrapper">
        <div class="video">
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/7c52uFUu1TQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <?php 
            $tmp = explode('?v=', get_field('video_link'));
            echo end ($tmp);
            
          ?>
        </div>
        <!-- /.video -->
        <!-- /.post-header-nav -->
        <!-- post-header-title-wrapper -->
        <div class="post-header-info">
          <div class="post-header-time">
            <svg width="15" height="15" class="icon clock-icon">
              <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#clock"></use>
            </svg>
            <span class="post-header-date"><?php the_time( 'j F, G:i' ); ?></span>
          </div>
        </div>
        <!-- /.post-header-info -->
      </div>
      <!-- post-header-wrapper -->
    </div>
    <!-- /.container -->
	</header>
  <!-- Шапка поста -->
</article>