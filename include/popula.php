<?php

/*function xmlToArray($xml, $options = array()) {
    $defaults = array(
        'namespaceSeparator' => ':',
        'attributePrefix' => '@',
        'alwaysArray' => array(),
        'autoArray' => true,
        'textContent' => '$',
        'autoText' => true,
        'keySearch' => false,
        'keyReplace' => false
    );
    $options = array_merge($defaults, $options);
    $namespaces = $xml->getDocNamespaces();
    $namespaces[''] = null;

    $attributesArray = array();
    foreach ($namespaces as $prefix => $namespace) {
        foreach ($xml->attributes($namespace) as $attributeName => $attribute) {
            if ($options['keySearch']) $attributeName =
                    str_replace($options['keySearch'], $options['keyReplace'], $attributeName);
            $attributeKey = $options['attributePrefix']
                    . ($prefix ? $prefix . $options['namespaceSeparator'] : '')
                    . $attributeName;
            $attributesArray[$attributeKey] = (string)$attribute;
        }
    }

    $tagsArray = array();
    foreach ($namespaces as $prefix => $namespace) {
        foreach ($xml->children($namespace) as $childXml) {
            $childArray = xmlToArray($childXml, $options);
            list($childTagName, $childProperties) = each($childArray);

            if ($options['keySearch']) $childTagName =
                    str_replace($options['keySearch'], $options['keyReplace'], $childTagName);
            if ($prefix) $childTagName = $prefix . $options['namespaceSeparator'] . $childTagName;

            if (!isset($tagsArray[$childTagName])) {
                $tagsArray[$childTagName] =
                        in_array($childTagName, $options['alwaysArray']) || !$options['autoArray']
                        ? array($childProperties) : $childProperties;
            } elseif (
                is_array($tagsArray[$childTagName]) && array_keys($tagsArray[$childTagName])
                === range(0, count($tagsArray[$childTagName]) - 1)
            ) {
                $tagsArray[$childTagName][] = $childProperties;
            } else {
                $tagsArray[$childTagName] = array($tagsArray[$childTagName], $childProperties);
            }
        }
    }

    $textContentArray = array();
    $plainText = trim((string)$xml);
    if ($plainText !== '') $textContentArray[$options['textContent']] = $plainText;

    $propertiesArray = !$options['autoText'] || $attributesArray || $tagsArray || ($plainText === '')
            ? array_merge($attributesArray, $tagsArray, $textContentArray) : $plainText;

    return array(
        $xml->getName() => $propertiesArray
    );
}
$page = file_get_contents("http://localhost/okbr/data.xml");
$xml = simplexml_load_string($page);
$arrayData = xmlToArray($xml);*/
//header('Content-Type: application/json');

//$posts = array();
//foreach($arrayData['rss']['channel']['item'] as $i){
    /*if($i['wp:post_type'] == 'attachment'){
        $imagens[$i['wp:post_id']] = array('post_id'=>$i['wp:post_id'],'attachment_url'=>$i['wp:attachment_url'],'title'=>$i['title']);
    }*/
    //if($i['wp:post_type'] == 'post' && $i['wp:status'] == 'publish'){
        /*$posts[$i['wp:post_id']] = array(
            'post_id'=>$i['wp:post_id'],
            'excerpt'=>$i['excerpt:encoded'],
            'content'=>$i['content:encoded'],
            'post_date'=>$i['wp:post_date'],
            'post_name'=>$i['wp:post_name'],
            'title'=>$i['title']
        );
        foreach ($i['wp:postmeta'] as $p) {
            if($p['wp:meta_key'] == '_thumbnail_id'){
                $posts[$i['wp:post_id']]['thumbnail'] = $p['wp:meta_value'];
            }
        }*/
        /*$arr = array(
            'post_name'=>$i['wp:post_name'],
            'tags'=>array()
        );
        foreach ($i['category'] as $p) {
            if(is_array($p) && isset($p["@domain"])){
                if($p["@domain"] == 'post_tag'){
                    array_push($arr['tags'], $p["$"]);
                }
            }
        }
        $posts[$i['wp:post_id']] = $arr;*/
    //}
//}
/*foreach ($posts as $p) {
    if ( $post = get_page_by_path( $p['post_name'], OBJECT, 'noticia' ) ){
        $id = $post->ID;
        wp_set_post_tags($id,$p['tags']);
    }
}*/
//echo json_encode($posts);

/*function getSSLPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSLVERSION,3); 
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}*/
/*
foreach($imagens as $k=>$i){
    $url = str_replace('https://br.okfn.org/files/', '', $i->attachment_url);
    $datas = explode("/", $url);
    $ano = $datas[0];
    $mes = $datas[1];
    $file = $datas[2];

    $i->attachment_url = $file;
}*/

//$posts = json_decode(file_get_contents("http://localhost/okbr/posts_limpo.json"));
//$imagens = json_decode(file_get_contents("http://localhost/okbr/imagens_limpo.json"));
//$imagens = (array)$imagens;
/*$novasimg = array();
foreach ($imagens as $key => $value) {
    $tem = 0;
    foreach ($posts as $k => $v) {
        if($v->thumbnail == $value->attachment_url){
            $tem = 1;
            break;
        }elseif(strpos($v->content, $value->attachment_url)){
            $tem = 1;
            break;
        }
    }
    if(!$tem){
        var_dump($value);
    }
}*/

/*foreach ($imagens as $key => $value) {
    $image_url = "http://localhost/okbr/ups/".$value->attachment_url;
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents( $image_url );
    $filename = $value->attachment_url;
    if ( wp_mkdir_p( $upload_dir['path'] ) ) {
      $file = $upload_dir['path'] . '/' . $filename;
    }
    else {
      $file = $upload_dir['basedir'] . '/' . $filename;
    }

    file_put_contents( $file, $image_data );

    $wp_filetype = wp_check_filetype( $filename, null );

    $attachment = array(
      'post_mime_type' => $wp_filetype['type'],
      'post_title' => ($value->title) ? $value->title : sanitize_file_name( $filename ),
      'post_content' => '',
      'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $file );
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    wp_update_attachment_metadata( $attach_id, $attach_data );
    sleep(1);
}*/
/*
foreach ($posts as $k => $v) {
    $arr = array(
        'post_type'=>'noticia',
        'post_status'=>'publish',
        'post_title'=>$v->title,
        'excerpt'=>$v->excerpt,
        'post_date'=>$v->post_date,
        'post_name'=>$v->post_name,
        'meta_input'=>array(
            'conteudo'=>array("texto"),
            '_conteudo'=>'conteudo_c',
            'conteudo_0_texto'=>$v->content,
            '_conteudo_0_texto'=>'conteudo_c_texto_t'
        ),
    );
    if($v->thumbnail){
        $thumb = attachment_url_to_postid("http://localhost/okbr/wordpress/wp-content/uploads/2019/11/".$v->thumbnail);
        if($thumb){
            $arr['meta_input']['imagem'] = $thumb;
            $arr['meta_input']['_imagem'] = 'noticia_c_i';
        }
    }
    wp_insert_post($arr);
}*/

exit;