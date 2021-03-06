<?php get_header();?>
<main class="front-page-header">
  <div class="container">
    <div class="hero">
      <div class="left">
        <?php
          global $post;

          $myposts = get_posts([ 
            'numberposts' => 1,
            'category_name' => 'javascript, css, html, web-design',
          ]);
          // проверяем есть ли посты
          if( $myposts ){
            // если есть, запускаем цикл
            foreach( $myposts as $post ){
              setup_postdata( $post );
              ?>
              <!-- выводим записи -->
            <img src="<?php if( has_post_thumbnail() ){
              echo get_the_post_thumbnail_url( null, 'main-thumb' );
            }
            else {
              echo get_template_directory_uri().'/assets/image/main-default.png';
            } ?>" alt="" class="post-thumb">
            <?php $author_id = get_the_author_meta('ID'); ?>
            <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
              <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="avatar">
              <div class="author-bio">
                <span class="author-name"><?php the_author() ?></span>
                <span class="author-rank">Должность</span>
              </div>
              <!-- /.author-bio -->
            </a>
            <div class="post-text">
              <?php
                foreach (get_the_category() as $category) {
                  printf(
                    '<a href="%s" class="category-link %s">%s</a>',
                    esc_url( get_category_link( $category) ),
                    esc_html( $category -> slug ),
                    esc_html( $category -> name )
                  );
                }
              ?>
              <h2 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...') ?></h2>
              <a href="<?php echo get_the_permalink() ?>" class="more">Читать далее</a>
            </div>
            <!-- /.post-text -->
        <?php 
            }
          } else {
            ?> <p>Постов нет</p> <?php 
            // Постов не найдено
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>
      </div>
      <!-- /.left -->
      <div class="right">
        <h3 class="recommend">Рекомендуем</h3>
        <ul class="posts-list">
          <?php
            global $post;

            $myposts = get_posts([ 
              'numberposts' => 5,
              'offset' => 1,
              'category_name' => 'javascript, css, html, web-design',
            ]);
            // проверяем есть ли посты
            if( $myposts ){
              // если есть, запускаем цикл
              foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
                <!-- выводим записи -->
                <li class="post">
                  <?php 
                  foreach (get_the_category() as $category) {
                    printf(
                      '<a href="%s" class="category-link %s">%s</a>',
                      esc_url( get_category_link( $category) ),
                      esc_html( $category -> slug ),
                      esc_html( $category -> name )
                    );
                  }
                  ?>
                  <a class="post-permalink" href="<?php echo get_the_permalink()?>">
                    <h4 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...') ?></h4>
                  </a>
                </li>
                <?php 
                  }
              } else {
                ?> <p>Постов нет</p> <?php 
                // Постов не найдено
                }
            wp_reset_postdata(); // Сбрасываем $post
            ?>
        </ul>
      </div>
      <!-- /.right -->
    </div>
    <!-- /.hero -->
  </div>
  <!-- /.container -->
