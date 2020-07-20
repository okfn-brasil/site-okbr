<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <header class="container-fluid bg-preto pt7 pt10-sm pb5">
            <div class="wrap">
                <div class="row center-xs">
                    <div class="col-xs-12 col-md-7 tl">
                        <h1 class="t6 w100 ff2 tcb mb3"><?php md_field('titulo'); ?></h1>
                        <p class="t1 ff2 w400 tcv uc ls1 mb2">Acompanhe nossas redes</p>
                        <ul class="lista-horizontal mb3 mb0-md">
                            <li><a href="https://twitter.com/okfnbr"><button class="rede-social twitter mr1"></button></a></li>
                            <li><a href="https://www.facebook.com/OpenKnowledgeBrasil"><button class="rede-social facebook mr1"></button></a></li>
                            <li><a href="https://github.com/okfn-brasil"><button class="rede-social github mr1"></button></a></li>
                            <li><a href=""><button class="rede-social feed mr1"></button></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-8 col-sm-5">
                        <figure class="img-deslocada esquerda">
                            <img src="<?php tu(); ?>/assets/images/faq.svg">
                        </figure>
                    </div>
                </div>
            </div>
        </header>
        <?php while(have_rows('blocos')): the_row(); ?>
        <section class="container-fluid bg-preto pt5 pb5">
            <div class="wrap">
                <header class="row">
                    <div class="col-xs-12">
                        <h2 class="titulo-secao tcb mb4"><?php md_sub_field('titulo'); ?></h2>
                    </div>
                </header>
                <div class="row">
                    <div class="col-xs-12">
                        <?php while(have_rows('perguntas')): the_row(); ?>
                        <div class="sanfona mb2">
                            <div class="sanfona-titulo">
                                <div class="t4 w600 tcb lh1-50">
                                    <p><?php md_sub_field('pergunta'); ?></p>
                                </div>
                            </div>
                            <div class="sanfona-conteudo">
                                <div class="t3 w400 tccc lh1-50">
                                    <?php md_sub_field('resposta'); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
       
    <?php get_template_part('block-apoie'); ?>

    </main>
<?php get_footer(); ?>