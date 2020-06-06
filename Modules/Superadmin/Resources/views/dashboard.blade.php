@extends('backend.superadmin.main')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     My Dashboard
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>12</h3>
            <p>Upcoming Events</p>
          </div>
          <div class="icon">
            <i class="ion ion-trophy"></i>
          </div>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>12</h3>
            <p>Unread Message</p>
          </div>
          <div class="icon">
            <i class="fa fa-fw fa-envelope"></i>
          </div>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>12</h3>
            <p>Teachers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>12</h3>
            <p>Total Students</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-contacts"></i>
          </div>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
      <section class="col-lg-6">              
        <div class="box box-primary"><!-- box upcoming events starts -->
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Upcoming Events</h3>
          </div>
          
         
          <div class="box-body">
              <ul class="todo-list">
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <span class="text"><a href=""></a></span>
                  <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                </li>
              </ul>
          </div>
          

        </div><!-- box upcoming events ends -->      
        <div class="box box-warning"><!-- box upcoming events starts -->
          <div class="box-header">
            <i class="fa fa-fw fa-bullhorn"></i>
            <h3 class="box-title"></h3>
            <div class="box-body">
              <p></p>
              <p>
                <a href="" class="btn btn-danger btn-sm btn-flat" data-toggle="tooltip" title="Delete">
                  <i class="fa fa-trash"></i> Delete
                </a>
              </p>
            </div>
          </div>
        </div><!-- notice box ends -->   
        <div class="box box-info">
          <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Set Notice</h3>
          </div>
          <div class="box-body">
            <form action="#" method="post">
              
              <div class="form-group">
                <input type="text" class="form-control"  id = "notice_title" name="notice_title" placeholder="Title"/>
              </div>
              <div>
                <textarea class="myArea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name = "notice_body"  id = "notice_body" ></textarea>
              </div>
            </form>
          </div>
          <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendNotice">Notify <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>

      </section>
      <section class="col-lg-6 connectedSortable ui-sortable">
        
         <!-- quick email widget -->

        <div class="box box-info">
          <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Quick Message</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#find-id" ><i class="fa fa-search"></i> Find ID</a>
            </div><!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <input type="hidden" id="message_to_group" name="message_to_group" value="superadmin" />
              <div class="form-group">
                <!-- <input type="text" class="form-control" id = "message_to_id" name="message_to_id" placeholder="Insert ID :"/> -->
                <input type="text" class="form-control" id = "message_to_username" name="message_to_username" placeholder="Insert Username :"/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control"  id = "message_subject" name="message_subject" placeholder="Subject"/>
              </div>
              <div>
                <textarea class="myArea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name = "message"  id = "message" ></textarea>
              </div>
            </form>
          </div>
          <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>
        <!-- quick email ends -->
        <!-- modal starts -->
        <div id="find-id" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ID Finder</h4>
              </div>
              <div class="modal-body">
                <div class="form-group ">
                  <label>To</label>
                  
                </div>
                <div class="row">                  
                  <div class="col-sm-6">
                    <div class="form-group ">
                      <label>Class</label>
                    
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label>Section</label>
                    <select class="form-control" id = "find_section_id">
                      <option>-- Select Class First --</option>
                    </select>
                  </div>                  
                </div> <!-- row ends -->
                <div>
                    <div class="form-group">
                      <button type = "button" class = "btn btn-info btn-flat" id = "find_search">
                      <i class="fa fa-fw fa-search"></i> Search</button>
                      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                <div id = "find_result">
                </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>
        <!-- modal ends -->
      </section>
    </div><!-- row ends -->

  </section><!-- /.content -->
@stop        

