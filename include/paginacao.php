<div class="pages">
    <?php 
    $usu        = (isset($_GET['nm']))      ? '&nm='.$_GET['nm'] : null;
    $pag        = (isset($_GET['pag']))     ? '&pag='.$_GET['pag'] : null;
    $tp         = (isset($_GET['tp']))      ? '&tp='.$_GET['tp'] : null;
    $album      = (isset($_GET['album']))   ? '&album='.$_GET['album'] : null;
    $cd         = (isset($_GET['cd']))      ? '&cd='.$_GET['cd'] : null;
    $pg         = (isset($_GET['pg']))      ? $_GET['pg'] : null;


    ?>
                <ul class="pagination">
                    <?php
                    if(!isset($_GET['busca'])){
                    if($_GET['pg'] == 'index' or $_GET['pg'] == ''){ //USADO PARA EXIBIR BOTÃO DE VER MAIS APENAS NO INDEX
                        if($tipoBusca == 'ranking'){
                            echo '<a href="index&busca=ranking" class="btn btn-sm btn-danger" data-dismiss="modal">VER MAIS</a>';
                        }
                        if($tipoBusca == 'index'){
                            echo '<a href="index&busca=todos" class="btn btn-danger" data-dismiss="modal">VER MAIS</a>';
                        }
                    }else{
                    $qtdPaginacao = 6;
                    $pgAtual = isset($_GET['pgAtual']) ? $_GET['pgAtual'] : 1;
                    $paginacao = paginacao($numPaginas, $qtdExibida, $pgAtual, $qtdPaginacao);
                    print_r($paginacao);
                    if(isset($_GET['cd']) || isset($_GET['pag'])){
                        echo '<li><a href="/extilos/'.$pg.$usu.$pag.$tp.$album.$cd.'&pgAtual=1#hot" class="btn btn-sm btn-danger">&laquo;</a></li>';
                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
                            echo '<li><a href="/extilos/'.$pg.$usu.$pag.$tp.$album.$cd.'&pgAtual='.$pgA.'#hot" class="btn btn-sm btn-danger">'.$pgA.'</a></li>';
                        }
                        echo '<li><a href="/extilos/'.$pg.$usu.$pag.$tp.$album.$cd.'&pgAtual='.$paginacao[2].'#hot" class="btn btn-sm btn-danger">&raquo;</a></li>';
                    }else{
                        echo '<li><a href="/extilos/'.$_GET['pg'].'&pgAtual=1#hot">&laquo;</a></li>';
                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
                            echo '<li><a href="/extilos/'.$_GET['pg'].'&pgAtual='.$pgA.'#hot" class="btn btn-sm btn-danger">'.$pgA.'</a></li>';
                        }
                        echo '<li><a href="/extilos/'.$_GET['pg'].'&pgAtual='.$paginacao[2].'#hot" class="btn btn-sm btn-danger">&raquo;</a></li>';
                    }
                    
                   
                }
                }else{
                     $qtdPaginacao = 6;
                    $pgAtual = isset($_GET['pgAtual']) ? $_GET['pgAtual'] : 1;
                    $paginacao = paginacao($numPaginas, $qtdExibida, $pgAtual, $qtdPaginacao);

                    if(isset($_GET['cd']) || isset($_GET['busca'])){
                        echo '<li><a href="/extilos/'.$pg.$usu.$pag.$tp.$album.$cd.'&pgAtual=1#hot" class="btn btn-sm btn-danger">&laquo;</a></li>';
                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
                            echo '<li><a href="/extilos/'.$pg.$usu.$pag.$tp.$album.$cd.'&pgAtual='.$pgA.'#hot" class="btn btn-sm btn-danger">'.$pgA.'</a></li>';
                        }
                        echo '<li><a href="/extilos/'.$pg.$usu.$pag.$tp.$album.$cd.'&pgAtual='.$paginacao[2].'#hot" class="btn btn-sm btn-danger">&raquo;</a></li>';
                    }else{
                        echo '<li><a href="/extilos/'.$_GET['pg'].'&pgAtual=1#hot">&laquo;</a></li>';
                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
                            echo '<li><a href="/extilos/'.$_GET['pg'].'&pgAtual='.$pgA.'#hot" class="btn btn-sm btn-danger">'.$pgA.'</a></li>';
                        }
                        echo '<li><a href="/extilos/'.$_GET['pg'].'&pgAtual='.$paginacao[2].'#hot" class="btn btn-sm btn-danger">&raquo;</a></li>';
                    }

                }
                    ?>
                </ul>
            </div>