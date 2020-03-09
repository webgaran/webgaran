<?php get_header() ?>

				
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<section>
    <?php get_template_part( 'template-part/jumbotron' ) ?>
</section>
<section>
    <?php get_template_part( 'template-part/articles' ) ?>
</section>
<section>
    <div style="height: 200px" class=" bg-info">
        
    </div>
</section>
<section id="tabs">
    <?php get_template_part( 'template-part/templates' ) ?>
</section>
</main>
</div>
</div><!-- #primary -->
<?php get_footer() ?>