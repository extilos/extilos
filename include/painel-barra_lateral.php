<ul class="nav">
        <!-- RELATORIO-->
        <?php if($url[1] == "relatorio_geral"){ ?>
          <li class="nav-item active">
            <a class="nav-link" href="relatorio_geral">
              <i class="material-icons">dashboard</i>
              <p>Relatório</p>
            </a>
          </li>
        <?php }else{ ?>
          <li class="nav-item ">
            <a class="nav-link" href="relatorio_geral">
              <i class="material-icons">dashboard</i>
              <p>Relatório</p>
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
        <?php }?>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
