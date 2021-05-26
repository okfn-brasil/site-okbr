<?php  
// if( function_exists('acf_add_local_field_group') ):

// /* Eixos */
// 	acf_add_local_field_group(array(
// 		'key' => 'eixo_c',
// 		'title' => 'Eixo de atuação',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'eixo_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'eixo_c_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'textarea','new_lines' => 'br', 'rows' => '2'),
// 			array('key' => 'eixo_c_i', 'label' => 'Imagem principal', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'banner', 'min_width' => 1240, 'min_height' => 600,'instructions'=>'Minimo de 1240 x 600'),
// 			array('key' => 'eixo_c_ib', 'label' => 'Imagem banner', 'name' => 'banner', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbhor', 'min_width' => 1920, 'min_height' => 1080,'instructions'=>'Minimo de 1920 x 1080'),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'eixo', ), ),
// 		),
// 	));
// 	acf_add_local_field_group(array(
// 		'key' => 'eixos_c',
// 		'title' => 'Eixos de atuação',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'eixos_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 20, ), ),
// 		),
// 	));

// /* Equipe */
// 	acf_add_local_field_group(array(
// 		'key' => 'equipe_c',
// 		'title' => 'Equipe',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'equipe_t1', 'label' => 'Página', 'type' => 'tab',),
// 			array('key' => 'equipe_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'equipe_c_te', 'label' => 'Texto', 'name' => 'texto', 'type' => 'wysiwyg', 'media_upload'=>0,),
			
// 			array('key' => 'equipe_t2', 'label' => 'Grupos de colaboradores', 'type' => 'tab',),
// 			array(
// 				'key' => 'equipe_c_g', 'label' => 'Grupos', 'name' => 'grupos', 'type' => 'repeater', 'layout'=>'block',
// 				'sub_fields'=>array(
// 					array('key' => 'equipe_c_g_t', 'label' => 'Título do grupo', 'name' => 'titulo', 'type' => 'text',),
// 					array('key' => 'equipe_c_g_d', 'label' => 'Descrição do grupo', 'name' => 'descricao', 'type' => 'text',),
// 					array('key' => 'equipe_c_g_p', 'label' => 'Colaboradores', 'name' => 'colaboradores', 'type' => 'post_object', 'post_type' => 'colaborador','return_format' => 'id','multiple' => 1),
// 				)
// 			),
			
// 			array('key' => 'equipe_t3', 'label' => 'Associados', 'type' => 'tab',),
// 			array('key' => 'equipe_c_vol', 'label' => 'Associados', 'name' => 'voluntario', 'type' => 'textarea', 'instructions' => 'Um nome por linha','wrapper'=>array('width'=>'50%')),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 15, ), ),
// 		),
// 	));
// 	acf_add_local_field_group(array(
// 		'key' => 'colaborador_c',
// 		'title' => 'Colaborador',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'colaborador_c_f', 'label' => 'Foto de perfil', 'name' => 'imagem', 'type' => 'image', 'return_format'=>'array', 'preview_size'=>'perfil', 'min_width' => 200, 'min_height' => 200,'instructions'=>'200 x 200' ),
// 			array('key' => 'colaborador_c_c', 'label' => 'Cargo', 'name' => 'cargo', 'type' => 'text',),
// 			array('key' => 'colaborador_c_e', 'label' => 'E-mail', 'name' => 'email', 'type' => 'email',),
// 			array('key' => 'colaborador_c_b', 'label' => 'Bio', 'name' => 'texto', 'type' => 'wysiwyg', 'media_upload'=>0,),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'colaborador', ), ),
// 		),
// 	));

// /* Rede */
// 	acf_add_local_field_group(array(
// 		'key' => 'rede_c',
// 		'title' => 'Rede',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'rede_c_t', 'label' => 'Descrição', 'name' => 'texto', 'type' => 'text',),
// 			array('key' => 'rede_c_i', 'label' => 'Imagem', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'vertical', 'min_width' => 215, 'min_height' => 300, ),
// 			array('key' => 'rede_c_l', 'label' => 'Link externo', 'name' => 'link', 'type' => 'url',),
// 			array('key' => 'rede_e', 'label' => 'Eixo de atuação', 'name' => 'eixos', 'type' => 'post_object', 'post_type' => 'eixo','return_format' => 'object','multiple' => 1),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'rede', ), ),
// 		),
// 	));

