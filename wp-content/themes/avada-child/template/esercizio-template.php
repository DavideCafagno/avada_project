<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => '2',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
);
$my_query = new WP_Query($args);
?>
<style>
    .imgpost {
        width: inherit;
        max-height: 200px;
    }

    .reflect {
        position: absolute;
        width: 315px;
        height: 620px;
        filter: blur(25px);
    }

    .bgimg {
        width: 350px;
        position: relative;
        z-index: 1;
    }

    .hoverimg {
        position: relative;
        z-index: 1;
        background: white;
    }

</style>
<script>
    function like(){
       alert('Like!!!');
    }
</script>
<div id="posts_list" class="row justify-content-center">
    <?php while ($my_query->have_posts()):
        $my_query->the_post();
        ?>

        <div class="bgimg col-3">
            <?php if (get_the_post_thumbnail_url()): ?>
                <img class="reflect rounded " src="<?php echo get_the_post_thumbnail_url(); ?>">

            <?php endif; ?>
            <div style="min-width: 300px;"
                 class="hoverimg  my-4 p-4 mx-2 text-center border border-5 border-secondary rounded hadow-lg">

                <div class="card-header mb-4" style="height: 300px;">
                    <div class="card-title display-3 rounded "><?php echo get_the_title(); ?></div>
                    <?php if (get_the_post_thumbnail_url()): ?>
                        <img class="imgpost rounded" src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <?php else: ?>
                        <p class="my-5"><?php echo get_the_content(); ?></p>
                    <?php endif; ?>

                </div>
                <br>
                <div class="card-body my-2" style="height:60px; max-height: 60px;">
                    <p class="my-5"><?php echo get_the_excerpt(); ?></p>
                </div>
                <div class="btn-group  border mt-4">
                    <a href="<?php echo get_permalink()?>"  class="btn btn-lg btn-outline-primary">VIEW</a>
                    <button class="btn btn-lg btn-outline-secondary" onclick="like()">LIKE</button>
                    <?php if(current_user_can('edit_posts')) :?><a href="<?php echo get_edit_post_link()?>" class="btn btn-lg btn-outline-danger">EDIT</a><?php endif;?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php
    $prev = get_previous_posts_link('<< Prev');
    $next = get_next_posts_link('Next >>', $my_query->max_num_pages);

    if ($prev || $next): ?>
        <div class="row justify-content-sm-center justify-content-md-end  mt-5">
            <div style="max-width: fit-content;" class="shadow-sm col btn-group border border-1 border-secondary">


                <?php if ($prev) echo '<button class="btn fw-bold px-4">' . $prev . ' </button>' ?>

                <?php if ($next) echo '<button class="btn fw-bold px-4">' . $next . ' </button>' ?>
            </div>
        </div>
    <?php endif; ?>
</div>
