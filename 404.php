<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <!-- Header -->
    <header class="container-fluid pt3 pt7-sm pb3 pb5-sm">
        <div class="row bottom-xs middle-sm">
            <div class="col-xs">
                <div class="wrap pb5 pt3">
                    <div class="row">
                        <article class=" col-xs-12">
                            <div class="p05">
                                <div class="row middle-xs">
                                    <div class="col-xs-12 col-md-7">
                                        <p class="t6 w100 ff2 tcb mb1">Erro 404!</p>
                                        <p class="t4 w100 ff2 tcb mb2">Desculpe, não encontramos essa página.</p>
                                        <a href="<?php echo home_url(); ?>"><button class="btn-txt">Voltar para a home</button></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php get_template_part('block-apoie'); ?>
</main>
<?php get_footer(); ?>