// /* Projetos */
// 	acf_add_local_field_group(array(
// 		'key' => 'projeto_c',
// 		'title' => 'Projeto',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'projeto_c_a1', 'label' => 'Descrição', 'type' => 'tab',),
// 			array('key' => 'projeto_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'projeto_c_a', 'label' => 'Projeto em aberto', 'name' => 'aberto', 'type' => 'true_false', 'message' => 'Projeto aberto'),
// 			array('key' => 'projeto_c_d', 'label' => 'Descrição curta', 'name' => 'descricao', 'type' => 'text', 'instructions' => 'Uma frase para o card'),
// 			array('key' => 'projeto_c_de', 'label' => 'Descrição completa', 'name' => 'descricaocomp', 'type' => 'textarea','new_lines' => 'br', 'rows' => 3),
// 			array('key' => 'projeto_c_i', 'label' => 'Imagem principal', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumb', 'min_width' => 380, 'min_height' => 306,'instructions'=>'380 x 306'),
			
// 			array('key' => 'projeto_c_a2', 'label' => 'Organização', 'type' => 'tab',),
// 			array('key' => 'projeto_c_eixo', 'label' => 'Eixo de atuação', 'name' => 'eixos', 'type' => 'post_object', 'post_type' => 'eixo','return_format' => 'id','multiple' => 1),
// 			array('key' => 'projeto_c_ano', 'label' => 'Ano do projeto', 'name' => 'ano', 'type' => 'text',),
// 			array('key' => 'projeto_c_finan', 'label' => 'Financiamento', 'name' => 'financiamento', 'type' => 'textarea','new_lines' => 'br', 'wrapper'=>array('width'=>'50%')),
// 			array('key' => 'projeto_c_parce', 'label' => 'Parcerias', 'name' => 'parcerias', 'type' => 'textarea','new_lines' => 'br', 'wrapper'=>array('width'=>'50%')),
// 			array('key' => 'projeto_c_tw', 'label' => 'Twitter', 'name' => 'twitter', 'type' => 'url'),
// 			array('key' => 'projeto_c_fb', 'label' => 'Facebook', 'name' => 'facebook', 'type' => 'url'),
// 			array('key' => 'projeto_c_gh', 'label' => 'GitHub', 'name' => 'github', 'type' => 'url'),
// 			array('key' => 'projeto_c_fe', 'label' => 'Feed', 'name' => 'feed', 'type' => 'url'),
// 			array('key' => 'projeto_c_si', 'label' => 'Website', 'name' => 'website', 'type' => 'url'),
			
// 			array('key' => 'projeto_c_a3', 'label' => 'Pessoal', 'type' => 'tab',),
// 			array('key' => 'projeto_c_col', 'label' => 'Colaboradores', 'name' => 'colaboradores', 'type' => 'post_object', 'post_type' => 'colaborador','return_format' => 'id','multiple' => 1,'wrapper'=>array('width'=>'50%')),
// 			array('key' => 'projeto_c_vol', 'label' => 'Voluntários', 'name' => 'voluntario', 'type' => 'textarea', 'instructions' => 'Um nome por linha','wrapper'=>array('width'=>'50%')),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'projeto', ), ),
// 		),
// 	));
// 	acf_add_local_field_group(array(
// 		'key' => 'projetos_c',
// 		'title' => 'Projetos',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'projetos_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'projetos_c_te', 'label' => 'Texto', 'name' => 'texto', 'type' => 'wysiwyg', 'media_upload'=>0,),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 22, ), ),
// 		),
// 	));