</main>
<div class="container">
  <ul class="article-list">
    <?php
      global $post;

      $myposts = get_posts([ 
        'numberposts' => 4,
        'offset' => 2,
        'category_name' => 'articles',
      ]);
      // проверяем есть ли посты
      if( $myposts ){
        // если есть, запускаем цикл
        foreach( $myposts as $post ){
          setup_postdata( $post );
          ?>
          <!-- выводим записи -->
          <li class="article-item">
            <a class="article-permalink" href="<?php echo get_the_permalink()?>">
              <h4 class="article-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...') ?></h4>
            </a>
            <img width="65" height="65 "src="<?php if( has_post_thumbnail() ){
              echo get_the_post_thumbnail_url( null, 'homepage-thumb' );
            }
            else {
              echo get_template_directory_uri().'/assets/image/img-default.png';
            } ?>" alt="">
          </li>
          <?php 
            }
        } else {
          ?> <p>Постов нет</p> <?php 
          // Постов не найдено
          }
      wp_reset_postdata(); // Сбрасываем $post
      ?>
  </ul>  
  <!-- article-list -->
  <div class="main-grid">
    <ul class="article-grid">
      <?php		
      global $post;
      // формируем запрос в базу данных
      $query = new WP_Query( [
        // получаем 7 постов
        'posts_per_page' => 7,
        'offset' => 5,
      ] );

      // проверяем, есть ли посты
      if ( $query->have_posts() ) {
        // создаем переменную счетчик постов
        $cnt = 0;
        // пока посты есть, выводим их
        while ( $query->have_posts() ) {
          $query->the_post();
          // увеличиваем счетчик постов
          $cnt++;
          switch ($cnt) {
            // выводим первый пост
            case '1':
              ?> 
                <li class="article-grid-item article-grid-item-1">
                  <a href="<?php echo the_permalink() ?>" class="article-grid-permalink">
                    <span class="category-name"><?php $category = get_the_category(); echo $category [0]->name; ?></span>
                    <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...') ?></h4>
                    <p class="article-grid-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 380, '...') ?></p>
                    <div class="article-grid-info">
                      <div class="author">
                      <?php $author_id = get_the_author_meta('ID'); ?>
                        <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
                        <span class="author-name"><strong><?php the_author() ?>: </strong><?php the_author_meta('description')?></span>
                      </div>
                      <!-- author -->
                      <div class="comments">
                        <svg width="19" height="15" class="icon comments-icon">
                          <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#comment"></use>
                        </svg>
                        <span class="comments-counter"><?php comments_number( '0', '1', '%') ?></span>
                      </div>
                    </div>
                    <!-- article-grid-info -->
                  </a>
                </li>
                <!-- /.article-grid-item -->
              <?php
              break;
            // выводим второй пост
            case '2': ?>
              <li class="article-grid-item article-grid-item-2">
                <img src="<?php 
                //должно находится внутри цикла
                if( has_post_thumbnail() ) {
                  echo get_the_post_thumbnail_url();
                }
                else {
                  echo get_template_directory_uri().'/assets/images/post-default.png';
                }
                ?>" alt="" class="article-grid-thumb">
                <a href="<?php echo the_permalink() ?>" class="article-grid-permalink">
                  <span class="tag">
                    <?php $posttags = get_the_tags();
                    if ( $posttags ) {
                      echo $posttags[0]->name . '';
                    }?>
                  </span>
                  <span class="category-name"><?php $category = get_the_category(); echo $category [0]->name; ?></span>
                  <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 50, '...') ?></h4>
                  <div class="article-grid-info">
                    <div class="author">
                      <?php $author_id = get_the_author_meta('ID'); ?>
                        <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
                        <div class="author-info">
                          <span class="author-name"><strong><?php the_author() ?></strong></span>
                          <span class="date"><?php the_time( 'j F' ); ?></span>
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
                  <!-- article-grid-info -->
                </a>
              </li>
              <!-- /.article-grid-item -->
              <?php 
              break;

              // выводим третий пост
            case '3': ?>
              <li class="article-grid-item article-grid-item-3">
                <a href="<?php echo the_permalink() ?>" class="article-grid-permalink">
                  <img src="<?php 
                  //должно находится внутри цикла
                  if( has_post_thumbnail() ) {
                    echo get_the_post_thumbnail_url();
                  }
                  else {
                    echo get_template_directory_uri().'/assets/images/post-default.png';
                  }
                  ?>" alt="" class="article-thumb">
                  <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 46, '...') ?></h4>
                </a>
              </li>
              <!-- /.article-grid-item -->
              <?php
              break;
              // выводим осталные посты
            default: ?> 
              <li class="article-grid-item article-grid-item-default">
                <a href="<?php echo the_permalink() ?>" class="article-grid-permalink">
                  <h4 class="article-grid-title"><?php echo mb_strimwidth(get_the_title(), 0, 22, '...') ?></h4>
                  <p class="article-grid-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 70, '...') ?></p>
                  <span class="article-date"><?php the_time( 'j F' ); ?></span>
                </a>
              </li>
              <?php
              break;
          }
          ?>
          <!-- Вывода постов, функции цикла: the_title() и т.д. -->
          <?php 
        }
      } else {
        // Постов не найдено
      }

      wp_reset_postdata(); // Сбрасываем $post
      ?>
    </ul>
    <!-- /.article-grid -->
    <!-- подключаем верхний сайдбар -->
    <?php get_sidebar('home-top'); ?>         
  </div>
  <!-- /.main-grid -->        
</div>
<!-- /.container -->

<!-- выводим большой пост -->
<?php		
global $post;

