<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <!-- Nós somos uma rede -->
    <article class="container-fluid bg-preto bg-grafismo pt7 pt10-sm pb5 pb10-sm">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-9">
                    <h1 class="t6 w100 ff2 tcb mb4"><?php md_field('titulo'); ?></h1>
                </div>
            </div>
        </div>
    </article>    

    <!-- Eixos de Atuação -->
    <article class="container-fluid bg-preto pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb2 mb4-sm">Eixos de atuação</h2>
                </div>
            </header>

            <?php 
                $eixos = new WP_Query(array("post_type"=>"eixo"));
                $i = 0;
                if($eixos->have_posts()):
            ?>
            <?php while($eixos->have_posts()): $eixos->the_post(); $i++; ?>
                <section class="row middle-xs pt3 pb3 <?php echo $i%2 ? 'reverse' : ''; ?>">
                    <div class="col-xs-12 col-md-7 z1">
                        <figure class="img-deslocada img-frame <?php echo $i%2 ? 'esquerda' : 'direita'; ?> mb2 mb0-md">
                            <?php 
                                $img = get_field('imagem');
                                $img = $img ? isset($img['sizes']['banner']) ? $img['sizes']['banner'] : $img['url'] :  tu(0).'/assets/images/ph_banner.png';
                            ?>
                            <img src="<?php echo $img; ?>">
                        </figure>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-5 z2">
                        <h3 class="t6 w100 ff2 tcb nowrap mb1 mb3-md"><?php md_field('titulo'); ?></h3>
                        <div class="row">
                            <div class="col-xs-12 col-md-8 <?php echo $i%2 ? '' : 'col-md-offset-4'; ?>">
                                <div class="t3 lh1-50 tccc mb1 mb3-md">
                                    <p><?php md_field('descricao'); ?></p>
                                </div>
                                <button class="btn-txt">Saiba mais</button>
                            </div>
                        </div>
                    </a>
                </section>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </article>

    <?php get_template_part('block-rede'); ?>
    <?php get_template_part('block-apoie'); ?>
</main>
<?php get_footer(); ?>