<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => '2',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
);
$my_query = new WP_Query($args);
?>
<div class="row justify-content-center">
    <?php while ($my_query->have_posts()):
        $my_query->the_post();
        ?>
        <div class="col-3 container-sm my-4 p-4 mx-2 text-center border border-5 border-secondary rounded hadow-lg">
            <div class="card-header mb-5">
                <div class="card-title display-3" style="height: 120px;"><?php the_title(); ?></div>
            </div>
            <div class="card-body" style="height: 200px; ">
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="btn-group  border mt-5">
                <button class="btn btn-lg btn-outline-primary">UNO</button>
                <button class="btn btn-lg btn-outline-secondary">DUE</button>
                <button class="btn btn-lg btn-outline-danger">TRE</button>
            </div>
        </div>
    <?php endwhile; ?>
    <div class="row justify-content-end text-end">
        <div class="shadow-sm col-6 btn-group border border-1 border-secondary">
            <?php
            $prev = get_previous_posts_link('<< Prev');
            $post = get_next_posts_link('Next >>', $my_query->max_num_pages);
            ?>

                <?php if($prev) echo '<button class="btn fw-bold ">'. $prev.' </button>'?>

                <?php if($post) echo '<button class="btn fw-bold ">'. $post.' </button>'?>
        </div>
    </div>
</div>