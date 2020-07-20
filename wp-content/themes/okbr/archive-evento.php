<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <article class="container-fluid bg-preto pt7 pt10-sm pb5">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="t6 w600 ff2 tcv mb3">Eventos</h1>
                </div>
            </div>
        </div>
    </article>

    <article class="container-fluid bg-preto pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb5">Todos eventos</h2>
                </div>
            </header>

            <!-- Mídias -->
            <section class="row center-xs mb3">
                <?php 
                    while(have_posts()): the_post();
                ?>
                <!-- Clipping -->
                <article class="col-xs-12 col-sm-10 col-md-8 mb2 mb1-md">
                    <a href="<?php echo ($url = get_field('url')) ? $url : get_the_permalink(); ?>" <?php if($url) echo 'target="_blank"' ?> class="cartao cartao-horizontal middle-xs">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumbhor']) ? $img['sizes']['thumbhor'] : $img['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class="tcb p2 tl">
                            <div class="t1 ff2 uc w100 mb05">
                                <p><?php the_field('data'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
            <?php 
                $ppp = get_option( 'posts_per_page' );
                $ptal = get_post_type_archive_link(get_post_type());
                $pg = get_query_var('paged');
                $pg = $pg ? $pg : 1;
                $c = wp_count_posts(get_post_type());
                $c = $c->publish;
                $max = ceil($c/$ppp);
                if($c > $ppp):
            ?>
            <section class="row center-xs">
                <div class="col-xs-12 col-sm-10 col-md-8">
                    <ul class="lista-horizontal">
                        <?php if($pg > 1): ?><li><a href="<?php echo $ptal.'?paged='.($pg-1); ?>"><button class="btn-txt invertido mr2-sm p05">Voltar</button></a></li><?php endif; ?>
                        <?php if($pg-3 > 1): ?>
                            <li><a href="<?php echo $ptal.'?paged='.(1); ?>"><button class="btn-txt semSeta p05 <?php if(1 == $pg) echo 'ativo'; ?>">Primeira</button></a></li>
                            <li><span class="p05 tcb">...</span></li>
                        <?php endif; ?>
                        <?php for ($i = max(1,$pg-3); $i <= min($max,$pg+3); $i++): ?>
                        <li><a href="<?php echo $ptal.'?paged='.($i); ?>"><button class="btn-txt semSeta p05 <?php if($i == $pg) echo 'ativo'; ?>"><?php echo $i; ?></button></a></li>
                        <?php endfor; ?>
                        <?php if($pg+3 < $max): ?>
                            <li><span class="p05 tcb">...</span></li>
                            <li><a href="<?php echo $ptal.'?paged='.($max); ?>"><button class="btn-txt semSeta p05 <?php if($max == $pg) echo 'ativo'; ?>">Última</button></a></li>
                        <?php endif; ?>
                        <?php if($pg < $max): ?><li><a href="<?php echo $ptal.'?paged='.($pg+1); ?>"><button class="btn-txt ml2-sm p05">Proxima</button></a></li><?php endif; ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>
        </div>
    </article>
</main>
<?php get_footer(); ?>