// /* Transparencia */
// 	acf_add_local_field_group(array(
// 		'key' => 'transparencia_c',
// 		'title' => 'Listas de documentos',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'transparencia_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'transparencia_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'textarea','new_lines' => 'br', 'rows' => '2'),
// 			array(
// 				'key' => 'transparencia_c_b',
// 				'label' => 'Blocos',
// 				'name' => 'blocos',
// 				'type' => 'repeater',
// 				'layout'=>'block',
// 				'sub_fields'=>array(
// 					array('key' => 'transparencia_c_b_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text', ),
// 					array(
// 						'key' => 'transparencia_c_b_d',
// 						'label' => 'Destaques',
// 						'name' => 'destaques',
// 						'type' => 'repeater',
// 						'layout'=>'block',
// 						'sub_fields'=>array(
// 							array('key' => 'transparencia_c_b_d_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text', 'wrapper'=>array('width'=>'40%')),
// 							array('key' => 'transparencia_c_b_d_ti', 'label' => 'Tipo', 'name' => 'tipo', 'type' => 'select', 'choices' => array('arquivo' => 'Arquivo', 'link' => 'Link externo', ), 'default_value' => 'arquivo', 'wrapper'=>array('width'=>'20%')),
// 							array('key' => 'transparencia_c_b_d_f', 'label' => 'Arquivo', 'name' => 'arquivo', 'type' => 'file', 'return_format'=>'url', 'conditional_logic'=>array(array(array('field'=>'transparencia_c_b_d_ti','operator'=>'==','value'=>'arquivo'))), 'wrapper'=>array('width'=>'40%')),
// 							array('key' => 'transparencia_c_b_d_l', 'label' => 'Link', 'name' => 'link', 'type' => 'url', 'conditional_logic'=>array(array(array('field'=>'transparencia_c_b_d_ti','operator'=>'==','value'=>'link'))), 'wrapper'=>array('width'=>'20%')),
// 							array('key' => 'transparencia_c_b_d_bt', 'label' => 'Texto do botão', 'name' => 'label', 'type' => 'text', 'conditional_logic'=>array(array(array('field'=>'transparencia_c_b_d_ti','operator'=>'==','value'=>'link'))), 'wrapper'=>array('width'=>'20%'), 'default_value'=>'Leia no site'),
// 						)
// 					),
// 					array(
// 						'key' => 'transparencia_c_b_l',
// 						'label' => 'Lista',
// 						'name' => 'lista',
// 						'type' => 'repeater',
// 						'layout'=>'block',
// 						'sub_fields'=>array(
// 							array('key' => 'transparencia_c_b_l_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text', 'wrapper'=>array('width'=>'40%')),
// 							array('key' => 'transparencia_c_b_l_ti', 'label' => 'Tipo', 'name' => 'tipo', 'type' => 'select', 'choices' => array('arquivo' => 'Arquivo', 'link' => 'Link externo', ), 'default_value' => 'arquivo', 'wrapper'=>array('width'=>'20%')),
// 							array('key' => 'transparencia_c_b_l_f', 'label' => 'Arquivo', 'name' => 'arquivo', 'type' => 'file', 'return_format'=>'url', 'conditional_logic'=>array(array(array('field'=>'transparencia_c_b_l_ti','operator'=>'==','value'=>'arquivo'))), 'wrapper'=>array('width'=>'40%')),
// 							array('key' => 'transparencia_c_b_l_l', 'label' => 'Link', 'name' => 'link', 'type' => 'url', 'conditional_logic'=>array(array(array('field'=>'transparencia_c_b_l_ti','operator'=>'==','value'=>'link'))), 'wrapper'=>array('width'=>'40%')),
// 						)
// 					),
// 				)
// 			),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 13, ), ),
// 		),
// 	));

// /* Contato */
// 	acf_add_local_field_group(array(
// 		'key' => 'contato_c',
// 		'title' => 'Contato',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'contato_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'contato_c_f', 'label' => 'Frase inicial', 'name' => 'frase', 'type' => 'text',),
			
// 			array('key' => 'contato_c_cs', 'label' => 'E-mails da OKBR', 'name' => 'emails', 'type' => 'repeater', 'layout'=>'table', 'sub_fields'=>array(
// 				array('key' => 'contato_c_cs_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text'),
// 				array('key' => 'contato_c_cs_e', 'label' => 'E-mail', 'name' => 'email', 'type' => 'email'),
// 			)),

// 			array('key' => 'contato_c_r', 'label' => 'Nossas redes', 'name' => 'redes', 'type' => 'repeater', 'layout'=>'block', 'sub_fields'=>array(
// 				array('key' => 'contato_c_r_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text'),
// 				array('key' => 'contato_c_r_i', 'label' => 'Imagem', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumb', 'min_width' => 380, 'min_height' => 306, ),
// 				array('key' => 'contato_c_r_twitter', 'label' => 'Twitter link', 'name' => 'twitter', 'type' => 'url',),
// 				array('key' => 'contato_c_r_facebook', 'label' => 'Facebook link', 'name' => 'facebook', 'type' => 'url',),
// 				array('key' => 'contato_c_r_github', 'label' => 'Github link', 'name' => 'github', 'type' => 'url',),
// 				array('key' => 'contato_c_r_feed', 'label' => 'Feed link', 'name' => 'feed', 'type' => 'url',),

