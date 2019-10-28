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

  <title>RMU Space - จัดการเนื้อหา</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>
    function getSearchData() {
        var keyword = document.getElementById("text-search").value;
        var level = document.getElementById("IsLevel").value;
        var topic = document.getElementById("IsTopic").value;
        var subtopic = document.getElementById("IsSubTopic").value;

        $.ajax({
            url: URLServ+"/mas-video/VideogetByKeyword.php?keys="+keyword+"&level="+level+"&topic="+topic+"&subtopic="+subtopic,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var i=0;
                if(obj != '') {
                    $("#myTable tbody tr:not(:first-child)").remove();
                    $("#myBody").empty();
                    $.each(obj, function (key, val) {
                        i++;

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["VideoID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["VideoName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["URL"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["LevelName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["SubTopicName"] + "</td>";
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a id=\"todolink\" href=\"#\" class=\"open-EditVideoDialog btn btn-warning btn-icon-split\"data-toggle=\"modal\" data-target=\"#myModalEditVideo\"data-id="+val['VideoID']+">" +
                            "<span class=\"icon text-white-50\">" +
                            "<i class=\"fas fa-edit\"></i>" +
                            "</span>" +
                            "<span class='text'>"+ "แก้ไข" +"</span>" +
                            "</a>" +
                            "</td>";
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a href=\"#\" class=\"open-DeleteVideoDialog btn btn-danger btn-icon-split\"data-toggle=\"modal\" data-target=\"#deleteVideoModal\"data-id="+val["VideoID"]+">" +
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
                        var status = '';
                        if(val["IsActive"]==1){
                            status = 'ใช้งาน'
                        }else{
                            status = 'ไม่ใช้งาน'
                        }

                        var tr = "<tr>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["VideoID"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["VideoName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["URL"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["LevelName"] + "</td>";
                        tr = tr + "<td style='color: #0f0f0f'>" + val["SubTopicName"] + "</td>";
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a id=\"todolink\" href=\"#\" class=\"open-EditVideoDialog btn btn-warning btn-icon-split\"data-toggle=\"modal\" data-target=\"#myModalEditVideo\"data-id="+val['VideoID']+">" +
                            "<span class=\"icon text-white-50\">" +
                            "<i class=\"fas fa-edit\"></i>" +
                            "</span>" +
                            "<span class='text'>"+ "แก้ไข" +"</span>" +
                            "</a>" +
                            "</td>";
                        tr = tr + "<td>" +
                            "<div class=\"my-2\"></div>" +
                            "<a href=\"#\" class=\"open-DeleteVideoDialog btn btn-danger btn-icon-split\"data-toggle=\"modal\" data-target=\"#deleteVideoModal\"data-id="+val["VideoID"]+">" +
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

    function getDeleteData()
    {
        var video_id = document.getElementById("btn_video_id").value;
        $.ajax({
            url: URLServ+"/mas-video/VideoupDelete.php?keys="+video_id,
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
    $(document).on("click", ".open-DeleteVideoDialog", function () {
        var myVideoId = $(this).data('id');
        $("#video_id").text("Wants to delete this information.");
        $("#btn_video_id").val(myVideoId);
    });


    $(document).on("click", ".open-AddVideoDialog", function () {
        $('#myModalAddVideo').on('hidden.bs.modal', function (e) {
            $(this)
                .find("input,textarea")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
        });
        $("#IsSelectAddTopic").val('0').change();
        $("#IsSelectAddSubTopic").val('0').change();
        $("#IsSelectAddLevel").val('0').change();
    });
    function getAddData()
    {
        var video_name = document.getElementById("text_videoName").value;
        var level = document.getElementById("IsSelectAddLevel").value;
        var sub_topic = document.getElementById("IsSelectAddSubTopic").value;

        //var form = $('upload_form')[0]; // You need to use standard javascript object here
        var formData = new FormData();
        formData.append('VideoName', video_name);
        formData.append('LevelID', level);
        formData.append('SubTopicID', sub_topic);
        formData.append('file', $("#fileInput")[0].files[0]);

        if (!$.trim(video_name)||level=='0'||sub_topic=='0'){
            alert('กรุณากรอกข้อมูลให้ครบ.');
        }else{
            $.ajax({
                url: URLServ+"/mas-video/VideoupinsAll.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success   : function(data) {
                    var obj = jQuery.parseJSON(JSON.stringify(data));
                    if(obj['IsSuccess']==true){
                        alert("บันทึกสำเร็จ!!");
                    }else{
                        alert("บันทึกไม่สำเร็จ!!");
                    }
                },
                error: function (request, error) {
                    alert('err : '+error);
                },
            });
        }
    }


    //triggered when modal is about to be shown
    $(document).on("click", ".open-EditVideoDialog", function () {
        $("#text_videoName_edit").val('');
        var myVideoID = $(this).data('id');
        $("#btn_accept_edit").val(myVideoID);
        $.ajax({
            url: URLServ+"/mas-video/VideogetByCon.php?keys="+myVideoID,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));
                var VideoName = '';
                var levelID = '';
                var TopicID = '';
                var SubTopicID = '';

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        VideoName = val['VideoName'];
                        levelID = val['LevelID'];
                        TopicID = val['TopicID'];
                        SubTopicID = val['SubTopicID'];
                    });
                }
                $("#text_videoName_edit").val(VideoName);
                $("#IsSelectEditLevelEx").val(levelID).change();
                $("#IsSelectEditTopic").val(TopicID).change();
                $("#IsSelectEditSubTopic").val(SubTopicID).change();
            },
            error: function (request, error) {
                alert(error);
            },
        });
    });

    function getEditData()
    {
        var video_id = document.getElementById("btn_accept_edit").value;
        var video_name = document.getElementById("text_videoName_edit").value;
        var level = document.getElementById("IsSelectEditLevelEx").value;
        var sub_topic = document.getElementById("IsSelectEditSubTopic").value;


        var formData = new FormData();
        formData.append('VideoID', video_id);
        formData.append('VideoName', video_name);
        formData.append('LevelID', level);
        formData.append('SubTopicID', sub_topic);
        formData.append('file', $("#fileInputEdit")[0].files[0]);

        if (!$.trim(video_name)||level=='0'||sub_topic=='0'){
            alert('กรุณากรอกข้อมูลให้ครบ.');
        }else{
            $.ajax({
                url: URLServ+"/mas-video/VideoupByCon.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
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


    function getTopicAddChange()
    {
        $("#IsSelectAddSubTopic").children().remove();
        $("#IsSelectAddSubTopic").append(new Option('--หัวข้อย่อย--', '0'));
        var topic = document.getElementById("IsSelectAddTopic").value;
        $.ajax({
            url: URLServ+"/mas-subtopic/SubTopicgetByKeyword.php?topicID="+topic,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        if(val['IsActive']=='1'){
                            var tpID = val['SubTopicID'];
                            var topicName = val['SubTopicName'];
                            //add to modal add
                            $("#IsSelectAddSubTopic").append(new Option(topicName, tpID));
                        }
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    }
    function getTopicEditChange()
    {
        $("#IsSelectEditSubTopic").children().remove();
        $("#IsSelectEditSubTopic").append(new Option('--หัวข้อย่อย--', '0'));
        var topic = document.getElementById("IsSelectEditTopic").value;
        $.ajax({
            url: URLServ+"/mas-subtopic/SubTopicgetByKeyword.php?topicID="+topic,
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        if(val['IsActive']=='1'){
                            var tpID = val['SubTopicID'];
                            var topicName = val['SubTopicName'];
                            //add to modal add
                            $("#IsSelectEditSubTopic").append(new Option(topicName, tpID));
                        }
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    }


    //get Level-Master && Video-master
    $(function(){
        $.ajax({
            url: URLServ+"/mas-level/LevelgetByKeyword.php",
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        if(val['IsActive']=='1'){
                            var lvID = val['LevelID'];
                            var levelName = val['LevelName'];
                            $("#IsLevel").append(new Option(levelName, lvID));

                            //add to modal add
                            $("#IsSelectAddLevel").append(new Option(levelName, lvID));
                            //add to modal edit
                            $("#IsSelectEditLevelEx").append(new Option(levelName, lvID));
                        }
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });

        $.ajax({
            url: URLServ+"/mas-topic/TopicgetByKeyword.php",
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        if(val['IsActive']=='1'){
                            var tpID = val['TopicID'];
                            var topicName = val['TopicName'];
                            $("#IsTopic").append(new Option(topicName, tpID));

                            //add to modal add
                            $("#IsSelectAddTopic").append(new Option(topicName, tpID));
                            //add to modal edit
                            $("#IsSelectEditTopic").append(new Option(topicName, tpID));
                        }
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });

        $.ajax({
            url: URLServ+"/mas-subtopic/SubTopicgetByKeyword.php?topicID=0",
            type: "POST",
            data: '',
            contentType: "application/json",
            dataType  : 'json',
            success   : function(data) {
                var obj = jQuery.parseJSON(JSON.stringify(data));

                if(obj != '') {
                    $.each(obj, function (key, val) {
                        if(val['IsActive']=='1'){
                            var tpID = val['SubTopicID'];
                            var topicName = val['SubTopicName'];
                            $("#IsSubTopic").append(new Option(topicName, tpID));

                            //add to modal add
                            $("#IsSelectAddSubTopic").append(new Option(topicName, tpID));
                            //add to modal edit
                            $("#IsSelectEditSubTopic").append(new Option(topicName, tpID));
                        }
                    });
                }
            },
            error: function (request, error) {
                alert(error);
            },
        });
    });



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
    <li class="nav-item active">
      <a class="nav-link" href="manage-content-nav-2.php">
        <i class="fas fa-fw fa-wrench"></i>
        <span>การจัดการเนื้อหา</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link active" href="manage-unit.php">
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

          <a class="text-center">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['UserName']; ?></span>
            <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
          </a>
        </ul>

      </nav>
      <!-- End of Topbar -->


      <div class="container">
        <!--<ul class="nav nav-tabs nav-justified">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Algo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">DS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Languages</a>
          </li>
        </ul>

        <br><br>-->

        <ul class="nav nav-pills nav-justified">
          <!--<li class="nav-item">
            <a class="nav-link" href="../../manage-content-nav-1.html">จัดการระดับเนื้อหา</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="manage-content-nav-2.php">จัดการหัวข้อ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-content-nav-6.php">จัดการหัวข้อย่อย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-content-nav-7.php">จัดการสื่อเริ่มต้น</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="manage-content-nav-3.php">จัดการเนื้อหา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-content-nav-4.php">จัดการแบบฝึกหัด</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-content-nav-5.php">จัดการข้อสอบ</a>
          </li>
        </ul>
      </div>

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
              <select class="form-control " id="IsLevel" onchange="getSearchData()">
                <option value="0">All --ระดับเนื้อหาทั้งหมด--</option>
              </select>
            </div>

            <div class="col-2">
              <select class="form-control " id="IsTopic" onchange="getSearchData()">
                <option value="0">All --หัวข้อทั้งหมด--</option>
              </select>
            </div>

            <div class="col-2">
              <select class="form-control " id="IsSubTopic" onchange="getSearchData()">
                <option value="0">All --หัวข้อย่อยทั้งหมด--</option>
              </select>
            </div>

            <div class="col-2">
              <a href="#" class="open-AddVideoDialog btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModalAddVideo">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                <span class="text">เพิ่มเนื้อหา</span>
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>VideoID</th>
                <th>VideoName</th>
                <th>FilePath</th>
                <th>LevelName</th>
                <th>SubTopicName</th>
                <th >Edite</th>
                <th >Delete</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>VideoID</th>
                <th>VideoName</th>
                <th>FilePath</th>
                <th>LevelName</th>
                <th>SubTopicName</th>
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

<!-- Delete Modal Video-->
<div class="modal fade" id="deleteVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="video_id"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" type="button" id="btn_video_id" data-dismiss="modal" onclick="getDeleteData()">Ok</button>
      </div>
    </div>
  </div>
</div>

<!-- The Modal Add Video-->
<div class="modal fade" id="myModalAddVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Video</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" id="upload_form" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="text_videoName" aria-describedby="emailHelp" placeholder="Enter VideoName...">
          </div>
          <br>
          <select class="form-control " id="IsSelectAddLevel">
            <option value="0">--เลือกระดับ--</option>
          </select>
          <br>
          <select class="form-control " id="IsSelectAddTopic" onchange="getTopicAddChange()">
            <option value="0">--เลือกหัวข้อ--</option>
          </select>
          <br>
          <select class="form-control " id="IsSelectAddSubTopic">
            <option value="0">--เลือกหัวข้อย่อย--</option>
          </select>
          <br>
          <!-- File Upload -->
          <div class="controls">
            <input class="input-file" id="fileInput" type="file" name="file">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-user btn-block" type="button" id="btn_accept_add" data-dismiss="modal" onclick="getAddData()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- The Modal Edit Video-->
<div class="modal fade" id="myModalEditVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Video</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" id="upload_form_edit" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="text_videoName_edit" aria-describedby="emailHelp" placeholder="Enter VideoName...">
          </div>
          <br>
          <select class="form-control " id="IsSelectEditLevelEx">
            <option value="0">--เลือกระดับ--</option>
          </select>
          <br>
          <select class="form-control " id="IsSelectEditTopic" onchange="getTopicEditChange()">
            <option value="0">--เลือกหัวข้อ--</option>
          </select>
          <br>
          <select class="form-control " id="IsSelectEditSubTopic">
            <option value="0">--เลือกหัวข้อย่อย--</option>
          </select>
          <br>
          <!-- File Upload -->
          <div class="controls">
            <input class="input-file" id="fileInputEdit" type="file" name="file">
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
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<!-- Config Server -->
<script src="config-server/config.js"></script>
</body>

</html>
