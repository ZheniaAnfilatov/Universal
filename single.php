<?php get_header('post'); ?>
  <main class="site-main">
    <?php
    // запускаем цикл Wrodpress, проверяем есть ли посты
		while ( have_posts() ) :
      // если пост есть, выводим его содержимое
			the_post();

      // находим шаблон для вывода поста в папке template_parts
			get_template_part( 'template-parts/content', get_post_type() );

			// если комментарии к записи открыты, выводим их
			if ( comments_open() || get_comments_number() ) :
        // находим файл comment.php и выводим его
				comments_template();
			endif;

		endwhile; // Конец цикла Wordpress
		?>
  </main>
<?php get_footer(); ?>