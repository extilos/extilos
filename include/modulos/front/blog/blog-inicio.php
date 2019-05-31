<div class="container-fluid no-gutters row">
 <div class="col-md-3">

                    <div class="banner"> <!-- conteúdos dedicados ao usuário -->
                        <a href="#">
                            <img src="/extilos/img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>
                
                    
                    <?php if($idUsuario > 1){ ?>
                        <div class="box col-sm-9">
                            <?php 
                            include 'include/modulos/front/blog/botao-publicacao.php';
                            include 'include/modulos/front/blog/enviar-publicacao.php';
                            include 'include/modulos/front/blog/enviar-publicacao-produto.php';
                            ?>
                        </div>
                    <?php  } ?>
            

            <div class="col-sm-9 box" id="blog-listing">
                <!-- BLOCO DE VÍDEOS -->
                <div class="panel-group" id="accordion">
                    <div class="post">
                        <h2><a href="post.html">Video Youtube</a></h2>
                        <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                        </p>
                        <hr>
                        <p class="date-comments">
                            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                        </p>
                        <div class="image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/ePbKoIGAXY"></iframe>
                            </div>
                        </div>
                        <?php
                        $palavra = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                        mi vitae est. Mauris placerat eleifend leo.'; 
                        $texto = tamanhoTexto40($palavra);
                        if ($texto[3] > 40){
                            ?>
                            <p class="intro" id="textocurto"><?php echo $texto[2]; ?>
                            <a onclick="Mudarestado1('textocurto');Mudarestado('textocompleto')"> Continuar Leitura</a>
                        </p>
                        <p class="intro" id="textocompleto" style="display: none;"><?php echo $texto[1]; ?></p>
                    <?php }else{ ?>
                        <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
                    <?php } ?>
                    <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
                    </p>
                    <div id="faq1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                            Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                <li>Aliquam tincidunt mauris eu risus.</li>
                                <li>Vestibulum auctor dapibus neque.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!-- BLOCO DE INSTAGRAN -->
            <div class="panel-group" id="accordion">
                <div class="post">
                    <h2><a href="post.html">INSTAGRAM</a></h2>
                    <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
                    </p>
                    <hr>
                    <p class="date-comments">
                        <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                        <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                    </p>
                    <div class="image">
                        <!-- LightWidget WIDGET 8a8808284e9f5433916e1a86e0c7eb6d.html -->
                        <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
                        <iframe src="//lightwidget.com/widgets/7608cfaa14cc57bd8bc4839e254da5bf.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
                    </div>
                    <?php
                    $palavra = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                    mi vitae est. Mauris placerat eleifend leo.'; 
                    $texto = tamanhoTexto40($palavra);
                    if ($texto[3] > 40){
                        ?>
                        <p class="intro" id="textocurto"><?php echo $texto[2]; ?>
                        <a onclick="Mudarestado1('textocurto');Mudarestado('textocompleto')"> Continuar Leitura</a>
                    </p>
                    <p class="intro" id="textocompleto" style="display: none;"><?php echo $texto[1]; ?></p>
                <?php }else{ ?>
                    <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
                <?php } ?>
                <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
                </p>
                <div id="faq1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                            <li>Aliquam tincidunt mauris eu risus.</li>
                            <li>Vestibulum auctor dapibus neque.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <!-- BLOCO DE ENQUETE -->
        <div class="panel-group" id="accordion">
            <div class="post ">
                <h2><a href="post.html">ENQUETE</a></h2>
                <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
                </p>
                <hr>
                <p class="date-comments">
                    <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                    <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                </p>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <div class="image">
                            <img src="/extilos/img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        $pergunta = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                        mi vitae est. Mauris placerat eleifend leo.'; 
                        $texto = tamanhoTexto($pergunta);
                        if ($texto[3] > 20){
                            ?>
                            <p class="intro" id="textocurto1"><?php echo $texto[2]; ?>
                            <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
                        </p>
                        <p class="intro" id="textocompleto1" style="display: none;"><?php echo $texto[1]; ?></p>
                    <?php }else{ ?>
                        <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
                    <?php } ?>
                    <p>SIM | NÂO | TALVEZ</p>
                    <p>Nota 01 | 10</p>
                </div>
            </div>


            <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
            </p>
            <div id="faq1" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                    Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                        <li>Aliquam tincidunt mauris eu risus.</li>
                        <li>Vestibulum auctor dapibus neque.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <!-- BLOCO DE FOTO HORIZONTAL -->
    <div class="panel-group" id="accordion">
        <div class="post">
            <h2><a href="post.html">FOTO</a></h2>
            <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
            </p>
            <hr>
            <p class="date-comments">
                <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
            </p>
            <div class="image">
                <img src="/extilos/img/banner.jpg" alt="sales 2014" class="img-responsive">
            </div>
            <?php
            $pergunta = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
            mi vitae est. Mauris placerat eleifend leo.'; 
            $texto = tamanhoTexto40($pergunta);
            if ($texto[3] > 40){
                ?>
                <p class="intro" id="textocurto1"><?php echo $texto[2]; ?>
                <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
            </p>
            <p class="intro" id="textocompleto1" style="display: none;"><?php echo $texto[1]; ?></p>
        <?php }else{ ?>
            <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
        <?php } ?>
        <p>MARCAÇÕES DE USUÁRIO</p>
        <p>MARCAÇÕES DE LOJAS</p>


        <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
        </p>
        <div id="faq1" class="panel-collapse collapse">
            <div class="panel-body">
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                    <li>Aliquam tincidunt mauris eu risus.</li>
                    <li>Vestibulum auctor dapibus neque.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  -->
