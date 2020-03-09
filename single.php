<?php get_header() ?>
<section id="primary" class="content-area no-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="sticky-top">
                    <?= add_this(); ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="webgaran_breadcrumb">
                    <?= webgaran_breadcrumb(); ?>
                </div>
                <div class="main">
                    <?php get_template_part( 'template-part\content' ) ?>
                </div>
                <div class="">
                    <span>پیشنهاد می کنیم این مقالات را هم بخوانید ...</span>
                    <div class="row"><?= webgaran_see_more(); ?></div>
                </div>
                <div class="webgaran-comments"> 
                <?php if ( comments_open() ) {
                    comments_template();
                } else {
                    echo '<div class="alert alert-warning col-12">!نظردهی برای این مقاله غیر فعال شده است</div>';
                } ?>
                </div>
                <div class="row next-prev">
                    <?= next_prev(); ?>
                </div>
            </div>
            <div class="col-md-2">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>