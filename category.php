<?php get_header() ?>
<div class="container">
  <h1 class="category-title"><?php single_cat_title() ?></h1>
  <div class="post-list-wrapper">
    <div class="post-list">
      <?php while ( have_posts() ){ the_post(); ?>
        <a href="<?php echo the_permalink() ?>" class="post-card">
          <img src="<?php if( has_post_thumbnail() ) {
            echo get_the_post_thumbnail_url();
          }
          else {
            echo get_template_directory_uri().'/assets/images/post-default.png';
          }
          ?>" alt="" class="post-card-thumb">
          <div class="post-card-text">
            <h2 class="post-card-title"><?php echo mb_strimwidth(get_the_title(), 0, 21, '...') ?></h2>
            <p class="post-card-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 110, '...') ?></p>
            <div class="author">
              <?php $author_id = get_the_author_meta('ID'); ?>
              <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
              <div class="author-info">
                <span class="author-name"><strong><?php the_author() ?></strong></span>
                <span class="date"><?php the_time( 'j M' ); ?></span>
                <div class="comments">
                  <svg width="19" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                </div>
                <!-- comments -->
                <div class="likes">
                  <svg width="19" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                </div>
                <!-- /.likes -->
              </div>
              <!-- /.author-info -->
            </div>
            <!-- author -->
          </div>
          <!-- /.post-card-text -->
        </a>
        <!-- /.post-card -->
      <?php } ?>
      <?php if ( ! have_posts() ){ ?>
        Записей нет.
      <?php } ?>
    </div>
    <!-- /.post-list -->
    <?php 
      $args = array(
        'prev_text' => '&larr; Назад',
        'next_text' => 'Вперед &rarr;',
      );
      the_posts_pagination($args) ?>
  </div>
  <!-- /.post-list-wrapper -->
</div>
<!-- /.container -->
<?php get_footer() ?>