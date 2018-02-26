<?php
/**
 * Created by PhpStorm.
 * User: Danila
 * Date: 2/24/2018
 * Time: 6:48 PM
 */

if ( isset(get_the_category()[0]->name) ) {
    $cats = get_the_category()[0]->name . ' ';
    $cats_desc = get_the_category()[0]->description;
    $author = get_post_meta($post->ID, 'author', true);
}

?>

<?php get_header(); ?>

<div class="jumbotron hero-single">
    <nav class="navbar navbar-inverse navbar-brand-white navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand-white navbar-brand" href="/"><i class="glyphicon glyphicon-home"></i><?php bloginfo('name'); ?></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <? wp_nav_menu(array('menu' => 'Top Menu', 'menu_class' => 'nav navbar-nav navbar-right')); ?>
            </div>
        </div>
    </nav>
        <div class="social-top">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
        </div>
    <div class="container">
        <div class="row">
            <div>
                <p><?php echo $cats; ?></p>
                <h1><?php echo $cats_desc; ?></h1>
                <?php if ($author) : ?><p>AUTHOR<br/><?php echo $author; ?></p><?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if (get_the_category()[0]->term_id == 6) : ?>
    <div class="podcast">

    </div>
<?php endif; ?>

<div class="container article">
    <?php if ( have_posts() ) : the_post(); ?>
    <article>
        <small><?php the_date(); ?></small>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </article>
    <?php endif; wp_reset_query(); ?>

    <?php $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args=array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=>5
        );
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) {?>
            <div class="related"><h3>RELATED</h3>
            <?php while( $my_query->have_posts() ) {
                $my_query->the_post(); ?>
                 <h4>
                     <a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                 </h4>
            <?php }?>
            </div>
        <?php }
    }
    $post = $orig_post;
    wp_reset_query();

    ?>

</div>

<div class="row">
    <?php if (get_previous_post_link('%link') && get_next_post_link('%link')) : ?>
        <div class="col-sm-6 col-xs-12" id="left-nav">
            <p>PREVIOUS</p>
            <?php echo get_previous_post_link('%link'); ?>
        </div>
        <div class="col-sm-6 col-xs-12" id="right-nav">
            <p>NEXT</p>
            <?php echo get_next_post_link('%link'); ?>
        </div>
    <?php elseif (get_previous_post_link('%link')) : ?>
        <div class="col-sm-12" id="left-nav">
            <p>PREVIOUS</p>
            <?php echo get_previous_post_link('%link'); ?>
        </div>
    <?php elseif (get_next_post_link('%link')) : ?>
        <div class="col-sm-12" id="right-nav">
            <p>NEXT</p>
            <?php echo get_next_post_link('%link'); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
