
 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="container" style="float:left;">
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menú</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people"></i><span class="nav-text">Registro</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/users">Usuarios</a></li>
                            <li><a href="/persona">Persona</a></li>
                            <li><a href="/tipo">Tipo de persona</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                  <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-basket-loaded "></i><span class="nav-text">Productos</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/categoria">Categoría</a></li>
                            <li><a href="/articulo">Articulos</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Compra/Venta</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-bag "></i> <span class="nav-text">Ingresos</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/ingreso">Ingreso</a></li>

                        </ul>

                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-basket "></i><span class="nav-text">Ventas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/venta">Venta</a></li>

                        </ul>
                    </li>
                    <br>
                    <li class="nav-label">Mas opciones</li>
                   
                        <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-docs"></i><span class="nav-text">Reportes</span>
                        </a>
                        <ul aria-expanded="false">
                          <li> <a href="{{ route('imprimir') }}">Ventas del Dia</a></li>
                          <li> <a href="{{route('productos')}}">Productos en Existencia</a></li>
                        </ul>
                        </li>
                        <li>
                        <a href="./app-profile.html">
                        <i class="icon-social-facebook "></i><span class="nav-text">Acerca de</span>
                        </a>

</li>



                </ul>
            </div>
        </div>
</div>
        <!--**********************************
            Sidebar end
        ***********************************-->
