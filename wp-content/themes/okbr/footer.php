    <!-- Footer -->
    <footer class="container-fluid bg-preto pt5 pb4">
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
                                <li class="t1 uc w300 tcb mb05 link <?php if( get_the_ID() == $m->object_id ) echo 'w700'; ?>"><a href="<?php echo $m->url; ?>"><?php echo $m->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 col-md-6 mb3 mb0-md">
                    <div class="row mb3 mb5-md">
                        <div class="col-xs-12 col-md-9">
                            <p class="t1 uc tcv ls1-5 ff2">Receba o semanário da OKBR</p>
                            <form action="<?php echo currentURL(); ?>" method="post" class="flex flex-column flex-row-sm middle-xs ajaxpost mb1">
                                <input class="mb1 mb0-sm" type="email" name="assinarnews" required="true" placeholder="Seu e-mail">
                                <button class="btn-txt nowrap ml1" type="submit">Assinar</button>
                            </form>
                            <a class="btn-txt" href="<?php echo home_url('contato'); ?>">Conheça outras newsletters</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4 mb3 mb0-md">
                            <p class="t1 uc tcv ls1-5 ff2">Nossas Redes</p>
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="lista-horizontal m0">
                                        <li class="mr05 ml05"><a target="_blank" href="https://twitter.com/okfnbr"><button class="rede-social twitter"></button></a></li>
                                        <li class="mr05 ml05"><a target="_blank" href="https://www.facebook.com/OpenKnowledgeBrasil"><button class="rede-social facebook"></button></a></li>
                                        <li class="mr05 ml05"><a target="_blank" href="https://github.com/okfn-brasil"><button class="rede-social github"></button></a></li>
                                        <li class="mr05 ml05"><a target="_blank" href=""><button class="rede-social feed"></button></a></li>
                                        <li class="mr05 ml05"><a target="_blank" href="https://www.instagram.com/openknowledgebrasil/"><button class="rede-social insta"></button></a></li>
                                        <li class="mr05 ml05"><a target="_blank" href="https://www.linkedin.com/company/open-knowledge-brasil"><button class="rede-social linkdin"></button></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <p class="t1 tcb lh1-50 mb0">
                            <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 522.468 522.469"><path d="M325.762,70.513l-17.706-4.854c-2.279-0.76-4.524-0.521-6.707,0.715c-2.19,1.237-3.669,3.094-4.429,5.568L190.426,440.53 c-0.76,2.475-0.522,4.809,0.715,6.995c1.237,2.19,3.09,3.665,5.568,4.425l17.701,4.856c2.284,0.766,4.521,0.526,6.71-0.712 c2.19-1.243,3.666-3.094,4.425-5.564L332.042,81.936c0.759-2.474,0.523-4.808-0.716-6.999 C330.088,72.747,328.237,71.272,325.762,70.513z"/> <path d="M166.167,142.465c0-2.474-0.953-4.665-2.856-6.567l-14.277-14.276c-1.903-1.903-4.093-2.857-6.567-2.857 s-4.665,0.955-6.567,2.857L2.856,254.666C0.95,256.569,0,258.759,0,261.233c0,2.474,0.953,4.664,2.856,6.566l133.043,133.044 c1.902,1.906,4.089,2.854,6.567,2.854s4.665-0.951,6.567-2.854l14.277-14.268c1.903-1.902,2.856-4.093,2.856-6.57 c0-2.471-0.953-4.661-2.856-6.563L51.107,261.233l112.204-112.201C165.217,147.13,166.167,144.939,166.167,142.465z"/><path d="M519.614,254.663L386.567,121.619c-1.902-1.902-4.093-2.857-6.563-2.857c-2.478,0-4.661,0.955-6.57,2.857l-14.271,14.275 c-1.902,1.903-2.851,4.09-2.851,6.567s0.948,4.665,2.851,6.567l112.206,112.204L359.163,373.442 c-1.902,1.902-2.851,4.093-2.851,6.563c0,2.478,0.948,4.668,2.851,6.57l14.271,14.268c1.909,1.906,4.093,2.854,6.57,2.854 c2.471,0,4.661-0.951,6.563-2.854L519.614,267.8c1.903-1.902,2.854-4.096,2.854-6.57 C522.468,258.755,521.517,256.565,519.614,254.663z"/></svg>
                                &nbsp;Source code available under the MIT license. </p>
                            <p class="t1 tcb lh1-50 mb0">
                                <a class="license" rel="license" href="https://creativecommons.org/licenses/by/4.0/">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.95 54.95"><path d="M7117.46,7140.15a26.81,26.81,0,0,1,19.63,8A26.42,26.42,0,0,1,7143,7157a29,29,0,0,1,0,21.15,25.21,25.21,0,0,1-5.86,8.71A28.23,28.23,0,0,1,7128,7193a27.35,27.35,0,0,1-10.55,2.11A26.71,26.71,0,0,1,7107,7193a28.28,28.28,0,0,1-14.94-14.94,27.44,27.44,0,0,1,0-20.93,27.57,27.57,0,0,1,6.06-9A26,26,0,0,1,7117.46,7140.15Zm0.1,5a21.29,21.29,0,0,0-15.85,6.57,23.63,23.63,0,0,0-5,7.38,21.79,21.79,0,0,0,0,17.07,23.26,23.26,0,0,0,12.29,12.22,22.29,22.29,0,0,0,17.1,0,23.7,23.7,0,0,0,7.48-5,21.11,21.11,0,0,0,6.43-15.75,22.57,22.57,0,0,0-1.67-8.64,22,22,0,0,0-4.86-7.26A21.74,21.74,0,0,0,7117.55,7145.1Zm-0.34,18-3.68,1.91a3.77,3.77,0,0,0-1.45-1.72,3.26,3.26,0,0,0-1.59-.49q-3.68,0-3.68,4.86a6,6,0,0,0,.93,3.53,3.14,3.14,0,0,0,2.75,1.33,3.44,3.44,0,0,0,3.39-2.36l3.39,1.72a8.48,8.48,0,0,1-13.15,2.06,9.76,9.76,0,0,1,0-12.51,7.77,7.77,0,0,1,5.76-2.31Q7115,7159.09,7117.21,7163.06Zm15.85,0-3.63,1.91a3.77,3.77,0,0,0-1.45-1.72,3.33,3.33,0,0,0-1.64-.49q-3.68,0-3.68,4.86a6,6,0,0,0,.93,3.53,3.14,3.14,0,0,0,2.75,1.33,3.44,3.44,0,0,0,3.39-2.36l3.43,1.72a8.44,8.44,0,0,1-3,3.16,8.63,8.63,0,0,1-10.13-1.1,9.8,9.8,0,0,1,0-12.51,7.77,7.77,0,0,1,5.77-2.31Q7130.9,7159.09,7133.06,7163.06Z" transform="translate(-7090.03 -7140.15)"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54.95 54.95"><path d="M7117.46,7140.15a27.23,27.23,0,0,1,27.52,27.48,25.9,25.9,0,0,1-7.85,19.28,27.15,27.15,0,0,1-19.67,8.19,27.64,27.64,0,0,1-27.43-27.48,26.93,26.93,0,0,1,8.1-19.53A26.31,26.31,0,0,1,7117.46,7140.15Zm0.1,5a21.39,21.39,0,0,0-15.85,6.57,22.11,22.11,0,0,0-6.72,15.95,22.79,22.79,0,0,0,22.57,22.47,22.06,22.06,0,0,0,16-6.72,20.93,20.93,0,0,0,6.48-15.75A22.45,22.45,0,0,0,7117.55,7145.1Zm7.36,15.7V7172h-3.14v13.35h-8.54V7172h-3.14V7160.8a1.76,1.76,0,0,1,1.77-1.77h11.28a1.73,1.73,0,0,1,1.23.52A1.67,1.67,0,0,1,7124.91,7160.8Zm-11.24-7.07q0-3.88,3.83-3.88t3.83,3.88q0,3.83-3.83,3.83T7113.68,7153.74Z" transform="translate(-7090.03 -7140.15)"></path></svg>
                                </a>&nbsp;Todo o conteúdo da Open Knowledge Brasil neste site está disponível sob a licença Creative Commons Atribuição 4.0 Internacional, exceto quando especificada outra licença. Isso significa que pode ser compartilhado e reutilizado para trabalhos derivados, desde que citada a fonte. O código-fonte da plataforma também é aberto e está disponível no Github.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
<script src="<?php tu(); ?>/build/script.js?v=2"></script>
<?php global $alerta; if($alerta): ?>
<script type="text/javascript">alerta('<?php echo $alerta->status; ?>','<?php echo $alerta->msg; ?>');</script>
<?php endif; ?>
</body>
</html>