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

  <title>RMU Space - จัดการผู้เรียน</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>
    $(function(){
        $.ajax({
            url: URLServ+"/mas-user/UserTypegetByKeyword.php",
            crossDomain: true,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        var typeID = val['AccountTypeID'];
                        var typeName = val['AccountTypeName'];
                        $("#IsUserType").append(new Option(typeName, typeID));

                        //add to modal add
                        $("#IsSelectAddUserType").append(new Option(typeName, typeID));
                        //add to modal edit
                        $("#IsSelectEditUserType").append(new Option(typeName, typeID));
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    });

    function getSearchData() {
        var keyword = document.getElementById("text-search").value;
        var userType = document.getElementById("IsUserType").value;
        if (!$.trim(userType)){
            userType="1";
        }
        $.ajax({
            url: URLServ+"/mas-user/UsergetByKeyword.php?keys="+keyword+"&userType="+userType,
            crossDomain: true,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                //alert("resp : "+data.toString());
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBody").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["UserName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["Password"] + "</td>";

                        if(val["AccountTypeID"]==1){
                            tr = tr + "<td style='color: #0f0f0f'>" + val["UserCF"] + "</td>";
                            tr = tr + "<td>" +
                                "<div class=\"my-2\"></div>" +
                                "<a id=\"todolink\" href=\"#\" class=\"open-ResetBookDialog btn btn-primary btn-icon-split\"data-toggle=\"modal\" data-target=\"#resetModal\"data-id="+val['UserID']+">" +
                                "<span class=\"icon text-white-50\">" +
                                "<i class=\"fas fa-reply\"></i>" +
                                "</span>" +
                                "<span class='text'>"+ "เซ็ตค่าเริ่มต้น" +"</span>" +
                                "</a>" +
                                "</td>";
                        }else{
                            tr = tr + "<td style='color: #0f0f0f'>" + '' + "</td>";
                            tr = tr + "<td style='color: #0f0f0f'>" + '' + "</td>";
                        }
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a id=\"todolink\" href=\"#\" class=\"open-EditBookDialog btn btn-warning btn-icon-split\"data-toggle=\"modal\" data-target=\"#myModalEdit\"data-user="+val['UserID']+">" +
                            "<span class=\"icon text-white-50\">" +
                            "<i class=\"fas fa-edit\"></i>" +
                            "</span>" +
                            "<span class='text'>"+ "แก้ไข" +"</span>" +
                            "</a>" +
                            "</td>";
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a href=\"#\" class=\"open-AddBookDialog btn btn-danger btn-icon-split\"data-toggle=\"modal\" data-target=\"#deleteModal\"data-id="+val["UserID"]+">" +
                            "<span class=\"icon text-white-50\">" +
                            "<i class=\"fas fa-trash\"></i>" +
                            "</span>" +
                            "<span class='text'>"+ "ลบ" +"</span>" +
                            "</a>" +
                            "</td>";

                        tr = tr + "</tr>";
                        $('#myTable > tbody:last').append(tr);
                    });

                }else{
                    //$("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBody").empty();
                    $.each(obj, function (key, val) {
                        i++;
                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'> <center>" + val["UserID"] + "</center></td>";
                        tr = tr + "<td style='color: #0f0f0f'><center>" + val["UserName"] + "</center></td>";
                        tr = tr + "<td style='color: #0f0f0f'><center>" + val["Password"] + "</center></td>";
                        if(val["AccountTypeID"]==1){
                            tr = tr + "<td style='color: #0f0f0f'>" + val["UserCF"] + "</td>";
                            tr = tr + "<td>" +
                                "<div class=\"my-2\"></div>" +
                                "<a id=\"todolink\" href=\"#\" class=\"open-ResetBookDialog btn btn-primary btn-icon-split\"data-toggle=\"modal\" data-target=\"#resetModal\"data-id="+val['UserID']+">" +
                                "<span class=\"icon text-white-50\">" +
                                "<i class=\"fas fa-reply\"></i>" +
                                "</span>" +
                                "<span class='text'>"+ "เซ็ตค่าเริ่มต้น" +"</span>" +
                                "</a>" +
                                "</td>";
                        }else{
                            tr = tr + "<td style='color: #0f0f0f'>" + '' + "</td>";
                            tr = tr + "<td style='color: #0f0f0f'>" + '' + "</td>";
                        }
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a id=\"todolink\" href=\"#\" class=\"open-EditBookDialog btn btn-warning btn-icon-split\"data-toggle=\"modal\" data-target=\"#myModalEdit\"data-user="+val['UserID']+">" +
                            "<span class=\"icon text-white-50\">" +
                            "<i class=\"fas fa-edit\"></i>" +
                            "</span>" +
                            "<span class='text'>"+ "แก้ไข" +"</span>" +
                            "</a>" +
                            "</td>";
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a href=\"#\" class=\"open-AddBookDialog btn btn-danger btn-icon-split\"data-toggle=\"modal\" data-target=\"#deleteModal\"data-id="+val["UserID"]+">" +
                            "<span class=\"icon text-white-50\">" +
                            "<i class=\"fas fa-trash\"></i>" +
                            "</span>" +
                            "<span class='text'>"+ "ลบ" +"</span>" +
                            "</a>" +
                            "</td>";

                        tr = tr + "</tr>";
                        $('#myTable > tbody:last').append(tr);
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    }
    setInterval(getSearchData, 500);


    function getResetData()
    {
        var user_id = document.getElementById("btn_reset_user_id").value;
        $.ajax({
            url: URLServ+"/mas-user/UserResetupByCon.php?keys="+user_id,
            crossDomain: true,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));
                if(obj['IsSuccess']==true){
                    alert("บันทึกสำเร็จ!!");
                }else{
                    alert("บันทึกไม่สำเร็จ!!");
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    }

    //triggered when modal is about to be shown
    $(document).on("click", ".open-ResetBookDialog", function () {
        var myBookId = $(this).data('id');
        $("#reset_user_id").text("Wants to reset this information.");
        $("#btn_reset_user_id").val(myBookId);
    });




    function getDeleteData()
    {
        var user_id = document.getElementById("btn_user_id").value;
        $.ajax({
            url: URLServ+"/mas-user/UserupDelete.php?keys="+user_id,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));
                if(obj['IsSuccess']==true){
                    alert("บันทึกสำเร็จ!!");
                }else{
                    alert("บันทึกไม่สำเร็จ!!");
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    }

    //triggered when modal is about to be shown
    $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        $("#user_id").text("Wants to delete this information.");
        $("#btn_user_id").val(myBookId);
    });


    function getAddData()
    {
        var user_name = document.getElementById("text_userName").value;
        var user_pass = document.getElementById("text_userPass").value;
        var user_type = document.getElementById("IsSelectAddUserType").value;
        if (!$.trim(user_name)||!$.trim(user_pass)||user_type=='0'){
            alert('กรุณากรอกข้อมูลให้ครบ.');
        }else{
            $.ajax({
                url: URLServ+"/mas-user/UserupinsAll.php?UserName="+user_name+"&Password="+user_pass+"&AccountTypeID="+user_type,
                type: "POST",
                data: '',
                contentType: "application/json",
                dataType  : 'json',
                success   : function(data) {
                    var obj = jQuery.parseJSON(JSON.stringify(data));
                    if(obj['IsSuccess']==true){
                        alert("บันทึกสำเร็จ!!");
                    }else{
                        alert("บันทึกไม่สำเร็จ!!");
                    }
                },
                error: function (request, error) {
                    alert(error);
                },
            });
        }

        /*$.ajax({
            url: URLServ+"/mas-user/UserupDelete.php?keys="+user_id,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));
                if(obj['IsSuccess']==true){
                    alert("บันทึกสำเร็จ!!");
                }else{
                    alert("บันทึกไม่สำเร็จ!!");
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });*/
    }


    //triggered when modal is about to be shown
    $(document).on("click", ".open-EditBookDialog", function () {
        $("#text_userName_edit").val('');
        $("#text_userPass_edit").val('');
        $("#text_userCF_edit").val('');

        var myUserID = $(this).data('user');
        $("#btn_accept_edit").val(myUserID);

        $.ajax({
            url: URLServ+"/mas-user/UsergetByCon.php?keys="+myUserID,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var userName = '';
                var password = '';
                var cf = '';

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        userName = val['UserName'];
                        password = val['Password'];
                        cf = val['UserCF'];
                    });
                }
                $("#text_userName_edit").val(userName);
                $("#text_userPass_edit").val(password);
                $("#text_userCF_edit").val(cf);

            },
            error: function (request, error) {
                alert(error);
            },
        });
    });

    function getEditData()
    {
        var user_id = document.getElementById("btn_accept_edit").value;
        var user_name = document.getElementById("text_userName_edit").value;
        var user_pass = document.getElementById("text_userPass_edit").value;
        var user_cf = document.getElementById("text_userCF_edit").value;
        if(!$.trim(user_cf)){
            user_cf = '0';
        }
        if (!$.trim(user_name)||!$.trim(user_pass)){
            alert('กรุณากรอกข้อมูลให้ครบ.');
        }else{
            $.ajax({
                url: URLServ+"/mas-user/UserupByCon.php?UserName="+user_name+"&UserPass="+user_pass+"&UserCF="+user_cf+"&keys="+user_id,
                type: "POST",
                data: '',
                contentType: "application/json",
                dataType  : 'json',
                success   : function(data) {
                    var obj = jQuery.parseJSON(JSON.stringify(data));
                    if(obj['IsSuccess']==true){
                        alert("บันทึกสำเร็จ!!");
                    }else{
                        alert("บันทึกไม่สำเร็จ!!");
                    }
                },
                error: function (request, error) {
                    alert(error);
                },
            });
        }
    }



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
    <li class="nav-item active">
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
    <li class="nav-item">
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
        <h1 class="h3 mb-2 text-gray-800">ระบบจัดการผู้เรียน</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">จัดการผู้เรียน</h6>-->
            <div class="row">
              <div class="col-2">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">
                    <input type="text" id="text-search" name="text-search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" onchange="getSearchData()">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-2">
                <select class="form-control " id="IsUserType" onchange="getSearchData()">
                  <!--<option value="0">All &#45;&#45;ระดับเนื้อหาทั้งหมด&#45;&#45;</option>-->
                </select>
              </div>
              <div class="col-2">
                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModalAdd">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                  <span class="text">เพิ่มผู้เรียน</span>
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>UserID</th>
                  <th>UserName</th>
                  <th>UserPassword</th>
                  <th>CF</th>
                  <th>Reset</th>
                  <th >Edite</th>
                  <th >Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>UserID</th>
                  <th>UserName</th>
                  <th>UserPassword</th>
                  <th>CF</th>
                  <th>Reset</th>
                  <th >Edite</th>
                  <th >Delete</th>
                </tr>
                </tfoot>
                <!--<tbody>-->
                <tbody id="myBody"></tbody>
              </table>
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