// 				array('key' => 'contato_c_r_newsletter_a', 'label' => 'ID da lista do Mailchimp', 'name' => 'lista', 'type' => 'text',),
// 				array('key' => 'contato_c_r_newsletter_c', 'label' => 'Chave de API Mailchimp', 'name' => 'chave', 'type' => 'text',),
// 				array('key' => 'contato_c_r_newsletter_l', 'label' => 'Newsletter link externo', 'name' => 'newsletter', 'type' => 'url', 'instructions'=>'Deixe em branco para usar as credenciais do Mailchimp'),
// 			)),

// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 30 ), ),
// 		),
// 	));	

// /* Sobre */
// 	acf_add_local_field_group(array(
// 		'key' => 'sobre_c',
// 		'title' => 'Sobre nós',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'sobre_c_a_1', 'label' => 'Intro', 'type' => 'tab'),
// 			array('key' => 'sobre_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'sobre_c_s', 'label' => 'Subtítulo', 'name' => 'subtitulo', 'type' => 'text',),
// 			array('key' => 'sobre_c_i', 'label' => 'Imagens', 'name' => 'imagens', 'type' => 'gallery'),
// 			array('key' => 'sobre_c_de', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'wysiwyg',),

// 			array('key' => 'sobre_c_a_2', 'label' => 'Missão e Visão', 'type' => 'tab'),
// 			array(
// 				'key' => 'sobre_c_mv', 'label' => 'Blocos com imagem', 'name' => 'blocosimagem', 'type' => 'repeater',
// 				'sub_fields'=>array(
// 					array('key' => 'sobre_c_mv_i', 'label' => 'Imagem', 'name' => 'imagem', 'type' => 'image', 'return_format'=>'array', 'preview_size'=>'meio'),
// 					array('key' => 'sobre_c_mv_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 					array('key' => 'sobre_c_mv_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'textarea',),
// 				)
// 			),
			

// 			array('key' => 'sobre_c_a_3', 'label' => 'Valores', 'type' => 'tab'),
// 			array(
// 				'key' => 'sobre_c_val', 'label' => 'Blocos com icone', 'name' => 'blocosicone', 'type' => 'repeater',
// 				'sub_fields'=>array(
// 					array('key' => 'sobre_c_val_i', 'label' => 'Ícone', 'name' => 'imagem', 'type' => 'image', 'return_format'=>'array', 'preview_size'=>'full'),
// 					array('key' => 'sobre_c_val_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text',),
// 					array('key' => 'sobre_c_val_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'textarea',),
// 				)
// 			),

// 			array('key' => 'sobre_c_a_4', 'label' => 'Grupos', 'type' => 'tab'),
// 			array(
// 				'key' => 'sobre_c_g', 'label' => 'Grupos', 'name' => 'grupos', 'type' => 'repeater', 'layout'=>'block',
// 				'sub_fields'=>array(
// 					array('key' => 'sobre_c_g_t', 'label' => 'Título do grupo', 'name' => 'titulo', 'type' => 'text',),
// 					array(
// 						'key' => 'sobre_c_g_l', 'label' => 'Logos', 'name' => 'logos', 'type' => 'repeater', 'layout'=>'table',
// 						'sub_fields'=>array(
// 							array('key' => 'sobre_c_g_l_i', 'label' => 'Logo', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'meio', 'instructions'=>'Fundo transparente ou branco, sem margens'),
// 							array('key' => 'sobre_c_g_l_l', 'label' => 'Link', 'name' => 'url', 'type' => 'url'),
// 						)
// 					),
// 				)
// 			),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 11, ), ),
// 		),
// 	));

// /* Home */
// 	acf_add_local_field_group(array(
// 		'key' => 'home_c',
// 		'title' => 'Home',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'home_c_bg', 'label' => 'Imagem de fundo do banner', 'name' => 'banner', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumb', 'min_width' => 1600 ),
// 			array('key' => 'home_c_c', 'label' => 'Banner Carousel', 'name' => 'carousel', 'type' => 'repeater', 'layout'=>'table', 'sub_fields'=>array(
// 				array('key' => 'home_c_c_i', 'label' => 'Imagem', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'meio', 'min_width' => 600 ),
// 				array('key' => 'home_c_c_t', 'label' => 'Texto', 'name' => 'texto', 'type' => 'text', 'instructions'=>'Use [palavra,palavra2,...] para criar a animação de digitação'),
// 				array('key' => 'home_c_c_btl', 'label' => 'Link do botao', 'name' => 'url', 'type' => 'link',),
// 			)),

// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 9 ), ),
// 		),
// 	));	

// /* Noticias */
// 	acf_add_local_field_group(array(
// 		'key' => 'noticia_c',
// 		'title' => 'Noticia',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'noticia_c_i', 'label' => 'Imagem principal', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumb', 'min_width' => 380, 'min_height' => 306,'instructions'=>'380 x 306'),
// 			array('key' => 'noticia_c_eixo', 'label' => 'Eixo de atuação', 'name' => 'eixos', 'type' => 'post_object', 'post_type' => 'eixo','return_format' => 'id','multiple' => 1),
// 			array('key' => 'noticia_c_col', 'label' => 'Autores', 'name' => 'colaboradores', 'type' => 'post_object', 'post_type' => 'colaborador','return_format' => 'id','multiple' => 1),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'noticia', ), ),
// 		),
// 	));
// 	acf_add_local_field_group(array(
// 		'key' => 'clip_c',
// 		'title' => 'Clipping',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'clip_c_i', 'label' => 'Imagem principal', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumb', 'min_width' => 380, 'min_height' => 306,'instructions'=>'380 x 306'),
// 			array('key' => 'clip_c_v', 'label' => 'Veículo de mídia', 'name' => 'midia', 'type' => 'text'),
// 			array('key' => 'clip_c_d', 'label' => 'Data', 'name' => 'data', 'type' => 'date_picker','return_format' => 'd M \d\e Y'),
// 			array('key' => 'clip_c_l', 'label' => 'Link externo', 'name' => 'url', 'type' => 'url', 'instructions'=>'Se preenchido o card levará direto ao link.'),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'clipping', ), ),
// 		),
// 	));
// 	acf_add_local_field_group(array(
// 		'key' => 'evento_c',
// 		'title' => 'Eventos',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'evento_c_i', 'label' => 'Imagem principal', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumb', 'min_width' => 380, 'min_height' => 306,'instructions'=>'380 x 306'),
// 			array('key' => 'evento_c_eixo', 'label' => 'Eixo de atuação', 'name' => 'eixos', 'type' => 'post_object', 'post_type' => 'eixo','return_format' => 'id','multiple' => 1),
// 			array('key' => 'evento_c_v', 'label' => 'Data do evento', 'name' => 'data', 'type' => 'date_picker','return_format' => 'd M \d\e Y'),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'evento', ), ),
// 		),
// 	));

// 	acf_add_local_field_group(array(
// 		'key' => 'noticias_c',
// 		'title' => 'Noticias',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'noticias_c_de', 'label' => 'Destaques', 'name' => 'destaque', 'type' => 'post_object', 'post_type' => array('noticia','evento','clipping'),'return_format' => 'id','multiple' => 1),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 24, ), ),
// 		),
// 	));
// 	acf_add_local_field_group(array(
// 		'key' => 'clipping_c',
// 		'title' => 'Clipping',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'clipping_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'clipping_c_te', 'label' => 'Texto', 'name' => 'texto', 'type' => 'wysiwyg', 'media_upload'=>0,),
// 			array(
// 				'key' => 'clipping_c_g_l', 'label' => 'Logos', 'name' => 'logos', 'type' => 'repeater', 'layout'=>'table',
// 				'sub_fields'=>array(
// 					array('key' => 'clipping_c_g_l_i', 'label' => 'Logo', 'name' => 'imagem', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'meio', 'instructions'=>'Fundo transparente ou branco, sem margens'),
// 					array('key' => 'clipping_c_g_l_l', 'label' => 'Link', 'name' => 'url', 'type' => 'url'),
// 				)
// 			),
// 			array(
// 				'key' => 'clipping_c_g_p', 'label' => 'Presskit', 'name' => 'presskit', 'type' => 'repeater', 'layout'=>'table',
// 				'sub_fields'=>array(
// 					array('key' => 'clipping_c_g_p_t', 'label' => 'Titulo', 'name'=>'titulo', 'type' => 'text'),
// 					array('key' => 'clipping_c_g_p_d', 'label' => 'Descrição', 'name'=>'descricao', 'type' => 'text'),
// 					array('key' => 'clipping_c_g_p_f', 'label' => 'Arquivo', 'name'=>'arquivo', 'type' => 'file', 'return_format'=>'url'),
// 				)
// 			),
			
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 34, ), ),
// 		),
// 	));

