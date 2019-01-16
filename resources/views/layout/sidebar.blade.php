<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
              <img width="48" height="48" src="{{asset("new/en/images/user.png")}}" alt="User">
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{currentUser()->name}}</div>
                <div class="email">{{currentUser()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-{{revfull()}}">
                        <!-- <li><a href="#"><i class="material-icons">person</i>Profile</a></li> -->
                        <!-- <li role="separator" class="divider"></li> -->
                        <li><a href="{{route('logout')}}"><i class="material-icons">input</i>@lang('settings.Sign Out')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
              <li class='{{active($active, 'Home')}}'>
                  <a href="{{route('index')}}" class="toggled waves-effect waves-block">
                    <i class="material-icons">home</i>
                    <span>@lang('sidebar.Home')</span>
                  </a>
              </li>
              <li class='{{active($active, 'Dish Categories')}} {{active($active, 'Dishes')}} {{active($active, 'Dishes Units')}}'>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                  <i class="material-icons fas fa-book-reader"></i>
                  <span>@lang('sidebar.Menue')</span>
                </a>
                <ul class="ml-menu">
                  <li class='{{active($active, 'Dish Categories')}}'>
                    <a href="{{route('menue.dish-categories.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Dishes Categories')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Dishes Units')}}'>
                    <a href="{{route('menue.dishes-units.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Dishes Units')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Dishes')}}'>
                    <a href="{{route('menue.dishes.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Dishes')</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class='{{active($active, 'Clients')}}'>
                  <a href="{{route('clients.index')}}" class="toggled waves-effect waves-block">
                    <i class="material-icons">people</i>
                    <span>@lang('sidebar.Clients')</span>
                  </a>
              </li>
              <li class='{{active($active, 'Orders')}} {{active($active, 'Delivered Orders')}} {{active($active, 'Kitchen Orders')}}'>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                  <i class="material-icons fas fa-file-invoice"></i>
                  <span>@lang('sidebar.Orders')</span>
                </a>
                <ul class="ml-menu">
                  <li class='{{active($active, 'Orders')}} '>
                    <a href="{{route('orders.orders.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Orders')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Delivered Orders')}}'>
                    <a href="{{route('orders.orders.delivered')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Delivered Orders')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Kitchen Orders')}}'>
                    <a href="{{route('orders.orders.kitchen')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Kitchen Orders')</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class='{{active($active, 'Petty Accounts')}} {{active($active, 'Periodic Accounts')}} {{active($active, 'Daily Accounts')}} {{active($active, 'Accounts By Duration')}}'>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                  <i class="material-icons fas fa-file-invoice-dollar"></i>
                  <span>@lang('sidebar.Accounting')</span>
                </a>
                <ul class="ml-menu">
                  <li class='{{active($active, 'Petty Accounts')}}'>
                    <a href="{{route('accounts.petty-accounts.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Petty Accounts')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Periodic Accounts')}}'>
                    <a href="{{route('accounts.periodic-accounts.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Periodic Accounts')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Daily Accounts')}}'>
                    <a href="{{route('accounts.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Daily Accounts')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Accounts By Duration')}}'>
                    <a href="{{route('accounts.by-duration')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Accounts By Duration')</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class='{{active($active, 'General Data')}} {{active($active, 'Bill Settings')}} {{active($active, 'Users')}}'>
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                  <i class="material-icons">settings</i>
                  <span>@lang('sidebar.Settings')</span>
                </a>
                <ul class="ml-menu">
                  <li class='{{active($active, 'General Data')}} '>
                    <a href="{{route('settings.general-data.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.General Data')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Bill Settings')}}'>
                    <a href="{{route('settings.bill.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Bill Settings')</span>
                    </a>
                  </li>
                  <li class='{{active($active, 'Users')}}'>
                    <a href="{{route('settings.users.index')}}" class='waves-effect waves-block'>
                      <span>@lang('sidebar.Users')</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
        <!-- #END# Left Sidebar -->
</section>