<!-- Reset Modal-->
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resetModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="reset_user_id"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" type="button" id="btn_reset_user_id" data-dismiss="modal" onclick="getResetData()">Ok</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="user_id"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" type="button" id="btn_user_id" data-dismiss="modal" onclick="getDeleteData()">Ok</button>
      </div>
    </div>
  </div>
</div>

<!-- The Modal Add User-->
<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="text_userName" aria-describedby="emailHelp" placeholder="Enter UserName...">
            <br>
            <input type="password" class="form-control form-control-user" id="text_userPass" aria-describedby="emailHelp" placeholder="Enter UserPassword...">
            <!--<br>
            <input type="number" class="form-control form-control-user" id="text_userCF" aria-describedby="emailHelp" placeholder="Enter UserCF...">-->
            <br>
            <select class="form-control " id="IsSelectAddUserType">
              <option value="0">--เลือกประเภท user--</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-user btn-block" type="button" id="btn_accept_add" data-dismiss="modal" onclick="getAddData()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- The Modal Edit User-->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="text_userName_edit" aria-describedby="emailHelp" placeholder="Enter UserName...">
            <br>
            <input type="password" class="form-control form-control-user" id="text_userPass_edit" aria-describedby="emailHelp" placeholder="Enter UserPassword...">
            <br>
            <input type="number" class="form-control form-control-user" id="text_userCF_edit" aria-describedby="emailHelp" placeholder="Enter UserCF...">
            <br>
            <select class="form-control " id="IsSelectEditUserType">
              <option value="0">--เลือกประเภท user--</option>
            </select>
            <br>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-user btn-block" type="button" id="btn_accept_edit" data-dismiss="modal" onclick="getEditData()">Save</button>
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
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<!-- Config Server -->
<script src="config-server/config.js"></script>

</body>

</html>
