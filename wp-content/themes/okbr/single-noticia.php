<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <!-- Header -->
        <header class="container-fluid bg-roxo pt7 pt10-sm pb5">
            <div class="wrap">
                <div class="row mb2">
                    <div class="col-xs-12 center-xs">
                        <h2 class="t3 w600 ff3 uc tcv mb2"><?php if($eixos = get_field('eixos')) echo implode(", ", array_map(function($a){return '<a href="'.get_the_permalink($a).'">'.get_the_title($a).'</a>';}, $eixos)); ?></h2>
                        <h1 class="t6 w100 ff2 tcb mb2"><?php the_title(); ?></h1>
                        <p class="t3 w100 ff2 uc tcv"><?php echo get_the_date('d M \d\e Y'); ?>, por <?php if($cols = get_field('colaboradores')){ echo implode(", ", array_map(function($a){return '<a class="w600" data-modal="col_'.$a.'">'.get_the_title($a).'</a>';}, $cols)); }else{echo 'OKBR';} ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="flex flex-column flex-row-md tc tl-md">
                            <p class="t1 w400 ff2 tcb ls1 uc inline-block mb2 mb0-md mr0 mr2-md">Compartilhar</p>
                            <ul class="lista-horizontal m0">
                                <li class="mr05 ml05"><a href="http://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_the_permalink());?>"><button class="rede-social rede-social-branco twitter"></button></a></li>
                                <li class="mr05 ml05"><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>"><button class="rede-social rede-social-branco facebook"></button></a></li>
                                <li class="mr05 ml05"><a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&amp;body=<?php echo urlencode(get_the_title()); ?>: <?php echo urlencode(get_the_permalink());?>"><button class="rede-social rede-social-branco mail"></button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- conteúdo -->
        <article class="container-fluid bg-branco pt5 pb3">
            <div class="wrap">
                <section class="conteudo">
                    <?php get_template_part('block-conteudo'); ?>
                </section>
            </div>
        </article>

        <?php
            
            $qs = array();
            if($tags = get_the_tags()){
                $qs = array_map(function($a){return $a->term_id; }, $tags);
            }
            $mesmatag = new WP_Query(array("post_type"=>"noticia","posts_per_page"=>3,'tag__in' => $qs,'post__not_in'=>array(get_the_ID()), 'orderby'=>'date'));

            $qs = array();
            if(sizeof($mesmatag->posts) < 3 && ($eixos = get_field('eixos'))){
                $qs = array_map(function($a){return array('key'=>'eixos','value'=>'"'.$a.'"','compare' => 'LIKE');}, $eixos);
                $mesmoeixo = new WP_Query(array("post_type"=>"noticia","posts_per_page"=>3-sizeof($mesmatag->posts),'meta_query' => $qs,'post__not_in'=>array(get_the_ID())));
            }

            $noticias = new WP_Query();
            $noticias->posts = isset($mesmoeixo)&&$mesmoeixo ? array_merge( $mesmatag->posts, $mesmoeixo->posts ) : $mesmatag->posts;
            $noticias->post_count = count($noticias->posts);
            if($noticias->have_posts()):
        ?>
        <!-- Notícias relacionadas -->
        <article class="container-fluid  pt5 pb5">
            <div class="wrap">
                <header class="row">
                    <div class="col-xs-12">
                        <h2 class="titulo-secao  mb4">Notícias relacionadas</h2>
                    </div>
                </header>
                <!-- Notícias -->
                <div class="row center-xs">
                    <?php
                        $noticias_relacionadas = get_field('noticias_relacionadas');
                        if($noticias_relacionadas ): 
                    ?>
                        <?php foreach( $noticias_relacionadas as $post ): 
                            setup_postdata($post); ?>
                            <article class="col-xs-12 col-sm-10 col-md-8 mb1">  
                            <a href="<?php the_permalink(); ?>" class="cartao cartao-horizontal middle-xs">
                                <?php
                                    $img_ = get_field( 'imagem', $noticias_relacionadas->ID );
                                    $img = $img_ ? isset($img_['sizes']['thumbhor']) ? $img_['sizes']['thumbhor'] : $img_['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
                                ?>
                                <figure><img src="<?php echo $img; ?>"></figure>
                                <section class="p2 tl">
                                    <div class="t1 ff2 uc w100 mb05">
                                        <p><?php the_date('d M Y'); ?></p>
                                    </div>
                                    <div class="t3 ff2 lh1-50 w600">
                                        <p><?php the_title(); ?></p>
                                    </div>
                                    <button class="btn-txt btn-cartao">Leia Mais</button>
                                </section>
                            </a>       
                        </article>
                        <?php endforeach; ?>
                        <?php 
                        wp_reset_postdata(); ?>
                    <?php else: ?>
                        <?php 
                            while($noticias->have_posts()): $noticias->the_post(); 
                        ?>
                        <!-- Notícia -->
                        <article class="col-xs-12 col-sm-10 col-md-8 mb1">
                            <a href="<?php the_permalink(); ?>" class="cartao cartao-horizontal middle-xs">
                                <?php 
                                    $img = get_field('imagem');
                                    $img = $img ? isset($img['sizes']['thumbhor']) ? $img['sizes']['thumbhor'] : $img['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
                                ?>
                                <figure><img src="<?php echo $img; ?>"></figure>
                                <section class=" tcb p2 tl">
                                    <div class="t1 ff2 uc w100 mb05">
                                        <p><?php the_date('d M Y'); ?></p>
                                    </div>
                                    <div class="t3 ff2 lh1-50 w600">
                                        <p><?php the_title(); ?></p>
                                    </div>
                                    <button class="btn-txt btn-cartao">Leia Mais</button>
                                </section>
                            </a>
                        </article>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="row mt3">
                    <div class="col-xs-12 tc">
                        <a href="<?php echo home_url("noticias"); ?>">
                            <button class="btn btn-preto">Veja todas as notícias</button>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        <?php endif; wp_reset_postdata();?>
       
        <?php if($cols): foreach($cols as $post): setup_postdata($post); ?>
                <?php get_template_part('modal-colaborador'); ?>
        <?php endforeach; endif; wp_reset_postdata(); ?>

    </main>
<?php get_footer(); ?>