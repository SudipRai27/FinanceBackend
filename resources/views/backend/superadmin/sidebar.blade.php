<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
            <?php
                $auth_id = Auth::user()->id;
                $current_user = DB::table('superadmin')->where('id', $auth_id)->first();     
            ?>
        <img src="{{ URL::to('public/images/superadmin_photos/',$current_user->photo)}}" class="img-circle" width="20" height="24">     
       </div>
      <div class="pull-left info">
        <p>{{ $current_user->name }}</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu scrollbar-dynamic">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="{{URL::route('superadmin-home')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Slider Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-slider') }}"><i class="fa fa-circle-o"></i>View Slider</a></li>
          <li class="treeview-item"><a href="{{ route('create-slider') }}"><i class="fa fa-circle-o"></i>Create Slider</a></li>
          
        </ul>
      </li> 
      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>News Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-news') }}"><i class="fa fa-circle-o"></i>View News</a></li>
          <li class="treeview-item"><a href="{{ route('create-news') }}"><i class="fa fa-circle-o"></i>Create News</a></li>
          
        </ul>
      </li> 

      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Forex Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-forex') }}"><i class="fa fa-circle-o"></i>View Forex</a></li>
        <li class="treeview-item"><a href="{{ route('create-forex') }}"><i class="fa fa-circle-o"></i>Create Forex</a></li> 
        </ul>
      </li> 

      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Team Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-team') }}"><i class="fa fa-circle-o"></i>View Team</a></li>
        <li class="treeview-item"><a href="{{ route('create-team') }}"><i class="fa fa-circle-o"></i>Create Team</a></li> 
        </ul>
      </li> 

      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Gallery Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-gallery') }}"><i class="fa fa-circle-o"></i>View Photos</a></li>
        <li class="treeview-item"><a href="{{ route('create-gallery') }}"><i class="fa fa-circle-o"></i>Upload Photos</a></li> 
        </ul>
      </li> 

      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Services Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-services') }}"><i class="fa fa-circle-o"></i>View Services</a></li>
        <li class="treeview-item"><a href="{{ route('create-services') }}"><i class="fa fa-circle-o"></i>Create Services</a></li> 
        </ul>
      </li> 

       <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Testimonial Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-testimonial') }}"><i class="fa fa-circle-o"></i>View Testimonial</a></li>
        <li class="treeview-item"><a href="{{ route('create-testimonial') }}"><i class="fa fa-circle-o"></i>Create Testimonial</a></li> 
        </ul>
      </li>

      <li class="treeview">
        <a href="{{URL::route('calculate-emi')}}">
          <i class="fa fa-dashboard"></i> <span>Calculate EMI</span>
        </a>
      </li>

       <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>File Manager </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('list-documents') }}"><i class="fa fa-circle-o"></i>View Files</a></li>
        <li class="treeview-item"><a href="{{ route('create-documents') }}"><i class="fa fa-circle-o"></i>Upload Files</a></li> 
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Configuration </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('update-general-settings') }}"><i class="fa fa-circle-o"></i>General Settings</a></li>
        <li class="treeview-item"><a href="{{ route('list-youtube-videos') }}"><i class="fa fa-circle-o"></i>Youtube Videos / Settings </a></li>
        <li class="treeview-item"><a href="{{ route('map-view-settings') }}"><i class="fa fa-circle-o"></i>Map Settings </a></li>
        <li class="treeview-item"><a href="{{ route('facebook-widget-view-settings') }}"><i class="fa fa-circle-o"></i>Facebook Settings </a></li>
        </ul>
      </li>

       <li class="treeview">
        <a href="#">
          <i class="fa fa-globe"></i>
          <span>Page Content Settings </span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li class="treeview-item"><a href="{{ route('page-settings') }}"><i class="fa fa-circle-o"></i>Pages</a></li>
        
        </ul>
      </li>




    </ul>

  </section>
  <!-- /.sidebar -->
</aside>