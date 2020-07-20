<?php 
    $todasRedes = new WP_Query(array("post_type"=>"rede", "posts_per_page"=>-1)); 
    if($todasRedes->have_posts()):
?>
<!-- Rede -->
<article class="container-fluid bg-cinza-escuro pt5 pb5">
    <div class="wrap">
        <header class="row">
            <div class="col-xs-12">
                <h2 class="titulo-secao tcb mb4">Rede</h2>
            </div>
        </header>
        <!-- Notícias -->
        <div class="row center-xs">
            <?php while($todasRedes->have_posts()): $todasRedes->the_post(); ?>
            <article class="col-xs-12 col-md-6 mt2 mt0-sm">
                <a <?php echo get_field('link') ? 'href="'.get_field('link').'"' : ''; ?> target="_blank" class="cartao cartao-horizontal middle-xs mb1 mr0 mr1-md">
                    <?php 
                        $img = get_field('imagem');
                        if($img){
                            $img = isset($img['sizes']['vertical']) ? $img['sizes']['vertical'] : $img['url'];
                        }else{
                            $img = tu(0).'/assets/images/ph_vertical.png';
                        }
                    ?>
                    <figure><img src="<?php echo $img; ?>"></figure>
                    <section class="lh1-50 tcb p2 p1-sm tl">
                        <h3 class="t4 ff2 w600 mb1"><?php the_title(); ?></h3>
                        <p class="t3"><?php the_field('texto'); ?></p>
                    </section>
                </a>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</article>
<?php endif; ?>