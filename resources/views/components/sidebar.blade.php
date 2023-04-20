<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=FFF&background=263238&bold=true"
                            width="50" height="50" class="rounded-circle" alt="{{ auth()->user()->name }}">
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ auth()->user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-envelop2 font-size-sm"></i> {{ auth()->user()->email }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>Tablero</span>
                    </a>
                </li>
   
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">RECURSOS HUMANOS</div>
                        <i class="icon-menu" title="Forms"></i>
                    </li>

                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-cog"></i> <span>Codificador</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Recursos Humanos - Codificador">

                            <li class="nav-item">
                                <a href="{{ route('recursoshumanos.personal.index') }}" class="nav-link">
                                    <i class="icon-checkmark2"></i> Personal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('recursoshumanos.prueba.index') }}" class="nav-link">
                                    <i class="icon-checkmark2"></i> Prueba
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-clipboard2"></i> <span>Registro</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Logistica">
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link">
                                    <i class="icon-checkmark2"></i>Salida de Personal</a>
                                <ul class="nav nav-group-sub">

                                    <li class="nav-item">
                                        <a href="{{ route('recursoshumanos.salidapersonal.vacacion.index') }}"
                                            class="nav-link">
                                            <i class="icon-certificate"></i> Vacaci&oacute;n
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('recursoshumanos.compensacion.index') }}" class="nav-link">
                                            <i class="icon-certificate"></i> Compensacion
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('recursoshumanos.reemplazo.index') }}" class="nav-link">
                                            <i class="icon-certificate"></i> Reemplazo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('recursoshumanos.cambioturno.index') }}" class="nav-link">
                                            <i class="icon-certificate"></i> Cambio Turno
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('recursoshumanos.descanso.index') }}" class="nav-link">
                                            <i class="icon-certificate"></i> Descanso
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('recursoshumanos.vacacioncalculo.index') }}" class="nav-link">
                                            <i class="icon-certificate"></i> Vacacion Calculo
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
