    <!-- Footer -->
    <footer class="container-fluid bg-cinza-claro pt5 pb4">
        <div class="wrap">
            <div class="row center-xs start-sm middle-xs top-md">
                <div class="col-xs-6 col-md-3 tc tl-sm mb3 mb0-md">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php tu(); ?>/assets/images/logo-vertical.svg" alt="">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb3 mb0-md">
                    <nav>
                        <ul class="m0">
                            <?php 
                                $menuitems = array();
                                $activeIDs = array();
                                foreach (wp_get_nav_menu_items('3') as $m) {
                                    if(!isset($menuitems[$m->menu_item_parent])) $menuitems[$m->menu_item_parent] = array();
                                    array_push($menuitems[$m->menu_item_parent], $m);
                                    $i = $m->menu_item_parent!=0 ? $m->menu_item_parent : $m->ID;
                                    $activeIDs[$m->object_id] = $i;
                                }
                            ?>
                            <?php foreach (wp_get_nav_menu_items('3') as $m): ?>
                                <li class="t1 uc w300  mb05 link <?php if( get_the_ID() == $m->object_id ) echo 'w700'; ?>"><a href="<?php echo $m->url; ?>"><?php echo $m->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 col-md-6 mb3 mb0-md">
                    <div class="row mb3 mb5-md">
                        <div class="col-xs-12 col-md-9">
                          <!--   <p class="t1 uc  ls1-5 ff2">Receba o semanário da OKBR</p>
                            <form action="<?php echo currentURL(); ?>" method="post" class="flex flex-column flex-row-sm middle-xs ajaxpost mb1">
                                <input class="mb1 mb0-sm" type="email" name="assinarnews" required="true" placeholder="Seu e-mail">
                                <button class="btn-txt nowrap ml1" type="submit">Assinar</button>
                            </form> -->
                            <a class="btn-txt" href="<?php echo home_url('contato'); ?>">Conheça nossas newsletters</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4 mb3 mb0-md">
                            <p class="t1 uc ls1-5 ff2">Nossas Redes</p>
                            <?php if( have_rows('redes_sociais','option') ): ?>
                                    <ul class="lista-horizontal m0">
                                        <?php while ( have_rows('redes_sociais','option')) : the_row(); ?>
                                            <?php 
                                            $link = get_sub_field('link');
                                            $img = get_sub_field('icon');
                                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';

                                            if( $link ): 
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <li class="mr05 ml05 mb1">
                                                    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                                    <figure><img src="<?php echo $img; ?>"></figure>
                                                    <!-- <?php echo esc_html( $link_title ); ?>-->
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </ul>
                            <?php endif; ?>
                           
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <p class="t1 lh1-50 mb0">
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.97616 1.159L9.43393 1.01035C9.36414 0.987079 9.29539 0.994398 9.22854 1.03225C9.16147 1.07013 9.11618 1.127 9.0929 1.20276L5.83165 12.4903C5.80838 12.5661 5.81567 12.6376 5.85355 12.7046C5.89143 12.7716 5.94817 12.8168 6.02406 12.8401L6.56613 12.9888C6.63608 13.0122 6.70458 13.0049 6.77162 12.967C6.83868 12.9289 6.88389 12.8722 6.90713 12.7966L10.1685 1.50882C10.1917 1.43305 10.1845 1.36158 10.1465 1.29448C10.1086 1.22741 10.052 1.18224 9.97616 1.159Z" fill="black"/>
                            <path d="M5.08867 3.3625C5.08867 3.28674 5.05948 3.21964 5.00121 3.1614L4.56399 2.72421C4.50571 2.66593 4.43865 2.63672 4.36288 2.63672C4.28712 2.63672 4.22002 2.66596 4.16178 2.72421L0.0874617 6.79853C0.0290926 6.8568 0 6.92387 0 6.99963C0 7.0754 0.0291845 7.14246 0.0874617 7.20071L4.16175 11.275C4.21999 11.3334 4.28697 11.3624 4.36285 11.3624C4.43874 11.3624 4.50571 11.3333 4.56396 11.275L5.00118 10.8381C5.05945 10.7798 5.08864 10.7127 5.08864 10.6369C5.08864 10.5612 5.05945 10.4941 5.00118 10.4359L1.56509 6.99963L5.00121 3.56361C5.05958 3.50536 5.08867 3.43827 5.08867 3.3625Z" fill="black"/>
                            <path d="M15.913 6.79853L11.8386 2.72421C11.7804 2.66596 11.7133 2.63672 11.6376 2.63672C11.5618 2.63672 11.4949 2.66596 11.4364 2.72421L10.9994 3.16137C10.9412 3.21964 10.9121 3.28662 10.9121 3.36247C10.9121 3.43833 10.9411 3.50533 10.9994 3.56358L14.4356 6.9997L10.9994 10.436C10.9412 10.4942 10.9121 10.5613 10.9121 10.637C10.9121 10.7129 10.9411 10.7799 10.9994 10.8382L11.4364 11.2751C11.4949 11.3335 11.5618 11.3625 11.6376 11.3625C11.7133 11.3625 11.7804 11.3334 11.8386 11.2751L15.913 7.20083C15.9713 7.14259 16.0004 7.0754 16.0004 6.99963C16.0004 6.92384 15.9713 6.85677 15.913 6.79853Z" fill="black"/>
                            </svg>

                                &nbsp;Source code available under the MIT license. </p>
                            <p class="t1 lh1-50 mb0">
                                <a class="license" rel="license" href="https://creativecommons.org/licenses/by/4.0/">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_446_1262)"><path d="M8.98794 0.860355C10.049 0.839729 11.103 1.03565 12.0858 1.43616C13.0685 1.83667 13.9593 2.43335 14.7036 3.18975C15.4461 3.9231 16.0316 4.79987 16.4245 5.76666C17.1998 7.74624 17.1998 9.94538 16.4245 11.925C16.04 12.8807 15.4587 13.7448 14.7183 14.4611C13.9571 15.2259 13.0528 15.8334 12.0569 16.2489C11.0837 16.6551 10.0396 16.8639 8.9851 16.8633C7.93986 16.865 6.90494 16.6561 5.94228 16.2489C3.98467 15.4153 2.42573 13.8564 1.59216 11.8988C0.78699 9.94716 0.78699 7.75612 1.59216 5.80448C2.00094 4.8227 2.60074 3.93194 3.35669 3.18392C4.08322 2.42772 4.95896 1.83074 5.92834 1.43076C6.89772 1.03078 7.93955 0.836515 8.98794 0.860355ZM9.01709 2.31622C8.1572 2.29749 7.30281 2.4579 6.50827 2.78725C5.71374 3.11659 4.99642 3.60774 4.40195 4.22933C3.78473 4.84676 3.29065 5.57599 2.94609 6.37816C2.61155 7.16398 2.43909 8.00916 2.43909 8.86323C2.43909 9.71729 2.61155 10.5626 2.94609 11.3484C3.63602 12.9512 4.91795 14.2259 6.52462 14.9066C7.3137 15.2344 8.15967 15.4031 9.0141 15.4031C9.86854 15.4031 10.7146 15.2344 11.5037 14.9066C12.316 14.5649 13.0553 14.0707 13.6817 13.4508C14.2948 12.8581 14.7778 12.1442 15.1002 11.3547C15.4225 10.5652 15.577 9.71726 15.5539 8.86479C15.5584 8.00243 15.3932 7.14756 15.0676 6.34901C14.742 5.55685 14.2608 4.83811 13.6526 4.23516C13.0523 3.61332 12.3312 3.1209 11.5334 2.78839C10.7357 2.45587 9.87828 2.29028 9.0141 2.30172L9.01709 2.31622ZM8.91813 7.55735L7.84656 8.11354C7.76008 7.90752 7.61273 7.73274 7.4243 7.61266C7.28492 7.52586 7.12545 7.47677 6.96138 7.47006C6.24704 7.47006 5.88981 7.94172 5.88981 8.88512C5.87113 9.24755 5.96583 9.60687 6.16066 9.91304C6.25012 10.0404 6.37056 10.1427 6.51069 10.2105C6.65082 10.2782 6.80599 10.3091 6.96138 10.3002C7.17813 10.308 7.39161 10.2452 7.56961 10.1213C7.74761 9.99741 7.88055 9.81902 7.9485 9.61306L8.93548 10.1139C8.75244 10.4389 8.49817 10.7181 8.19176 10.9307C7.88536 11.1433 7.53485 11.2838 7.1664 11.3415C6.79795 11.3992 6.42115 11.3727 6.0644 11.264C5.70766 11.1553 5.38021 10.9672 5.10657 10.7138C4.67994 10.2028 4.44631 9.55807 4.44631 8.89237C4.44631 8.22667 4.67994 7.58213 5.10657 7.07111C5.32491 6.84978 5.58661 6.67586 5.87517 6.56014C6.16373 6.44441 6.47304 6.38934 6.78381 6.39849C7.77574 6.38296 8.48615 6.76055 8.91515 7.53119L8.91813 7.55735ZM13.5331 7.55735L12.4762 8.11354C12.3897 7.90752 12.2425 7.73274 12.0541 7.61266C11.9101 7.5243 11.7454 7.4752 11.5765 7.47006C10.8622 7.47006 10.5049 7.94172 10.5049 8.88512C10.4863 9.24755 10.581 9.60687 10.7758 9.91304C10.8653 10.0404 10.9857 10.1427 11.1258 10.2105C11.2659 10.2782 11.4211 10.3091 11.5765 10.3002C11.7933 10.308 12.0066 10.2452 12.1846 10.1213C12.3626 9.99741 12.4957 9.81902 12.5636 9.61306L13.5623 10.1139C13.3567 10.4918 13.0554 10.809 12.6887 11.0339C12.2268 11.3005 11.6919 11.4133 11.1617 11.3557C10.6314 11.2981 10.1332 11.0733 9.73919 10.7138C9.31469 10.2018 9.08235 9.55746 9.08235 8.89237C9.08235 8.22728 9.31469 7.58311 9.73919 7.07111C9.95787 6.84941 10.22 6.67531 10.5091 6.55957C10.7982 6.44383 11.108 6.38894 11.4193 6.39849C12.4073 6.38296 13.111 6.76055 13.5303 7.53119L13.5331 7.55735Z" fill="black"/></g><defs><clipPath id="clip0_446_1262"><rect width="16" height="16.0049" fill="white" transform="translate(0.988281 0.858398)"/></clipPath></defs></svg>

                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_446_1264)"><path d="M8.31744 0.85973C9.37188 0.848454 10.418 1.04766 11.3945 1.44563C12.371 1.8436 13.2584 2.43236 14.0046 3.17746C14.7508 3.92257 15.3408 4.809 15.7402 5.78495C16.1396 6.76089 16.3403 7.80672 16.3305 8.86118C16.3586 9.90412 16.1699 10.9415 15.7765 11.9078C15.3831 12.8741 14.7934 13.7484 14.0448 14.4751C13.3003 15.2383 12.4091 15.8429 11.4248 16.2527C10.4405 16.6625 9.38358 16.8691 8.31744 16.8598C6.20162 16.8437 4.17727 15.9951 2.68249 14.4976C1.1877 13 0.342678 10.9742 0.330491 8.85834C0.31964 7.80038 0.523008 6.75115 0.928335 5.77386C1.33366 4.79657 1.93259 3.91136 2.68903 3.17163C3.41953 2.42227 4.29579 1.8306 5.26381 1.43298C6.23183 1.03535 7.27111 0.84022 8.31744 0.85973ZM8.34658 2.3156C7.48694 2.29864 6.63304 2.45994 5.83877 2.78918C5.04449 3.11842 4.327 3.60854 3.73145 4.2287C3.10973 4.83144 2.61606 5.55338 2.27985 6.35137C1.94364 7.14936 1.77189 8.00692 1.77484 8.87284C1.7991 10.6055 2.50014 12.2601 3.72818 13.4827C4.95623 14.7053 6.61379 15.399 8.34658 15.4156C9.21508 15.4213 10.0757 15.2509 10.8764 14.9146C11.6772 14.5782 12.4014 14.083 13.0054 13.4588C13.6237 12.8694 14.1113 12.1565 14.4364 11.3664C14.7614 10.5764 14.9167 9.7268 14.8922 8.87284C14.8968 8.01049 14.7307 7.1558 14.4035 6.35791C14.0763 5.56002 13.5946 4.83473 12.9859 4.22387C12.3772 3.613 11.6535 3.12857 10.8568 2.79857C10.0601 2.46856 9.20596 2.29955 8.3436 2.3011L8.34658 2.3156ZM10.4896 6.88708V10.1336H9.57526V14.0208H7.08877V10.1336H6.17444V6.87244C6.17405 6.80465 6.18706 6.73752 6.21283 6.67482C6.23859 6.61211 6.2765 6.55513 6.32443 6.50719C6.37237 6.45926 6.42936 6.42135 6.49206 6.39559C6.55476 6.36982 6.62203 6.35667 6.68982 6.35706H9.9742C10.041 6.35731 10.1071 6.37087 10.1686 6.39687C10.23 6.42286 10.2857 6.46076 10.3323 6.50847C10.3821 6.55495 10.4216 6.61141 10.4482 6.67411C10.4748 6.7368 10.4879 6.80435 10.4867 6.87244L10.4896 6.88708ZM7.21686 4.82839C7.21686 4.07522 7.58848 3.69867 8.33194 3.69867C9.0754 3.69867 9.44716 4.07522 9.44716 4.82839C9.44716 5.57186 9.0754 5.94361 8.33194 5.94361C7.58848 5.94361 7.21686 5.56811 7.21686 4.81688V4.82839Z" fill="black"/></g><defs><clipPath id="clip0_446_1264"><rect width="16" height="16.0017" fill="white" transform="translate(0.330078 0.858398)"/></clipPath></defs></svg>

                                </a>&nbsp;Todo o conteúdo da Open Knowledge Brasil neste site está disponível sob a licença Creative Commons Atribuição 4.0 Internacional, exceto quando especificada outra licença. Isso significa que pode ser compartilhado e reutilizado para trabalhos derivados, desde que citada a fonte. O código-fonte da plataforma também é aberto e está disponível no Github.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
<script src="<?php tu(); ?>/build/script.js?v=202310041938"></script>
<?php global $alerta; if($alerta): ?>
<script type="text/javascript">alerta('<?php echo $alerta->status; ?>','<?php echo $alerta->msg; ?>');</script>
<?php endif; ?>
</body>
</html>