// /* Página geral */
// 	acf_add_local_field_group(array(
// 		'key' => 'pagina_c',
// 		'title' => 'Página padrão',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'pagina_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'template-paginapadrao.php' ), ),
// 		),
// 	));	

// /* FAQ */
// 	acf_add_local_field_group(array(
// 		'key' => 'faq_c',
// 		'title' => 'FAQ',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'faq_c_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array(
// 				'key' => 'faq_c_r', 'label' => 'Blocos de perguntas', 'name' => 'blocos', 'type' => 'repeater', 'layout'=>'block',
// 				'sub_fields'=>array(
// 					array('key' => 'faq_c_r1', 'label' => 'Título do bloco', 'name' => 'titulo', 'type' => 'text',),
// 					array(
// 						'key' => 'faq_c_r2', 'label' => 'Perguntas', 'name' => 'perguntas', 'type' => 'repeater', 'layout'=>'table',
// 						'sub_fields'=>array(
// 							array('key' => 'faq_c_r21', 'label' => 'Pergunta', 'name' => 'pergunta', 'type' => 'text'),
// 							array('key' => 'faq_c_r22', 'label' => 'Resposta', 'name' => 'resposta', 'type' => 'textarea'),
// 						)
// 					),
// 				)
// 			),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'page', 'operator' => '==', 'value' => 32 ), ),
// 		),
// 	));	

// /* Apoie */
// 	acf_add_local_field_group(array(
// 		'key' => 'apoie_c',
// 		'title' => 'Apoie',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'apoie_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'apoie_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'wysiwyg',),
// 			array('key' => 'apoie_do', 'label' => 'Texto sobre doação', 'name' => 'doacao', 'type' => 'wysiwyg',),
// 			array(
// 				'key' => 'apoie_doa', 'label' => 'Botões de Doação', 'name' => 'doacoes', 'type' => 'repeater',
// 				'sub_fields'=>array(
// 					array('key' => 'apoie_doa_t', 'label' => 'Nome', 'name' => 'titulo', 'type' => 'text',),
// 					array('key' => 'apoie_doa_l', 'label' => 'Link', 'name' => 'link', 'type' => 'url',),
// 				),
// 			),
// 			array('key' => 'apoie_tra', 'label' => 'Transferências', 'name' => 'transferencia', 'type' => 'wysiwyg',),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 28, ), ),
// 		),
// 	));

// /* Participe */
// 	acf_add_local_field_group(array(
// 		'key' => 'participe_c',
// 		'title' => 'Participe',
// 		'style' => 'seamless',
// 		'menu_order' => 1,
// 		'fields' => array(
// 			array('key' => 'participe_t', 'label' => 'Título estilizado', 'name' => 'titulo', 'type' => 'text',),
// 			array('key' => 'participe_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'wysiwyg',),
// 			array(
// 				'key' => 'participe_b', 'label' => 'Blocos', 'name' => 'blocos', 'type' => 'repeater', 'layout'=>'block',
// 				'sub_fields'=>array(
// 					array('key' => 'participe_b_t', 'label' => 'Nome', 'name' => 'titulo', 'type' => 'text',),
// 					array('key' => 'participe_b_d', 'label' => 'Descrição', 'name' => 'descricao', 'type' => 'textarea',),
// 					array('key' => 'participe_b_la', 'label' => 'Label do botão', 'name' => 'label', 'type' => 'text',),
// 					array('key' => 'participe_b_li', 'label' => 'Link', 'name' => 'link', 'type' => 'url',),
// 				),
// 			),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post', 'operator' => '==', 'value' => 26, ), ),
// 		),
// 	));

