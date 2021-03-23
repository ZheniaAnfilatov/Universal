<?php get_header() ?>
<div class="container">
  <h1 class="serach-title">Результаты поиска по запросу:</h1>
  <div class="favourites">
    <div class="digest-wrapper">
      <ul class="digest">
        <?php while ( have_posts() ){ the_post(); ?>
          <li class="digest-item">
            <a href="<?php echo the_permalink() ?>" class="digest-item-permalink">
              <img src="<?php 
              //должно находится внутри цикла
              if( has_post_thumbnail() ) {
                echo get_the_post_thumbnail_url();
              }
              else {
                echo get_template_directory_uri().'/assets/images/post-default.png';
              }
              ?>" alt="" class="digest-thumb">
            </a>
            <!-- digest-item-permalink -->
            <a href="<?php echo the_permalink() ?>"class="digest-info">
              <?php 
                foreach (get_the_category() as $category) {
                  printf(
                    '<span class="category-link %s">%s</span>',
                    esc_html( $category -> slug ),
                    esc_html( $category -> name )
                  );
                }
                ?>
              <h4 class="digest-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...') ?></h4>
              <p class="digest-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 165, '...') ?></p>
              <div class="digest-footer">
                <span class="digest-date"><?php the_time( 'j F' ); ?></span>
                <div class="comments digest-comments">
                  <svg width="19" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                </div>
                <!-- comments -->
                <div class="likes digest-likes">
                  <svg width="19" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#heart"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                </div>
                <!-- comments -->
              </div>
              <!-- /.digest-footer -->
            </a>
            <!-- digest-info -->
          </li>
          <!-- /.digest-item -->
        <?php } ?>
        <?php if ( ! have_posts() ){ ?>
          Записей нет.
        <?php } ?>
      </ul>
      <?php 
      $args = array(
        'prev_text' => '&larr; Назад',
        'next_text' => 'Вперед &rarr;',
      );
      the_posts_pagination($args) ?>
    </div>
    <!-- digest-wrapper -->
    <!-- подключаем нижний сайдбар -->
    <?php get_sidebar('home-bottom'); ?>
  </div>
  <!-- /.favourites -->
</div>
<!-- /.container -->
<?php get_footer() ?>