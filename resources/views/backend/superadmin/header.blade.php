<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Finance</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Finance</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">             
      
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
                $auth_id = Auth::user()->id;
                $current_user = DB::table('superadmin')->where('id', $auth_id)->first();
            ?>
            <img src="{{ URL::to('public/images/superadmin_photos/',$current_user->photo)}}" class="img-circle" width="20" height="24">            
            <span class="hidden-xs"></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
             
               <img src="{{ URL::to('public/images/superadmin_photos/',$current_user->photo)}}" class="img-circle" width="20" height="24">
             
              
              <p>
             {{ $current_user->name }}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                
                  
                </a>
              </div>
              <div class="pull-right">
                <a href="{{ route('superadmin-change-details', $auth_id) }}" class="btn btn-primary">Change Details</a>
                <a href="{{ route('superadmin-logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

