<!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header  pull-{{dirFull()}}">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">@lang('common.Mata3em')</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-{{revFull()}}">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="material-icons">language</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">@lang('common.Languages')</li>
                            <li class="body">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
                                  <ul class="menu" style="overflow: hidden; width: auto; height: auto;">
                                    <li>
                                        <a href="" class=" waves-effect waves-block">
                                          <div class="icon-circle bg-light-green pull-{{dirFull()}}">
                                              <i class="material-icons">font_download</i>
                                          </div>
                                          <div class="menu-info pull-{{dirFull()}}">
                                              <h4>@lang('common.Arabic')</h4>
                                          </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class=" waves-effect waves-block">
                                          <div class="icon-circle bg-light-green pull-{{dirFull()}}">
                                              <i class="material-icons">explicit</i>
                                          </div>
                                          <div class="menu-info pull-{{dirFull()}}">
                                              <h4>@lang('common.English')</h4>
                                          </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- #Top Bar -->