$query = new WP_Query( [
	'posts_per_page' => 1,
  'category_name' => 'investigations',
] );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
		<section class="investigation" style="background: linear-gradient(0deg, rgba(64, 48, 61, 0.35), rgba(64, 48, 61, 0.35)), url(<?php echo get_the_post_thumbnail_url()?>) no-repeat center center; background-size: 100%">
      <div class="container">
        <h2 class="investigation-title"><?php the_title()?></h2>
        <a href="<?php echo get_the_permalink() ?>" class="more">Читать статью</a>
      </div>
      <!-- container -->
    </section>
    <!-- section investigation -->
		<?php 
	}
} else {
	// Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>

<div class="container">
  <div class="favourites">
    <div class="digest-wrapper">
      <ul class="digest">
        <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => 6,
          'offset' => 1,
          'cat' => 'cat=-26',
        ] );

        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            ?>
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
            <?php 
          }
        } else {
          // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post
        ?>
      </ul>
      <!-- /.digest -->
    </div>
    <!-- /.digest-wrapper -->
    <!-- подключаем нижний сайдбар -->
    <?php get_sidebar('home-bottom'); ?>
  </div>
  <!-- /.favourites -->
</div>
<!-- /.container -->
<div class="special">
  <div class="container">
    <div class="special-grid">
      <?php		
      global $post;

      $query = new WP_Query( [
        'posts_per_page' => 1,
        'category_name' => 'photoreport',
      ] );

      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          ?>
          <div class="photo-report">
            <!-- Slider main container -->
            <div class="swiper-container photo-report-slider">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php $images = get_attached_media( 'image' ); 
                  foreach ($images as $image ) {
                    echo '<div class="swiper-slide"><img src="';
                    print_r($image -> guid);
                    echo '"></div>';
                  }
                ?>
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>
            </div>
            <!-- swiper-container -->
            <div class="photo-report-content">
            <?php 
              foreach (get_the_category() as $category) {
                printf(
                  '<a href="%s" class="category-link">%s</a>',
                  esc_url( get_category_link( $category) ),
                  esc_html( $category -> name )
                );
              }
              ?>
              <?php $author_id = get_the_author_meta('ID'); ?>
              <a href="<?php echo get_author_posts_url($author_id) ?>" class="author">
                <img src="<?php echo get_avatar_url($author_id)?>" alt="" class="author-avatar">
                <div class="author-bio">
                  <span class="author-name"><?php the_author() ?></span>
                  <span class="author-rank">Должность</span>
                </div>
                <!-- /.author-bio -->
              </a>
              <!-- author -->
              <h3 class="photo-report-title"><?php the_title() ?></h3>
              <a href="<?php echo get_the_permalink() ?>" class="button photo-report-button">
                <svg width="19" height="15" class="icon photo-report-icon">
                  <use xlink:href="<?php echo get_template_directory_uri()?>/assets/images/sprite.svg#images"></use>
                </svg>
                Смотреть фото
                <span class="photo-report-counter"><?php echo count($images)?></span>
              </a>     
            </div>
            <!-- /.photo-report-content -->
          </div>
          <!-- /.photo-report -->
          <?php 
        }
      } else {
        // Постов не найдено
      }

      wp_reset_postdata(); // Сбрасываем $post
      ?> 
          <ul class="other">
            <?php		
            global $post;
            // формируем запрос в базу данных
            $query = new WP_Query( [
              // получаем 7 постов
              'posts_per_page' => 3,
              'category_name' => 'career',
            ] );

            // проверяем, есть ли посты
            if ( $query->have_posts() ) {
              // создаем переменную счетчик постов
              $cnt = 0;
              // пока посты есть, выводим их
              while ( $query->have_posts() ) {
                $query->the_post();
                // увеличиваем счетчик постов
                $cnt++;
                switch ($cnt) {
                  // выводим первый пост
                  case '1':
                    ?> 
                    <li class="career-post">
                      <?php 
                      foreach (get_the_category() as $category) {
                        printf(
                          '<span class="category-link %s">%s</span>',
                          esc_html( $category -> slug ),
                          esc_html( $category -> name )
                        );
                      }
                      ?>
                      <h3 class="career-post-title"><?php echo mb_strimwidth(get_the_title(), 0, 40, '...') ?></h3>
                      <p class="career-post-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 85, '...') ?></p>
                      <a href="<?php echo get_the_permalink() ?>" class="more">Читать далее</a>
                    </li>
                    <!-- /.career-post -->  
                    <?php
                    break;

                    // выводим осталные посты
                  default: ?> 
                    <li class="other-posts other-posts-default">
                      <a href="<?php echo the_permalink() ?>" class="other-post other-post-default">
                        <h4 class="other-post-title"><?php echo mb_strimwidth(get_the_title(), 0, 18, '...') ?></h4>
                        <p class="other-post-excerpt"><?php echo mb_strimwidth(get_the_excerpt(), 0, 75, '...') ?></p>
                        <span class="other-post-date"><?php the_time( 'j F' ); ?></span>
                      </a>
                    </li>
                    <?php
                    break;
                }
              }
            } else {
              // Постов не найдено
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>
          </ul>
          <!-- /.other -->  
    </div>
    <!-- /.special-grid -->   
  </div>
  <!-- /.container -->
</div>
<!-- /.special -->

<?php get_footer(); ?>