<!-- BLOCO DE BLOG/LOJA/TORRE -->
<div class="panel-group" id="accordion">
    <div class="post">
        <h2><a href="post.html">BLOG/LOJA/TORRE</a></h2>
        <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
        </p>
        <hr>
        <p class="date-comments">
            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
        </p>
        <div class="image">
            <img src="/extilos/img/banner.jpg" alt="sales 2014" class="img-responsive" style="height: 250px">
        </div>
        <?php
        $pergunta = 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
        mi vitae est. Mauris placerat eleifend leo.'; 
        $texto = tamanhoTexto40($pergunta);
        if ($texto[3] > 40){
            ?>
            <p class="intro" id="textocurto1"><?php echo $texto[2]; ?>
            <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
        </p>
        <p class="intro" id="textocompleto1" style="display: none;"><?php echo $texto[1]; ?></p>
    <?php }else{ ?>
        <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
    <?php } ?>
    <button class="btn btn-sm btn-primary">Visitar</button>


    <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
    </p>
    <div id="faq1" class="panel-collapse collapse">
        <div class="panel-body">
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
            Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                <li>Aliquam tincidunt mauris eu risus.</li>
                <li>Vestibulum auctor dapibus neque.</li>
            </ul>
        </div>
    </div>
</div>
</div>
<!--  -->
<!-- BLOCO DE EVENTOS -->
<div class="panel-group" id="accordion">
    <div class="post">
        <h2><a href="post.html">EVENTOS</a></h2>
        <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
        </p>
        <hr>
        <p class="date-comments">
            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
        </p>
        <div class="image">
            <img src="/extilos/img/banner.jpg" alt="sales 2014" class="img-responsive" style="height: 300px">
        </div>
        <?php
        $pergunta = 'sobre o evento.'; 
        $texto = tamanhoTexto40($pergunta);
        if ($texto[3] > 40){
            ?>
            <p class="intro" id="textocurto1"><?php echo $texto[2]; ?>
            <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
        </p>
        <p class="intro" id="textocompleto1" style="display: none;"><?php echo $texto[1]; ?></p>
    <?php }else{ ?>
        <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
    <?php } ?>
    <p> Banner do evento</p>
    <p> Data / Local / Horário</p>
    <button class="btn btn-sm btn-primary">Visitar</button>


    <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
    </p>
    <div id="faq1" class="panel-collapse collapse">
        <div class="panel-body">
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
            Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                <li>Aliquam tincidunt mauris eu risus.</li>
                <li>Vestibulum auctor dapibus neque.</li>
            </ul>
        </div>
    </div>
</div>
</div>
<!--  -->
<!-- BLOCO DE LINKS -->
<div class="panel-group" id="accordion">
    <div class="post">
        <h2><a href="post.html">LINK TWITTER</a></h2>
        <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
        </p>
        <hr>
        <p class="date-comments">
            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
        </p>
        <div class="card">
         <blockquote class="twitter-tweet" data-lang="pt"><p lang="en" dir="ltr"><a href="https://twitter.com/KondZilla/status/1067766382593523712?ref_src=twsrc%5Etfw"></a></blockquote>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

        </div>
        <?php
        $pergunta = 'sobre o evento.'; 
        $texto = tamanhoTexto40($pergunta);
        if ($texto[3] > 40){
            ?>
            <p class="intro" id="textocurto1"><?php echo $texto[2]; ?>
            <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
        </p>
        <p class="intro" id="textocompleto1" style="display: none;"><?php echo $texto[1]; ?></p>
    <?php }else{ ?>
        <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
    <?php } ?>
    <p> Banner do evento</p>
    <p> Data / Local / Horário</p>
    <button class="btn btn-sm btn-primary">Visitar</button>


    <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
    </p>
    <div id="faq1" class="panel-collapse collapse">
        <div class="panel-body">
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
            Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                <li>Aliquam tincidunt mauris eu risus.</li>
                <li>Vestibulum auctor dapibus neque.</li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- BLOCO DE LINKS -->
