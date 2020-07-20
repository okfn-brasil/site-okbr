<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <!-- Apoie a OKBR -->
            <article class="container-fluid bg-preto pt7 pt10-sm pb5">
                <div class="wrap">
                    <div class="row center-xs">
                        <div class="col-xs-12 col-md-6 tl">
                            <h1 class="t6 w100 ff2 tcb mb2"><?php md_field('titulo'); ?></h1>
                            <div class="conteudo tcb mb3 mb0-md">
                                <?php echo md_text(get_field('descricao')); ?>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-5 col-sm-offset-1">
                            <figure class="img-deslocada esquerda">
                                <img src="<?php tu(); ?>/assets/images/apoie.svg">
                            </figure>
                        </div>
                    </div>
                </div>
            </article>

        <!-- Apoie a OKBR -->
            <article class="container-fluid bg-cinza-escuro bg-grafismo-verde pt7 pt10-sm pb5">
                <div class="wrap">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <h2 class="t6 w600 ff2 tcv mb2">Doação</h2>
                            <div class="conteudo tcb mb5">
                                <?php echo md_text(get_field('doacao')); ?>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php while(have_rows('doacoes')): the_row(); ?>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <p class="t4 tcb w600 ff2"><?php echo md_sub_field('titulo'); ?></p>
                            <a href="<?php the_sub_field('link') ?>" target="_blank"><button class="btn btn-verde mb2">Doe!</button></a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <section class="mt5">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="titulo-secao mb4 tcb">Transferência bancária</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="conteudo tcb mb5">
                                        <?php echo md_text(get_field('transferencia')); ?>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
            </article>

        <?php get_template_part('block-prestacao'); ?>
    </main>
<?php get_footer(); ?>