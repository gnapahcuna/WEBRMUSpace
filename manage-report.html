<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['UserID'])) {
header('Location: Login_v14/index.html');
}?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RMU Space - จัดการรายงาน</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<script>
    function getSearchData() {
        var keyword = document.getElementById("text-search").value;
        $.ajax({
            url: URLServ+"/mas-user/UsergetByKeyword.php?keys="+keyword+"&userType=1",
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                //alert("resp : "+data.toString());
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTableUser tbody tr:not(:first-child)").remove();
                    $("#myBodyUser").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + i + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserName"] + "</td>";
                        tr = tr + "</tr>";
                        $('#myTableUser > tbody:last').append(tr);
                    });

                }else{
                    //$("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBodyUser").empty();
                    $.each(obj, function (key, val) {
                        i++;
                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + i + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserName"] + "</td>";
                        tr = tr + "</tr>";
                        $('#myTableUser > tbody:last').append(tr);
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });

        $.ajax({
            url: URLServ+"/ops-log/CurrentLogByKeyword.php?keys="+keyword,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                //alert("resp : "+data.toString());
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTableCurrent tbody tr:not(:first-child)").remove();
                    $("#myBodyCurrent").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["SubTopicReach"] + "</td>";
                        /*tr = tr + "<td style='color: #0f0f0f'>" + '0' + "</td>";*/
                        tr = tr + "</tr>";
                        $('#myTableCurrent > tbody:last').append(tr);
                    });

                }else{
                    //$("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBodyCurrent").empty();
                    $.each(obj, function (key, val) {
                        i++;
                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["SubTopicReach"] + "</td>";
                        /*tr = tr + "<td style='color: #0f0f0f'>" + '0' + "</td>";*/
                        tr = tr + "</tr>";
                        $('#myTableCurrent > tbody:last').append(tr);
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });

        //user pass
        $.ajax({
            url: URLServ+"/ops-log/UserPassStudyLogByKeyword.php?keys="+keyword,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                //alert("resp : "+data.toString());
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTablePassCurrent tbody tr:not(:first-child)").remove();
                    $("#myBodyPassCurrent ").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["SubTopicName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["NumberOfRepeated"] + "</td>";
                        tr = tr + "</tr>";
                        $('#myTablePassCurrent  > tbody:last').append(tr);
                    });

                }else{
                    //$("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBodyPassCurrent ").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["SubTopicName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["NumberOfRepeated"] + "</td>";
                        tr = tr + "</tr>";
                        $('#myTablePassCurrent  > tbody:last').append(tr);
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });

        //แบบฝึกหัด
        $.ajax({
            url: URLServ+"/ops-log/ExerciseLogByKeyword.php?keys="+keyword,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                //alert("resp : "+data.toString());
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTableExercise tbody tr:not(:first-child)").remove();
                    $("#myBodyExercise").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var answer ='';
                        if(parseInt(val['Answer'])==1){
                            answer ='True';
                        }else{
                            answer ='False';
                        }

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["ExerciseID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + answer + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["Q"] + "</td>";
                        tr = tr + "</tr>";
                        $('#myTableExercise > tbody:last').append(tr);
                    });

                }else{
                    //$("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBodyExercise").empty();
                    $.each(obj, function (key, val) {
                        i++;
                        var answer ='';
                        if(parseInt(val['Answer'])==1){
                            answer ='True';
                        }else{
                            answer ='False';
                        }

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["ExerciseID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + answer + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["Q"] + "</td>";
                        tr = tr + "</tr>";
                        $('#myTableExercise > tbody:last').append(tr);
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });


        //ข้อสอบ
        $.ajax({
            url: URLServ+"/ops-log/QuestionLogByKeyword.php?keys="+keyword,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                //alert("resp : "+data.toString());
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTableQuestion tbody tr:not(:first-child)").remove();
                    $("#myBodyQuestion").empty();
                    $.each(obj, function (key, val) {
                        i++;
                        var answer ='';
                        if(parseInt(val['Answer'])==1){
                            answer ='True';
                        }else{
                            answer ='False';
                        }

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["QuestionID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + answer + "</td>";
                        tr = tr + "</tr>";
                        $('#myTableQuestion > tbody:last').append(tr);
                    });

                }else{
                    //$("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBodyQuestion").empty();
                    $.each(obj, function (key, val) {
                        i++;
                        var answer ='';
                        if(parseInt(val['Answer'])==1){
                            answer ='True';
                        }else{
                            answer ='False';
                        }

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["QuestionID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + answer + "</td>";
                        tr = tr + "</tr>";
                        $('#myTableQuestion > tbody:last').append(tr);
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    }
    setInterval(getSearchData, 500);
</script>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-img rotate-n-15">
          <img src="img/logo.png" class="img-responsive logo">
        </div>
        <div class="sidebar-brand-text mx-3">RMU-Space</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="manage-user.php">
          <i class="fas fa-fw fa fa-user"></i>
          <span>จัดการผู้เรียน</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="manage-content-nav-2.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>การจัดการเนื้อหา</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="manage-unit.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>การจัดการหน่วยเวลา</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="manage-report.php">
          <i class="fas fa-fw fa-table"></i>
          <span>การจัดการรายงาน</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>ออกจากระบบ</span></a>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <a class="text-center">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['UserName']; ?></span>
              <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
            </a>

          </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ระบบจัดการรายงาน</h1>

          <div class="col-2">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-200 navbar-search">
              <div class="input-group">
                <input type="text" id="text-search" name="text-search" class="form-control bg-light border-0 small" placeholder="Search for ..." aria-label="Search" aria-describedby="basic-addon2" onchange="getSearchData()">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>

          <br>
          <div class="row">
            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">ผู้เรียน</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="myTableUser" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>UserID</th>
                        <th>UserName</th>
                      </tr>
                      </thead>
                      <!--<tbody>-->
                      <tbody id="myBodyUser"></tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <a href="#" class="open-AddVideoDialog btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModalAddVideo">
                    <!--<span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>-->
                  <span class="text">ออกรายงาน</span>
                </a>
              </div>
              <!-- Brand Buttons -->
              <!--<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
                </div>
                <div class="card-body">
                  <p>Google and Facebook buttons are available featuring each company's respective brand color. They are used on the user login and registration pages.</p>
                  <p>You can create more custom buttons by adding a new color variable in the <code>_variables.scss</code> file and then using the Bootstrap button variant mixin to create a new style, as demonstrated in the <code>_buttons.scss</code> file.</p>
                  <a href="#" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i> .btn-google</a>
                  <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f fa-fw"></i> .btn-facebook</a>

                </div>
              </div>-->

            </div>

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">กำลังเรียนอยู่ที่</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="myTableCurrent" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                        <th>UserID</th>
                        <th>Topic-reach</th>
                        <!--<th>Current Repeated</th>-->
                      </tr>
                      </thead>
                      <!--<tbody>-->
                      <tbody id="myBodyCurrent"></tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">ที่เรียนผ่านมาแล้ว</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="myTablePassCurrent" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                        <th>UserID</th>
                        <th>Topic-reach</th>
                        <th>Number of Repeated</th>
                      </tr>
                      </thead>
                      <!--<tbody>-->
                      <tbody id="myBodyPassCurrent"></tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">บันทึกการทำแบบฝึกหัด</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="myTableExercise" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                        <th>UserID</th>
                        <th>PracticelID</th>
                        <th>Answer</th>
                        <th>Q</th>
                      </tr>
                      </thead>
                      <!--<tbody>-->
                      <tbody id="myBodyExercise"></tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">บันทึกการทำข้อสอบ</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="myTableQuestion" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                        <th>UserID</th>
                        <th>QuestionID</th>
                        <th>Answer</th>
                      </tr>
                      </thead>
                      <!--<tbody>-->
                      <tbody id="myBodyQuestion"></tbody>
                    </table>
                  </div>
                </div>
              </div>


            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RMU Space 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <!-- Config Server -->
  <script src="config-server/config.js"></script>

</body>

</html>
