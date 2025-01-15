
<div class="sidebar" data-background-color="light">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="light">
            <a href="../Web/index.php" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.png"
                alt="navbar brand"
                class="navbar-brand"
                height="109"
                width="120"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right text-dark"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left text-dark"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt text-dark"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a
                  data-bs-toggle="collapse"
                  href="../Web/index.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Inicio</p>
                  <span class="caret"></span>
                </a>
                <!-- <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li> -->
                      <!-- <a href="../Web/index.php" href="#dashboard"
                      class="collapsed" aria-expanded="false">
                        <span class="caret">
                          <p>Inicio</p>
                        </span>
                        
                      </a> -->
                    <!-- </li>
                  </ul> -->
                <!-- </div> -->
              </li>
            
              <?php if ($_SESSION['rol'] == 1) { ?>
  <li class='nav-item'>
    <a data-bs-toggle='collapse' href='#base'>
      <i class='fas fa-layer-group text-dark'></i>
      <p class='text-dark'>Usuario</p>
      <span class='caret text-dark'></span>
    </a>
    <div class='collapse' id='base'>
      <ul class='nav nav-collapse'>
        <li>
          <a href='<?php echo getUrl('Usuarios', 'Usuarios', 'getCreateAdmin'); ?>'>
            <span class='sub-item'>Registrar</span>
          </a>
        </li>
        <li>
          
        <a href='<?php echo getUrl("Usuarios", "Usuarios", "getUsuarios"); ?>'>
            <span class='sub-item' id='consultar'>Consultar</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
<?php } ?>

              
              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-th-list text-dark"></i>
                  <p  class="text-dark">Registrar Solicitudes</p>
                  <span class="caret text-dark"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                    <li>
                      <a href="<?php echo getUrl("Solicitudes","Solicitudes","getSoli");?>">
                        <span class="sub-item">Solicitudes</span>
                      </a>
                    </li>
                   
                  </ul>
                </div>
                
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                  <i class="fas fa-pen-square text-dark"></i>
                  <p class="text-dark">Consultar Solicitudes</p>
                  <span class="caret text-dark"></span>
                </a>
                <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                    <li>
                      <a href="<?php echo getUrl("Solicitudes","Solicitudes","getSoliConsult");?>">
                        <span class="sub-item">Solicitudes</span>
                      </a>
                    </li>
                   
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars text-dark"></i>
                  <p class="text-dark">PQRS</p>
                  <span class="caret text-dark"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="<?php echo getUrl("pqrs","pqrs","getPQRS");?>">
                        <span class="sub-item text-dark">Consultar PQRS</span>
                      </a>
                    </li>

                    <li>
                      <a href="<?php echo getUrl("pqrs","pqrs","getCreatePQRS");?>">
                        <span class="sub-item text-dark">Registrar PQRS</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
             
            </ul>
          </div>
        </div>
      </div>