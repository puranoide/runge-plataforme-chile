<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin.php">
                <div class="sidebar-brand-icon">
                    <img src="../../../../assetspersonal/img/logorunge.jpg" alt=""  width="60"
                    height="50">
                </div>
                <div class="sidebar-brand-text mx-3">Admin runge</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            

            <!-- Heading -->
            <div class="sidebar-heading">
                Modulos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Envios</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de envios</h6>
                        <a class="collapse-item" href="../enviosviews/ViewEnvios.php">Ver envios</a>
                        <a class="collapse-item" href="../enviosviews/viewAgregarEnvio.php">Agregar envio</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesingresosManuales"
                    aria-expanded="true" aria-controls="collapsePagesingresosManuales">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Ingresos</span>
                </a>
                <div id="collapsePagesingresosManuales" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de ingresos</h6>
                        <a class="collapse-item" href="../ingresosmanualesviews/viewIngresosManuales.php">Ver ingresos Manuales</a>
                        <a class="collapse-item" href="../ingresosmanualesviews/viewAgregarIngresoManual.php">Agregar ingreso manual</a>
                     
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesEgresosManuales"
                    aria-expanded="true" aria-controls="collapsePagesingresosManuales">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Egresos</span>
                </a>
                <div id="collapsePagesEgresosManuales" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de ingresos</h6>
                        <a class="collapse-item" href="../egresosmanualesviews/viewEgresosManuales.php">Ver egresos Manuales</a>
                        <a class="collapse-item" href="../egresosmanualesviews/viewAgregarEgresoManual.php">Agregar egresos manual</a>
                     
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagescamiones"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Camiones</span>
                </a>
                <div id="collapsePagescamiones" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="viewbusquedacamion.php">Buscar camion</a>
                        <a class="collapse-item" href="viewAgregarEgresoCamion.php">Nuevo egreso-camion</a>
                        <a class="collapse-item" href="viewListadoEgresoCamion.php">Egreso por camion</a>
                        <div class="collapse-divider"></div>
                 
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesempleados"
                    aria-expanded="true" aria-controls="collapsePagesingresosManuales">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Personal</span>
                </a>
                <div id="collapsePagesempleados" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">manejo de ingresos</h6>
                        <a class="collapse-item" href="../empleadosviews/listempleadosViews.php">Ver personal</a>
                     
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>