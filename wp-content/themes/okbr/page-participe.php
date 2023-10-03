<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <article class="container-fluid hero pt7 pt10-sm pb5">
            <div class="wrap">
                <div class="row center-xs">
                    <div class="col-xs-12 col-md-7 tl">
                        <h1 class="t6 w100 ff2  mb2"><?php md_field('titulo'); ?></h1>
                        <div class="conteudo  mb5">
                            <?php echo md_text(get_field('descricao',get_the_ID(),false)); ?>
                        </div>
                        <p class="t1 ff2 w400 tcv uc ls1 mb2">Acompanhe nossas redes</p>
                        <ul class="lista-horizontal mb3 mb0-md">
                            <li><a href="https://twitter.com/okfnbr"><button class="rede-social twitter mr1"></button></a></li>
                            <li><a href="https://www.facebook.com/OpenKnowledgeBrasil"><button class="rede-social facebook mr1"></button></a></li>
                            <li><a href="https://github.com/okfn-brasil"><button class="rede-social github mr1"></button></a></li>
                            <li><a href=""><button class="rede-social feed mr1"></button></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-8 col-md-5">
                        <figure class="img-deslocada esquerda">
                            <img src="<?php tu(); ?>/assets/images/participe.svg">
                        </figure>
                    </div>
                </div>
            </div>
        </article>

        <article class="container-fluid bg-roxo pt5 pb5">
            <div class="wrap">
                <div class="row">
                    <?php while(have_rows('blocos')): the_row(); ?>
                    <div class="col-xs-12 col-md-6 mb3 mb5-md">
                        <h2 class="t3 tcb w600  lh1-50 mb1"><?php echo md_sub_field('titulo'); ?></h2>
                        <div class="t2 tcb  lh1-50 w400 mb2">
                            <?php echo md_sub_field('descricao'); ?>
                        </div>
                        <a href="<?php the_sub_field('link'); ?>"><button class="btn btn-verde mb2"><?php the_sub_field('label'); ?></button></a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>                    
        </article>

        <?php get_template_part('block-prestacao'); ?>
    </main>
<?php get_footer(); ?>