<div class="panel-group" id="accordion">
    <div class="post">
        <h2><a href="post.html">LINK SITE</a></h2>
        <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
        </p>
        <hr>
        <p class="date-comments">
            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
        </p>



        <?php 
                                        /**
                                        <blockquote class="twitter-tweet" data-lang="pt"><p lang="pt" dir="ltr">SIM, HOMEM DO ANO! A <a href="https://t.co/XX1UpsSa6w">https://t.co/XX1UpsSa6w</a> parabeniza nosso fundador e diretor criativo, Kond, pelo Prêmio de Homem do Ano na Música pela revista <a href="https://twitter.com/GQBrasil?ref_src=twsrc%5Etfw">@GQBrasil</a> ! <a href="https://twitter.com/hashtag/SomosPlural?src=hash&amp;ref_src=twsrc%5Etfw">#SomosPlural</a> <a href="https://twitter.com/hashtag/FxvxlxVxncxx?src=hash&amp;ref_src=twsrc%5Etfw">#FxvxlxVxncxx</a> <a href="https://twitter.com/hashtag/KondZilla?src=hash&amp;ref_src=twsrc%5Etfw">#KondZilla</a></p>&mdash; KondZilla (@KondZilla) <a href="https://twitter.com/KondZilla/status/1067766382593523712?ref_src=twsrc%5Etfw">28 de novembro de 2018</a></blockquote>
                                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                                            $tags = getUrlData('https://www.facebook.com/viitor.couto00/posts/1802621329859668?comment_id=1805049026283565&notif_id=1544829383724116&notif_t=comment_mention');
                                            $tags1 = get_meta_tags ('https://www.facebook.com/viitor.couto00');
                                            print_r($tags1);

                                            print_r($tags);
                                            echo '<hr>';
                                            //print_r ($tags['twitter:image']);
                                            
                                            echo '<img src="'.$tags['metaTags']['twitter:image']['value'].'" alt="" class="img-responsive text-center" >';
                                            $titulo = utf8_encode($tags['title']).'<br>';
                                            $descricao = utf8_encode($tags['metaTags']['description']['value']);

                                            //------------------------------------------
                                            echo utf8_decode($titulo);
                                            echo utf8_decode($descricao);

                                            echo $tags['metaTags']['copyright']['value'];
                                            echo $tags['metaTags']['author']['value'];
                                            echo $tags['metaTags']['twitter:domain']['value']; **/
                                            $url = 'https://www.youtube.com/watch?v=u-0oNukmRxw';
                                            $tags = getSiteOG($url);
                                                //print_r($tags);
                                            function getSiteOG( $url, $specificTags=0 ){
                                                $doc = new DOMDocument();
                                                @$doc->loadHTML(file_get_contents($url));
                                                $res['title'] = $doc->getElementsByTagName('title')->item(0)->nodeValue;

                                                foreach ($doc->getElementsByTagName('meta') as $m){
                                                    $tag = $m->getAttribute('name') ?: $m->getAttribute('property');
                                                    if(in_array($tag,['description','keywords']) || strpos($tag,'og:')===0) $res[str_replace('og:','',$tag)] = $m->getAttribute('content');
                                                }
                                                return $specificTags? array_intersect_key( $res, array_flip($specificTags) ) : $res;
                                            }
                                            


                                            ?>
                                            <div class="box">
                                                <?php
                                                $titulo = utf8_encode($tags['title']).'<br>';
                                                $descricao = utf8_encode($tags['description']);
                                                echo '<img src="'.$tags['image'].'" alt="" class="img-responsive text-center" style="height:100px; max-width:100px;" >';   
                                            //[image:secure] [or:img] [twitter:image]
                                                echo utf8_decode($titulo);
                                                echo palavraCurta(100,utf8_decode($descricao)).'<br>';
                                                echo '<a>'.$url.'</a>';
                                                ?>
                                            </div>
                                            <?php
                                            $pergunta = 'sobre o evento.'; 
                                            $texto = tamanhoTexto40($pergunta);
                                            if ($texto[3] > 40){
                                                ?>
                                                <p class="intro" id="textocurto1"><?php echo $texto[2]; ?>
                                                <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
                                            </p>
                                            <p class="intro" id="textocompleto1" style="display: none;"><?php echo $texto[1]; ?></p>
                                        <?php }else{ ?>
                                            <p class="intro"><?php echo $texto[2].$texto[1]; ?></p>
                                        <?php } ?>
                                        <p> Banner do evento</p>
                                        <p> Data / Local / Horário</p>
                                        <button class="btn btn-sm btn-primary">Visitar</button>


                                        <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
                                        </p>
                                        <div id="faq1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                                Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                                <ul>
                                                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                    <li>Aliquam tincidunt mauris eu risus.</li>
                                                    <li>Vestibulum auctor dapibus neque.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BLOCO VIDEO DO FACEOOK 
                                <div class="panel-group" id="accordion">
                                    <div class="post">
                                        <h2><a href="post.html">VIDEO FACEBOOK</a></h2>
                                        <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
                                        </p>
                                        <hr>
                                        <p class="date-comments">
                                            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                                            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                                        </p>
                                        <div class="box">
                                         <div class="fb-video " data-href="https://www.facebook.com/facebook/videos/10153231379946729/" data-width="auto" data-show-text="false">
                                                <div class="fb-xfbml-parse-ignore">
                                                  <blockquote cite="https://www.facebook.com/facebook/videos/10153231379946729/">
                                                    <a href="https://www.facebook.com/facebook/videos/10153231379946729/">How to Share With Just Friends</a>
                                                    <p>How to share with just friends.</p>
                                                    Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
                                                  </blockquote>
                                                </div>
                                              </div> 

                                        </div>
                                        <?php
                                        //$pergunta = 'sobre o evento.'; 
                                        //$texto = tamanhoTexto40($pergunta);
                                        //if ($texto[3] > 40){
                                            ?>
                                            <p class="intro" id="textocurto1"><?php// echo $texto[2]; ?>
                                            <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
                                        </p>
                                        <p class="intro" id="textocompleto1" style="display: none;"><?php// echo $texto[1]; ?></p>
                                    <?php// }else{ ?>
                                        <p class="intro"><?php// echo $texto[0]; ?></p>
                                    <?php// } ?>
                                    <button class="btn btn-sm btn-primary">Visitar</button>


                                    <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
                                    </p>
                                    <div id="faq1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                            Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            <ul>
                                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                <li>Aliquam tincidunt mauris eu risus.</li>
                                                <li>Vestibulum auctor dapibus neque.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                             <!-- BLOCO VIDEO DO FACEOOK 
                                <div class="panel-group" id="accordion">
                                    <div class="post">
                                        <h2><a href="post.html">FOTO FACEBOOK</a></h2>
                                        <p class="author-category">By <a href="#">John Slim</a> in <a href="">https://lightwidget.com/</a>
                                        </p>
                                        <hr>
                                        <p class="date-comments">
                                            <a href="post.html"><i class="fa fa-calendar-o"></i> June 20, 2013</a>
                                            <a href="post.html"><i class="fa fa-comment-o"></i> 8 Comments</a>
                                        </p>
                                        <div class="box">
                                         <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5" 
                                              async></script>  
                                          <div class="fb-post" 
                                              data-href="https://www.facebook.com/desesquerdizada/posts/727233587660581?__xts__[0]=68.ARAXjKklSSyQbwdYb7jzHCn6cxqB7O-bsxlvEvsC0ij4pnkxgFMNw2741yzK4g5CHawOmqnQisnGlQzdWgsW42mtldQAAsG48nAPSYrk3dRtzWBcdCrshFwCZWNV_1PKGcx0y7aNKW1IyCGV8m2UJRe4J6CJpxaut1fvXwFe8r9-QM9-W9mg2MzG5tzLr88UmtQBr5zCu_EIVg2lFAH0rzfpMkdVvrYZpSQcnFWk846YRPY9sJ1Jq7D9w-wEWdUp3QR_3zNqXcG6DUeTNNDV4pgwKSqaLtTQFMA973LXRQdy_1enmGqHoSjzfVHfXWV_1WWXt2bAWbhT9hENQtSmlnGD1091hCkClucyWsKicZ4eMrtVMQzBV7TSzMNepStSUHFtvyqxtdfl1aYLZT_b2PJ3gG6xT1nacja8TYjku8XbYKFoq0hPzcQImJupwJL_UduF-3rMtuXmh2T1bmYbkfkIdFfR6LG90FIHroFwb9XEsY9FRKi6R8k&__tn__=-UC-R"
                                              data-width="auto"></div>

                                        </div>
                                        <?php
                                        //$pergunta = 'sobre o evento.'; 
                                        //$texto = tamanhoTexto40($pergunta);
                                        //if ($texto[3] > 40){
                                            ?>
                                            <p class="intro" id="textocurto1"><?php// echo $texto[2]; ?>
                                            <a onclick="Mudarestado1('textocurto1');Mudarestado('textocompleto1')"> Continuar Leitura</a>
                                        </p>
                                        <p class="intro" id="textocompleto1" style="display: none;"><?php// echo $texto[1]; ?></p>
                                    <?php// }else{ ?>
                                        <p class="intro"><?php// echo $texto[0]; ?></p>
                                    <?php//  } ?>
                                    <button class="btn btn-sm btn-primary">Visitar</button>


                                    <p class="read-more"><a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="btn btn-primary">Comentários</a>    
                                    </p>
                                    <div id="faq1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                            Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            <ul>
                                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                                <li>Aliquam tincidunt mauris eu risus.</li>
                                                <li>Vestibulum auctor dapibus neque.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <ul class="pager">
                                <li class="previous"><a href="#">&larr; Older</a>
                                </li>
                                <li class="next disabled"><a href="#">Newer &rarr;</a>
                                </li>
                            </ul>



                        </div>
                        <!-- /.col-md-9 -->

                        <!-- *** LEFT COLUMN END *** -->





                    </div>
                    <?php 
                    function getUrlData($url)
                    {
                        $result = false;

                        $contents = getUrlContents($url);

                        if (isset($contents) && is_string($contents))
                        {
                            $title = null;
                            $metaTags = null;

                            preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );

                            if (isset($match) && is_array($match) && count($match) > 0)
                            {
                                $title = strip_tags($match[1]);
                            }

                            preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);

                            if (isset($match) && is_array($match) && count($match) == 3)
                            {
                                $originals = $match[0];
                                $names = $match[1];
                                $values = $match[2];

                                if (count($originals) == count($names) && count($names) == count($values))
                                {
                                    $metaTags = array();

                                    for ($i=0, $limiti=count($names); $i < $limiti; $i++)
                                    {
                                        $metaTags[$names[$i]] = array (
                                            'html' => htmlentities($originals[$i]).'<br>',
                                            'value' => $values[$i]
                                        );
                                    }
                                }
                            }

                            $result = array (
                                'title' => $title,
                                'metaTags' => $metaTags
                            );
                        }

                        return $result;
                    }
                    function getUrlContents($url, $maximumRedirections = null, $currentRedirection = 0)
                    {
                        $result = false;

                        $contents = @file_get_contents($url);

    // Check if we need to go somewhere else

                        if (isset($contents) && is_string($contents))
                        {
                            preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?' . '[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?' . '[\s]*[\/]?[\s]*>/si', $contents, $match);

                            if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1)
                            {
                                if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections)
                                {
                                    return getUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
                                }

                                $result = false;
                            }
                            else
                            {
                                $result = $contents;
                            }
                        }

                        return $contents;
                    }

                    ?>
                    <script type="text/javascript">
                        function carregarInsta(){
                            var token = '302471505.670ac57.ccfc2f2deb2047fcb3e8b2d96b7856f6',
                            userid = '302471505',
                            num_photos = 10;
                            $.ajax({
                    url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent', // or /users/self/media/recent for Sandbox
                    dataType: 'jsonp',
                    type: 'GET',
                    data: {access_token: token, count: num_photos},
                    success: function(data){
                        console.log(data);
                        for( x in data.data ){
                            $("#resultado").append('<img src="'+data.data[x].images.low_resolution.url+'">'); // data.data[x].images.low_resolution.url - URL of image, 306х306
                            // data.data[x].images.thumbnail.url - URL of image 150х150
                            // data.data[x].images.standard_resolution.url - URL of image 612х612
                            // data.data[x].link - Instagram post URL 
                        }
                    },
                    error: function(data){
                        console.log(data); // send the error notifications to console
                    }
                });
                        }


/** $.ajax({
                url: 'https://api.instagram.com/v1/users/self/media/recent',
                dataType: 'jsonp',
                type: 'GET',
                data: {access_token: token, count: num_photos},
                success: function(data){
                    console.log(data);
                    for( x in data.data ){
                        $("#resultado").append('<img src="'+data.data[x].images.low_resolution.url+'">');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        } **/
    </script>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2';
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>