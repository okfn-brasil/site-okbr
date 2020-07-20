<?php 
    $menuitems = array();
    $activeIDs = array();
    foreach (wp_get_nav_menu_items('2') as $m) {
        if(!isset($menuitems[$m->menu_item_parent])) $menuitems[$m->menu_item_parent] = array();
        array_push($menuitems[$m->menu_item_parent], $m);
        $i = $m->menu_item_parent!=0 ? $m->menu_item_parent : $m->ID;
        $activeIDs[$m->object_id] = $i;
    }
?>
<header class="barra-topo ativo">
    <nav class="container-fluid pt05 pb05">
        <div class="wrap">
            <div class="row middle-xs">
                <div class="col-xs-9 col-sm-10 col-md-4">
                    <a href="<?php echo home_url(); ?>" class="inline-block <?php if(is_front_page()) echo 'ativo'; ?>">
                        <img src="<?php tu(); ?>/assets/images/logo.svg" alt="">
                    </a>
                </div>
                <div class="col-xs-3 col-sm-2 col-md-8 tr">
                    <div class="invisible-md">
                        <a class="btn-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <ul class="lista-horizontal-md centro-vertical pl1 pr1 pl0-md pr0-md">
                        <?php foreach ($menuitems[0] as $m): ?>
                        <li class="t1 uc w500 tcb mt2 mb2 mt0-md mb0-md ml05 mr05 link <?php if( isset($activeIDs[get_the_ID()]) && $activeIDs[get_the_ID()] == $m->ID ) echo 'ativo'; ?>"><a href="<?php echo $m->url; ?>"><?php echo $m->title; ?></a>
                            <?php if(isset($menuitems[$m->ID])): ?>
                            <span class="drop-sub-menu"></span>
                            <ul class="sub-menu">
                                <?php foreach ($menuitems[$m->ID] as $mm): ?>
                                <li class="t1 uc w500 tcb link"><a href="<?php echo $mm->url; ?>"><?php echo $mm->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                        <li class="t1 uc w500 tcb mt2 mb2 mt0-md mb0-md ml05 mr05 link">
                            <a class="toggleBusca">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" height="20px" width="20px">
                                    <g transform="matrix(-0.932065 0 0 0.932065 494.609 17.3913)">
                                        <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" data-original="#000000" class="active-path" style="fill:#F6F5F5" data-old_color="#F0F0F0"></path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <form class="container-fluid bg-preto pt05 pb05" action="<?php echo home_url(); ?>">
        <div class="wrap">
            <div class="row middle-xs between-xs">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a href="<?php echo home_url("sobre"); ?>">
                        <img src="<?php tu(); ?>/assets/images/logo.svg" alt="">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6 mt2 mb2 mt0-sm mb0-sm">
                    <div class="flex middle-xs">
                        <a class="t1 uc w300 tcb ml05 mr1 link shrink" href="<?php echo home_url("faq"); ?>">FAQ</a>
                        <input class="ml05 mr05 buscar campo-linha" type="text" name="s" placeholder="Buscar">
                        <button class="ml05 mr05 toggleBusca btn-fechar shrink" type="button"></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</header>