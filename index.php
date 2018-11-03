<?php
get_header();

$section_id = 138;
get_template_part("section-templates/banner");
        
?>

<div class="main-wrap" id="section-home">
    <div <?php post_class( 'single-post' ) ?>>
        <div class="container">
            <div class="row post-body">
                <div class="col-md-12">
                    <!-- section start-->
                    <section class="section-gap">
                        <div id="posts-container">
                               <?php
                                  while(have_posts()):
                                    the_post();
                               ?>
                                <div <?php post_class() ?>>
                                    <h2>
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </h2>
                                    <div class="post-content">
                                        <?php the_excerpt();?>
                                    </div>
                                </div>

                              <?php endwhile; ?>
                             
                        </div>
                    </section>
                    <!-- section end-->
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-md-5 mt-3" id="loadmore_container">
                        <a href="<?php next_posts(get_max_page());?>"
                           id="loadmore"
                           class="btn btn-danger">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   

    
<?php
get_footer();
?>