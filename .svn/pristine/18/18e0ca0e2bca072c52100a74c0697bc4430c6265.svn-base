    @extends('panelViews::master')
    @section('bodyClass', 'dashboard')
    @section('body')
        <?php
        $urls = \Config::get('panel.panelControllers');
        $linkItems  = \Serverfireteam\Panel\libs\dashboard::getItems();
        ?>

        <!-- defition de l'icone loading !-->

        <div class="loading">
            <h1> LOADING </h1>
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0">

                <!-- /.navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed btn-resp-sidebar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>


                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar " role="navigation">
                    <div class="sidebar-nav navbar-collapse collapse " id="bs-example-navbar-collapse-1">
                        <div class="grav center"><img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::guard('panel')->user()->email ) ) )}}?d=mm&s=128" ><a href="#"><span> {{ \Lang::get('panel::fields.change') }}</span></a></div>


                        <div class="user-info"> <a href="{{url('panel/edit')}}">{{Auth::guard('panel')->user()->first_name.' '.Auth::guard('panel')->user()->last_name}}</a></div>
                        <div class="user-info">

                            <!--  recuperer la date !-->
                            <?php
                            $date = date("d-m-Y");
                            echo(" $date ");
                            ?>

                        </div>
                        <!--  definir le bouton pour acceder a la partie client  !-->
                        <a class="visit-site" href="{{$app['url']->to('/')}}">{{ \Lang::get('panel::fields.visiteSite') }}  </a>
                        <ul class="nav" id="side-menu">
                            <li class="{{ (Request::url() === url('panel')) ? 'active' : '' }}">
                                <!-- premier link !-->
                                <a title="Home"  href="{{ url('panel') }}" ><i class="fa fa-home fa-2x"></i>  <strong>{{ \Lang::get('panel::fields.dashboard') }}</strong></a>
                            </li>

                            @foreach($linkItems as $linkItem)
                            <?php
                            $isActive = Request::segment(2) == $linkItem['modelName'];

                            ?>
                                    <!--@ if(($linkItem['title'] != 'BikeLocks'))!-->

                            <li class="s-link {{ $isActive ? 'active' : '' }}">
                                <a href="{{ url($linkItem['showListUrl']) }}" class="{{ $isActive ? 'active' : '' }}">

                                    @if($linkItem['title']=='Bikes')
                                        <i class="fa fa-circle-o fa-spin"></i>
                                        <i class="fa fa-circle-o fa-spin fa-2x"></i>
                                    @elseif($linkItem['title']=='Users')
                                        <i class="fa fa-users  fa-2x"></i>
                                    @elseif($linkItem['title']=='Historys')
                                        <i class="fa fa-spinner fa-spin fa-2x"></i>


                                    @endif


                                    <!-- enlever link a gauche et biklocks  !-->
                                    @if(($linkItem['title'] == 'Links')||($linkItem['title'] == 'BikeLocks'))
                                        <div> <a href="#"> </a> </div>
                                    @else
                                        <strong> {{{$linkItem['title']}}} </strong>
                                </a>
                                <span class="badge pull-right">{!!$linkItem['count']!!}</span>
                                <div class="items-bar">
                                    <a href="{{ url($linkItem['addUrl']) }}" class="ic-plus" title="Add" ></a>
                                    <a title="List" class="ic-lines" href="{{ url($linkItem['showListUrl']) }}" ></a>
                                </div>
                                @endif <!-- fin fu if enlever link agauche !-->
                            </li>

                            <!--   @ endif !-->

                            @endforeach
                        </ul>

                        </li>
                        </ul>
                    </div>



                </div>
                <!-- /.navbar-static-side -->





            </nav>
            <div class="powered-by"><a href="https://www.facebook.com/PDP.pret.de.velo/?skip_nax_wizard=true" target="_blank" >Visiter la page Facebook.</a></div>









                <div id="page-wrapper">

                    <!-- Menu Bar -->
                    <div class="row">
                        <div class="col-xs-12 text-a top-icon-bar">
                            <div class="btn-group" role="group" aria-label="...">
                                <div class="btn-group" role="group">
                                    <a  type="button" class="btn btn-default dropdown-toggle main-link" data-toggle="dropdown" aria-expanded="false">
                                        {{ Lang::get('panel::fields.settings') }}
                                        <span class="fa fa-cogs fa-spin"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{url('panel/edit')}}"><span class="fa fa-user fa-2x "></span>{{ Lang::get('panel::fields.ProfileEdit') }}</a></li>
                                        <li><a href="{{url('panel/changePassword')}}"><span class="fa fa-key fa-spin fa-2x"></span>{{ Lang::get('panel::fields.ChangePassword') }}</a></li>
                                    </ul>
                                </div>
                                <a href="{{url('panel/logout')}}" type="button" class="btn btn-default main-link">{{ Lang::get('panel::fields.logout') }}<span class="icon  ic-switch"></span></a>
                            </div>
                        </div>
                    </div>


                @yield('page-wrapper')




            </div>
        </div>

        <div>
            <footer>
                <p class="text-center-sofiane">&copy; 2015/2016 Company, Inc.</p>
            </footer>
        </div>

        <!-- /#page-wrapper -->

        </div>
    @stop

