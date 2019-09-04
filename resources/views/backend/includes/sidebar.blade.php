<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link {{--}}
{{--                    active_class(Active::checkUriPattern('admin/dashboard'))--}}
{{--                }}" href="{{ route('admin.dashboard') }}">--}}
{{--                    <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                    @lang('menus.backend.sidebar.dashboard')--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-title">--}}
{{--                @lang('menus.backend.sidebar.system')--}}
{{--            </li>--}}

            @if ($logged_in_user->isAdmin())
{{--                <li class="nav-item nav-dropdown {{--}}
{{--                    active_class(Active::checkUriPattern('admin/auth*'), 'open')--}}
{{--                }}">--}}
{{--                    <a class="nav-link nav-dropdown-toggle {{--}}
{{--                        active_class(Active::checkUriPattern('admin/auth*'))--}}
{{--                    }}" href="#">--}}
{{--                        <i class="nav-icon far fa-user"></i>--}}
{{--                        @lang('menus.backend.access.title')--}}

{{--                        @if ($pending_approval > 0)--}}
{{--                            <span class="badge badge-danger">{{ $pending_approval }}</span>--}}
{{--                        @endif--}}
{{--                    </a>--}}

{{--                    <ul class="nav-dropdown-items">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{--}}
{{--                                active_class(Active::checkUriPattern('admin/auth/user*'))--}}
{{--                            }}" href="{{ route('admin.auth.user.index') }}">--}}
{{--                                @lang('labels.backend.access.users.management')--}}

{{--                                @if ($pending_approval > 0)--}}
{{--                                    <span class="badge badge-danger">{{ $pending_approval }}</span>--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{--}}
{{--                                active_class(Active::checkUriPattern('admin/auth/role*'))--}}
{{--                            }}" href="{{ route('admin.auth.role.index') }}">--}}
{{--                                @lang('labels.backend.access.roles.management')--}}
{{--                            </a>--}}
{{--                        </li>--}}


{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="divider"></li>--}}

{{--                <li class="nav-item nav-dropdown {{--}}
{{--                    active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')--}}
{{--                }}">--}}
{{--                        <a class="nav-link nav-dropdown-toggle {{--}}
{{--                            active_class(Active::checkUriPattern('admin/log-viewer*'))--}}
{{--                        }}" href="#">--}}
{{--                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')--}}
{{--                    </a>--}}

{{--                    <ul class="nav-dropdown-items">--}}

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{--}}
{{--                            active_class(Active::checkUriPattern('admin/log-viewer'))--}}
{{--                        }}" href="{{ route('log-viewer::dashboard') }}">--}}
{{--                                @lang('menus.backend.log-viewer.dashboard')--}}
{{--                            </a>--}}
{{--                        </li>--}}


{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{--}}
{{--                            active_class(Active::checkUriPattern('admin/log-viewer/logs*'))--}}
{{--                        }}" href="{{ route('log-viewer::logs.list') }}">--}}
{{--                                @lang('menus.backend.log-viewer.logs')--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                <li class="nav-item">
                    <a class="nav-link {{
                                            active_class(Active::checkUriPattern('admin/auth/user*'))
                                        }}" href="{{ route('admin.visa_rate')}}">
                        @lang(' Visa Rates')
                    </a>
                </li>


                <li class="divider"></li>

                <li class="nav-item">
                    <a class="nav-link {{
                    active_class(Active::checkUriPattern('/hotelmanagement')) }}" href="{{ route('admin.hotel.index') }}">
                        @lang('Hotel Management')
                    </a>
                </li>
                <li class="divider"></li>
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('Transport')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                    active_class(Active::checkUriPattern('admin/vehicle*'))
                                }}" href="{{ route('admin.vehicle')}}">
                                @lang(' Vehicles')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                    active_class(Active::checkUriPattern('admin/auth/user*'))
                                }}" href="{{ route('admin.vehicle_route')}}">
                                @lang(' Route')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                    active_class(Active::checkUriPattern('admin/auth/Vehicals_Routes*'))
                                }}" href="{{ route('admin.vehicalfare.index')}}">
                                @lang('Vehicle Fare')
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{
                                            active_class(Active::checkUriPattern('admin/auth/user*'))
                                        }}" href="{{ route('admin.riyal') }}">
                        @lang('Saudi Riyal Rate')
                    </a>
                </li>

                <li class="divider"></li>


                <li class="nav-item">
                    <a class="nav-link {{
                                            active_class(Active::checkUriPattern('admin/auth/user*'))
                                        }}" href="{{ route('admin.ziarat') }}">
                        @lang('Ziarat Rate')
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('frontend.user.account') }}"
                       class="nav-link {{ active_class(Active::checkRoute('frontend.user.account')) }}">
                        @lang('navs.frontend.user.account')
                    </a>
                </li>


{{--                <li class="divider"></li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link {{--}}
{{--                                    active_class(Active::checkUriPattern('admin/vehicle*'))--}}
{{--                                }}" href="{{ route('admin.vehicle')}}">--}}
{{--                                    @lang(' Vehicles')--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                <li class="divider"></li>--}}

{{--                            <li class="nav-item">--}}
{{--                            <a class="nav-link {{--}}
{{--                                    active_class(Active::checkUriPattern('admin/auth/user*'))--}}
{{--                                }}" href="{{ route('admin.vehicle_route')}}">--}}
{{--                                    @lang(' Route')--}}
{{--                            </a>--}}
{{--                            </li>--}}

{{--                <li class="divider"></li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link {{--}}
{{--                                    active_class(Active::checkUriPattern('admin/auth/Vehicals_Routes*'))--}}
{{--                                }}" href="{{ route('admin.vehicalfare.index')}}">--}}
{{--                        @lang('Vehical Fare')--}}
{{--                    </a>--}}
{{--                </li>--}}

                </li>





            @endif








        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