// /* Blocos */
// 	acf_add_local_field_group(array(
// 		'key' => 'conteudo',
// 		'title' => 'Blocos de conteúdo',
// 		'style' => 'seamless',
// 		'menu_order' => 2,
// 		'fields' => array(
// 			array(
// 				'key' => 'conteudo_c', 'label' => 'Conteúdo', 'name' => 'conteudo',
// 				'type' => 'flexible_content', 'button_label'=>'Adicionar conteúdo',
// 				'layouts' => array(
// 					'texto' => array(
// 						'key' => 'conteudo_c_texto', 'label' => 'Texto geral', 'name' => 'texto', 'layout' => 'block',
// 						'sub_fields'=>array(
// 							array('key' => 'conteudo_c_texto_t', 'label' => 'Texto', 'name' => 'texto', 'type' => 'wysiwyg', 'media_upload'=>0,),
// 						)
// 					),
// 					'frasescol' => array(
// 						'key' => 'conteudo_c_frasescol', 'label' => 'Titulo + Frases em colunas', 'name' => 'frasescol', 'layout' => 'block',
// 						'sub_fields'=>array(
// 							array('key' => 'conteudo_c_frasescol_c_t', 'label' => 'Título', 'name' => 'titulo', 'type' => 'text', ),
// 							array(
// 								'key' => 'conteudo_c_frasescol_c_l', 'label' => 'Itens', 'name' => 'itens', 'type' => 'repeater', 'layout'=>'table', 'min'=>1,
// 								'sub_fields'=>array(
// 									array('key' => 'conteudo_c_frasescol_c_l_t', 'label' => 'Texto', 'name' => 'texto', 'type' => 'text'),
// 								)
// 							),
// 						)
// 					),
// 					'blocoscol' => array(
// 						'key' => 'conteudo_c_blocoscol', 'label' => 'Blocos cinza em colunas', 'name' => 'blocoscol', 'layout' => 'block',
// 						'sub_fields'=>array(
// 							array(
// 								'key' => 'conteudo_c_blocoscol_c_l', 'label' => 'Itens', 'name' => 'itens', 'type' => 'repeater', 'layout'=>'table', 'min'=>1,
// 								'sub_fields'=>array(
// 									array('key' => 'conteudo_c_blocoscol_c_l_t', 'label' => 'Titulo', 'name' => 'titulo', 'type' => 'text'),
// 									array('key' => 'conteudo_c_blocoscol_c_l_tt', 'label' => 'Texto', 'name' => 'texto', 'type' => 'text'),
// 								)
// 							),
// 						)
// 					),
// 					'imagem' => array(
// 						'key' => 'conteudo_c_imagem', 'label' => 'Imagem grande', 'name' => 'imagem', 'layout' => 'table',
// 						'sub_fields'=>array(
// 							array('key' => 'conteudo_c_imagem_t', 'label' => 'Imagem', 'name' => 'imagem', 'type' => 'image', 'return_format'=>'array', 'preview_size'=>'meio'),
// 							array('key' => 'conteudo_c_imagem_l', 'label' => 'Legenda/Fonte', 'name' => 'legenda', 'type' => 'text'),
// 						)
// 					),
// 					'galeria' => array(
// 						'key' => 'conteudo_c_galeria', 'label' => 'Galeria de imagens', 'name' => 'galeria', 'layout' => 'block',
// 						'sub_fields'=>array(
// 							array('key' => 'conteudo_c_galeria_g', 'label' => 'Imagens', 'name' => 'galeria', 'type' => 'gallery', 'min'=>1, 'preview_size'=>'meio'),
// 						)
// 					),
// 					'botoes' => array(
// 						'key' => 'conteudo_c_botoes', 'label' => 'Botões', 'name' => 'botoes', 'layout' => 'block',
// 						'sub_fields'=>array(
// 							array(
// 								'key' => 'conteudo_c_botoes_c_l', 'label' => 'Itens', 'name' => 'itens', 'type' => 'repeater', 'layout'=>'table', 'min'=>1,
// 								'sub_fields'=>array(
// 									array('key' => 'conteudo_c_botoes_c_l_tt', 'label' => 'Link', 'name' => 'link', 'type' => 'link'),
// 								)
// 							),
// 						)
// 					),
// 					'titulodesecao' => array(
// 						'key' => 'conteudo_c_titulodesecao', 'label' => 'Título de seção', 'name' => 'titulodesecao', 'layout' => 'block',
// 						'sub_fields'=>array(
// 							array('key' => 'conteudo_c_titulodesecao_t', 'label' => 'Titulo', 'name' => 'titulo', 'type' => 'text'),
// 						)
// 					),
// 					'margem' => array(
// 						'key' => 'conteudo_c_margem', 'label' => 'Espaçamento vertical', 'name' => 'margem', 'layout' => 'block',
// 						'sub_fields'=>array()
// 					),
// 				),
// 			),
// 		),
// 		'location' => array(
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'eixo', ), ),
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'noticia', ), ),
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'projeto', ), ),
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'evento', ), ),
// 			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'clipping', ), ),
// 			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'template-paginapadrao.php' ), ),
// 		),
// 	));

// endif;