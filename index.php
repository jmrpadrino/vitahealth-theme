<?php get_header(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <section class="blog-container col-12">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-12 month-sidebar">
                        <h1><?php _e('Blog', 'vitahealth'); ?></h1>
                        <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>
                        <?php $now = new \DateTime('now'); $month = $now->format('m'); ?>
                        <ul class="month-container">
                            <?php for ($m=0; $m<=12; $m++) { ?>
                            <li>
                                <?php if ($month == ($m+1)) { $class = 'active'; } else { $class = ''; } ?>
                                <a id="month-<?php echo ($m+1); ?>" onclick="change_month(<?php echo $m + 1; ?>)" class="<?php echo $class; ?>">
                                    <?php echo $meses[$m]; ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>

                    </div>
                    <div class="col-12 col-xl-7 col-lg-7 col-md-8">
                        <?php if (have_posts()): ?>
                        <div class="posts-container-slider owl-carousel owl-theme">
                            <?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" class="item archive-item <?php echo join(' ', get_post_class()); ?>" role="article">
                                <div class="archive-item-container" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
                                    <a onclick="post_show(<?php the_ID(); ?>)" title="<?php the_title(); ?>">
                                        <h2 rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
                                    </a>
                                </div>
                            </article>
                            <?php endwhile; ?>
                        </div>
                        <div class="post-ajax-container"></div>
                        <?php else: ?>
                        <article>
                            <h2><?php _e('Disculpe, su busqueda no arrojo ningun resultado', 'vitahealth'); ?></h2>
                            <h3><?php _e('Dirígete nuevamente al', 'vitahealth'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'vitahealth'); ?>"><?php _e('inicio', 'vitahealth'); ?></a>.</h3>
                        </article>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>
