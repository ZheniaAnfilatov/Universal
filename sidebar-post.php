      <ul class="content-post">
        <?php		
        global $post;

        $category = get_the_category();
        $query = new WP_Query( [
          'posts_per_page' => 4,
          'category__in' => array($current_cat_id = $category[0]->cat_ID),
          'post__not_in' => array($post -> ID),
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            ?>
            <li class="content-post-item">
              <a href="<?php echo the_permalink() ?>" class="content-post-item-permalink">
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
              <!-- content-post-item-permalink -->
              <h4 class="content-post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...') ?></h4>
              <div class="content-post-footer">
                <div class="comments digest-comments">
                  <svg width="19" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#eye"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                </div>
                <!-- comments -->
                <div class="comments digest-comments">
                  <svg width="19" height="15" class="icon comments-icon">
                    <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
                  </svg>
                  <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                </div>
                <!-- comments -->
              </div>
              <!-- /.content-post-footer -->
            </li>
            <!-- /.content-post-item -->
            <?php 
          }
        } else {
          // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post
        ?>
      </ul>
      <!-- /.content-post -->