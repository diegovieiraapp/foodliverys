        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->
<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar in dark">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="../assets/images/master.png" alt="avatar"/></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username"><?php echo $nome ?></a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>Master</small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="../login.php?sair">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>Sair</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
		<li>
          <a href="cadastroUsuario.php">
            <i class="menu-icon fa fa-user-plus zmdi-hc-lg"></i>
            <span class="menu-text">Cadastrar Usuário</span>
          </a>
        </li>
        <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-shopping-cart zmdi-hc-lg"></i>
            <span class="menu-text">Mercado</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="consultaMercado.php"><span class="menu-text">Consultar</span></a></li>
          </ul>
        </li>
        
        <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-account zmdi-hc-lg"></i>
            <span class="menu-text">Cliente</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="consultaCliente.php"><span class="menu-text">Consultar</span></a></li>
			<li><a href="pedidos.php"><span class="menu-text">Pedidos</span></a></li>
          </ul>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-file-text zmdi-hc-lg"></i>
            <span class="menu-text">Relatórios</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">

          </ul>
        </li>

        <li class="menu-separator"><hr></li>

        <li>
          <a href="../login.php?sair">
            <i class="menu-icon fa fa-power-off zmdi-hc-lg"></i>
            <span class="menu-text">Sair</span>
          </a>
        </li>
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->
<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
  <div class="navbar-search-inner">
    <form action="#">
      <span class="search-icon"><i class="fa fa-search"></i></span>
      <input class="search-field" type="search" placeholder="search..."/>
    </form>
    <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <i class="fa fa-close"></i>
    </button>
  </div>
  <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">