
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
              <li class="nav-item active">
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
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section text-dark">Components</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group text-dark"></i>
                  <p class="text-dark">Usuario</p>
                  <span class="caret text-dark"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <!-- <li>
                      <a href="components/avatars.html">
                        <span class="sub-item">Registrar</span>
                      </a>
                    </li> -->
                    <li>
                      <a href="<?php echo getUrl("Usuarios","Usuarios","getUsuarios");?>">
                        <span class="sub-item" id="consultar">Consultar</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                  <i class="fas fa-th-list text-dark"></i>
                  <p  class="text-dark">Registrar Solicitudes</p>
                  <span class="caret text-dark"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                  <li>
                      <a href="<?php echo getUrl("Solicitudes","Solicitudes","getSoli"); ?>">
                        <span class="sub-item text-dark">Solicitudes</span>
                      </a>
                    </li>
                    <li>
                      <!-- <a href="<?php echo getUrl("Accidente","Accidente","getCreate");?>">
                        <span class="sub-item text-dark">Accidentes</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("Senializacion", "Senializacion", "getCreate");?>">
                        <span class="sub-item text-dark">Nueva señalizacion</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("SenializacionM", "SenializacionM", "getCreate");?>">
                        <span class="sub-item text-dark">Señalizacion en mal estado</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("Reductor", "Reductor", "getCreate");?>">
                        <span class="sub-item text-dark">Reductor nuevo</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("ReductorM", "ReductorM", "getCreate");?>">
                        <span class="sub-item text-dark">Reductor en mal esatdo</span>
                      </a>
                    </li>
                    <li>
                    <a href="<?php echo getUrl("viaMalEstado","viaMalEstado","getCreate");?>">
                        <span class="sub-item text-dark">Via publica en mal estado</span>
                      </a>
                    </li>

                    <li>
                      <a href="<?php echo getUrl("pqrs","pqrs","getCreate");?>">
                        <span class="sub-item text-dark">PQRS</span>
                      </a>
                    </li> -->
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
                    <!-- <li>
                      <a href="<?php echo getUrl("Senializacion","Senializacion","getSenializacion");?>">
                        <span class="sub-item">Nueva señalizacion</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("SenializacionM","SenializacionM","getSenializacionM");?>">
                        <span class="sub-item">Señalizacion en mal estado</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("Reductor","Reductor","getReductor");?>">
                        <span class="sub-item">Reductor nuevo</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("ReductorM","ReductorM","getReductorM");?>">
                        <span class="sub-item">Reductor en mal esatdo</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("ViaMalEstado","ViaMalEstado","getViaM");?>">
                        <span class="sub-item">Via publica en mal estado</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo getUrl("pqrs","pqrs","getPQRS");?>">
                        <span class="sub-item">PQRS</span>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Tables</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="tables/tables.html">
                        <span class="sub-item">Basic Table</span>
                      </a>
                    </li>
                    <li>
                      <a href="tables/datatables.html">
                        <span class="sub-item">Datatables</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#maps">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>Maps</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="maps">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="maps/googlemaps.html">
                        <span class="sub-item">Google Maps</span>
                      </a>
                    </li>
                    <li>
                      <a href="maps/jsvectormap.html">
                        <span class="sub-item">Jsvectormap</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#charts">
                  <i class="far fa-chart-bar"></i>
                  <p>Charts</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="charts/charts.html">
                        <span class="sub-item">Chart Js</span>
                      </a>
                    </li>
                    <li>
                      <a href="charts/sparkline.html">
                        <span class="sub-item">Sparkline</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="widgets.html">
                  <i class="fas fa-desktop"></i>
                  <p>Widgets</p>
                  <span class="badge badge-success">4</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../documentation/index.html">
                  <i class="fas fa-file"></i>
                  <p>Documentation</p>
                  <span class="badge badge-secondary">1</span>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Menu Levels</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>