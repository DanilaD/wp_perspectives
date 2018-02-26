<?php
/**
 * Created by PhpStorm.
 * User: Danila
 * Date: 2/24/2018
 * Time: 3:36 PM
 */
?>

<?php get_header(); ?>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="/"><i class="glyphicon glyphicon-home"></i><?php bloginfo('name'); ?></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <? wp_nav_menu(array('menu' => 'Top Menu', 'menu_class' => 'nav navbar-nav navbar-right')); ?>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <h1 class="text-left">Perspectives </h1>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 visible-sm-inline visible-md-inline visible-lg-inline"><span class="text-muted visible-xs-block visible-sm-block visible-md-block visible-lg-block">Filter</span></div>
            <div>
                <ul class="nav nav-pills">
                    <li class="active"><a href="#">All </a></li>
                    <li><a href="#">Articles </a></li>
                    <li><a href="#">Podcasts </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div></div>
    </div>
</div>

<div class="jumbotron hero">
    <?php
    if ( have_posts() ) :
        the_post();
        ?>
        <div class="container">
            <div class="row">
                <a href="<?php the_permalink(); ?>">
                    <div class="col-lg-6 col-md-7 col-sm-8 get-it">
                        <p class="text-uppercase text-left" id="category"><?php
                            $cat = '';
                            foreach( get_the_category() as $category) {
                                $cat .= $category->name;
                            }
                            echo trim($cat, ', ');
                            ?>
                        </p>
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt('new_excerpt_length', 50); ?>
                    </div>
                </a>
            </div>
        </div>
        <?php
    endif;
    wp_reset_query();
    ?>
</div>
<section class="container testimonials">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
    <a href="<?php the_permalink(); ?>">
        <div id="st">
            <?php echo get_the_post_thumbnail( get_the_id(), 'medium'); ?>
            <div class="col-md-12">
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt('new_excerpt_length', 50); ?>
            </div>
        </div>
    </a>
<?php endwhile; else : echo wpautop( 'Sorry, no posts were found' ); endif; ?>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-uppercase text-center"><a href="#">load more</a></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
