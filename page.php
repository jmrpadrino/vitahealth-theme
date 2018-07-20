<?php get_header(); ?>
<?php the_post(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section class="page-container col-12 page-content <?php echo join(' ', get_post_class()); ?>" >
            <?php the_content(); ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>
