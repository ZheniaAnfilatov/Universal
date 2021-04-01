<?php
/*
Template Name: Страница контакты
Template Post Type: page
*/

get_header();
?>
<section class="section-dark">
  <div class="container">
    <?php the_title('<h1 class="page-title">', '</h1>', true); ?>
    <div class="contacts-wrapper">
      <div class="left">
        <p class="page-subtitle">Через форму обратной связи</p>
        <form action="#" class="contacts-form" method="POST">
          <input name="contact_name" type="text" class="input contacts-input" placeholder="Ваше имя">
          <input name="contact_email" type="email" class="input contacts-input" placeholder="Ваш Email">
          <textarea name="contact_comment" id="" class="contacts-textarea" placeholder="Ваш вопрос"></textarea>
          <button type="submit" class="button more">Отправить</button>
        </form>
        <?php echo do_shortcode( '[contact-form-7 id="415" title="Контактная форма"]' ) ?>
        <!-- /.contacts-form -->
      </div>
      <!-- /.left -->
      <div class="right">
      <p class="page-subtitle">Или по этим контактам</p>
        <a href="mailto: <?php the_field('email', get_the_ID()); ?>" class="rigth-link"><?php the_field('email', get_the_ID()); ?></a>
        <address class="rigth-link"><?php the_field('address', get_the_ID()); ?></address>
        <a href="tel: <?php the_field('phone', get_the_ID()); ?>" class="rigth-link"><?php the_field('phone', get_the_ID()); ?></a>
      </div>
      <!-- /.right -->
    </div>
    <!-- /.contacts-wrapper -->
  </div>
  <!-- /.container -->
</section>
<!-- /.section-dark -->
<?php
get_footer();
