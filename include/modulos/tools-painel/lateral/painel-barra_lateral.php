

<ul class="nav">
        <!-- RELATORIO-->
        <?php if($url[1] == "relatorio_geral" || $url[1] == "editar_user"){ ?>
          <li class="nav-item active">
            <a class="nav-link" href="relatorio_geral">
              <i class="material-icons">face</i>
              <p><?php echo $_SESSION['nomeLogado']; ?></p>
            </a>
          </li>
        <?php }else{ ?>
          <li class="nav-item ">
            <a class="nav-link" href="relatorio_geral">
              <i class="material-icons">face</i>
              <p><?php echo $_SESSION['nomeLogado']; ?></p>
            </a>
          </li>
        <!-- BLOG-->
        <?php }if($url[1] == "meus_blogs" || $url[1] == "cadastro_blog" || $url[1] == "editar_blog"){ ?>
          <li class="nav-item active ">
            <a class="nav-link" href="meus_blogs">
              <i class="material-icons">bookmarks</i>
              <p>Blog</p>
            </a>
          </li>
        <?php }else{ ?>
        <li class="nav-item ">
            <a class="nav-link" href="meus_blogs">
              <i class="material-icons">bookmarks</i>
              <p>Blog</p>
            </a>
          </li>
        <!-- TORRE -->
        <?php } if($url[1] == "cadastro_torre" || $url[1] == "minhas_torres" || $filtro[0] == "editar_torre"){?>
          <li class="nav-item active">
            <a class="nav-link" href="minhas_torres">
              <i class="material-icons">library_books</i>
              <p>Torre</p>
            </a>
          </li>
        <?php }else{ ?>
          <li class="nav-item ">
            <a class="nav-link" href="minhas_torres">
              <i class="material-icons">library_books</i>
              <p>Torre</p>
            </a>
          </li>
        <!-- TORRE -->
         <!-- PUBLICIDADE -->
        <?php } if($url[1] == "publicidade_usuario" || $url[1] == "minhas_publicidades" || $filtro[0] == "comprar_publicidade"){?>
          <li class="nav-item active">
            <a class="nav-link" href="minhas_publicidades">
              <i class="material-icons">publicidade</i>
              <p>Publicidade</p>
            </a>
          </li>
        <?php }else{ ?>
          <li class="nav-item ">
            <a class="nav-link" href="minhas_publicidades">
              <i class="material-icons">publicidade</i>
              <p>Publicidade</p>
            </a>
          </li>
        <!-- FIM PUBLICIDADE -->
        <?php }?>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">notifications</i>
              <p>Novidades</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">record_voice_over</i>
              <p>Atendimento</p>
            </a>
          </li>
           <li class="nav-item active-pro active">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> 
        </ul>
