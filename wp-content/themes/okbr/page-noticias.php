<?php 
$pg = get_query_var('paged');
$pg = $pg ? $pg : 1;
$ppp = get_option( 'posts_per_page' );
$ptal = get_post_type_archive_link('noticia');
get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <!-- Notícia destaque -->
    <article class="container-fluid bg-preto pt7 pt10-sm pb5">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="t6 w600 ff2 tcv mb3">Notícias</h1>
                </div>
            </div>
            <?php 
                if($pg <= 1):
                $destaque = get_field('destaque');
                if($destaque):
            ?>
            <section class="header-carrossel">
                <?php 
                    foreach( $destaque as $post):
                    setup_postdata($post);
                ?>
                <div class="p05">
                    <a href="<?php the_permalink(); ?>" class="row middle-xs">
                        <div class="col-xs-12 col-md-5 mb3 mb0-md">
                            <?php 
                                $img = get_field('imagem');
                                $img = $img ? isset($img['sizes']['meio']) ? $img['sizes']['meio'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                            ?>
                            <figure><img src="<?php echo $img; ?>"></figure>
                        </div>
                        <div class="col-xs-12 col-md-7"><div class="t6 w100 ff2 tcb mb2 mb0-md"><p><?php the_title(); ?></p></div></div>
                        <div class="col-xs-12 col-md-6"><button class="btn-txt">Leia mais</button></div>
                    </a>
                </div>
                <?php endforeach; ?>
            </section>
            <?php endif; wp_reset_postdata(); endif; ?>
        </div>
    </article>

    <!-- Notícia -->
    <article class="container-fluid bg-preto pt3 pb3">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb5">Notícias</h2>
                </div>
            </header>

            <!-- Notícias -->
            <?php $noticias = new WP_Query(array("post_type"=>"noticia","posts_per_page"=>$ppp,"paged"=>$pg)); ?>
            <section class="row center-xs mb3">
                <?php while($noticias->have_posts()): $noticias->the_post(); ?>
                <!-- Notícia -->
                <article class="col-xs-12 col-sm-10 col-md-8 mb2 mb1-md">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-horizontal middle-xs">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumbhor']) ? $img['sizes']['thumbhor'] : $img['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class=" tcb p2 tl">
                            <div class="t1 ff2 uc w100 mb05">
                                <p><?php the_date('d M \d\e Y'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; ?>
            </section>
            <?php 
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
            <?php wp_reset_postdata(); ?>
        </div>
    </article>

    <?php if($pg <= 1): ?>
    <!-- Rede de eventos -->
    <article class="container-fluid bg-preto pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb5">Rede de eventos</h2>
                </div>
            </header>

            <?php 
                $eventos = new WP_Query(array("post_type"=>"evento","posts_per_page"=>-1,'meta_query'=>array(array('key'=>'data','compare'=>'>=','value'=>date('Ymd')))));
                $eventosp = new WP_Query(array("post_type"=>"evento","posts_per_page"=>-1,'meta_query'=>array(array('key'=>'data','compare'=>'<','value'=>date('Ymd')))));
            ?>
            <!-- Filtro dos eventos -->
            <section class="row start-xs">
                <div class="col-xs-12">
                    <ul class="mb0 lista-horizontal tcb mb4">
                        <?php if($eventos->have_posts()): ?><li class="mr1"><button class="btn-filtro" data-filtro="proximos-eventos">Próximos eventos</button></li><?php endif; ?>
                        <?php if($eventosp->have_posts()): ?><li class="mr1"><button class="btn-filtro" data-filtro="passados-eventos">Eventos passados</button></li><?php endif; ?>
                    </ul>   
                </div>
            </section>

            <?php if($eventos->have_posts()): ?>
            <!-- Próximos eventos -->
            <section class="row mb3 eventos-carrossel carrossel" data-categoria="proximos-eventos">
                <?php 
                    while($eventos->have_posts()): $eventos->the_post();
                ?>
                <!-- Notícia -->
                <article class="col-xs-12">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-vertical">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class="tcb p2">
                            <div class="t1 ff2 uc w100 mb05">
                                <p><?php the_field('data'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
            <?php endif; ?>

            <?php if($eventosp->have_posts()): ?>
            <!-- Eventos passados -->
            <section class="row mb3 eventos-carrossel carrossel" data-categoria="passados-eventos">
                <?php 
                    while($eventosp->have_posts()): $eventosp->the_post();
                ?>
                <!-- Notícia -->
                <article class="col-xs-12">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-vertical">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class="tcb p2">
                            <div class="t1 ff2 uc w100 mb05">
                                <p><?php the_field('data'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
            <?php endif; ?>

            <section class="row center-xs">
                <div class="col-xs-12 col-sm-10 col-md-8">
                    <a href="<?php echo home_url("eventos"); ?>">
                        <button class="btn-txt">Histórico</button>
                    </a>
                </div>
            </section>
        </div>
    </article>

    <!-- Na mídia -->
    <article class="container-fluid bg-cinza-escuro pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb5">Na mídia</h2>
                </div>
            </header>

            <!-- Mídias -->
            <section class="row center-xs mb3">
                <?php 
                    $noticias = new WP_Query(array("post_type"=>"clipping","posts_per_page"=>3));
                    while($noticias->have_posts()): $noticias->the_post();
                ?>
                <!-- Clipping -->
                <article class="col-xs-12 col-sm-10 col-md-8 mb2 mb1-md">
                    <a href="<?php echo ($url = get_field('url')) ? $url : get_the_permalink(); ?>" <?php if($url) echo 'target="_blank"' ?> class="cartao cartao-horizontal middle-xs">
                        <?php 
                            $img = get_field('imagem');
                            //echo print_r($img);
                            //$img = $img ? isset($img['sizes']['thumbhor']) ? $img['sizes']['thumbhor'] : $img['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class="tcb p2 tl">
                            <div class="t1 ff2 uc w100 mb05">
                                <p><?php the_field('midia'); ?> - <?php the_field('data'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Ir para o site</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>

            <section class="row center-xs">
                <div class="col-xs-12 col-sm-10 col-md-8">
                    <a href="<?php echo home_url("clipping"); ?>">
                        <button class="btn-txt">Veja todos</button>
                    </a>
                </div>
            </section>
        </div>
    </article>
    <?php endif; ?>
</main>
<?php get_footer(); ?>