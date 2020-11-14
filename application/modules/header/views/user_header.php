<?php
	$user_data = $this->session->userdata('user_data');

	if(!isset($user_data)){
		redirect('login');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Lotto" />
<meta name="author" content="Fecon" />
<link rel="shortcut icon" href="<?php echo base_url('assets/dist/img/research-development-icon.png') ?>">
<title>Lotte Lucky</title>

<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
<!-- Custom style -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/custom.css">
<!-- select2 -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/select2.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>



<style>
input[type=text] {
  border: none !important;
	text-align: center !important;
}

.hide-icon{
  display: none;
}
.on-right{
  float: right;
}
.text-black {
  color:#000 !important;
}

.preview {
  font-size: 1.5em;
}

.right-border {
  border-right: 1px solid #d9d9d9;
}

#pad-number {
  /*width:100%;*/
  font-size: 50px;
  background-color: #2d2d2d;
}

#pad-bottom {
  width: 100%;
}

#pad-confirm {
  width: 100%;
  height: 55px;
  display: block;
}

input[type=tel] {
  text-align: center !important;
}

input[type=date] {
  padding:1px !important;
  text-align: center !important;
}

.nav-tabs li a {
  font-size: 1.5em;
}

.form-group {
  margin-bottom: 1px !important;
}

.padding {
  padding-right: 1px !important;
  padding-left: 1px !important;
}

.input-lg{
  padding:1px !important;
}

.input-history{
  padding:1px !important;
}

.add-row{
  position:relative;
  top:7px;
}

.table>tbody>tr>td{
  padding: 1px !important;
}

.row-sapce-top{
  padding-top:55px;
}

.row {
  margin-right: -10px;
  margin-left: -10px;
}

</style>

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu"> <a href="#" data-toggle="modal" data-target="#logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if($user_data['user_role'] == 1){
          			$this->load->view('admin_menu') ;
          		}else{
          			$this->load->view('user_menu') ;
          		}
          	?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <?php $this->load->view($content) ?>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- Log out -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <h4>ยืนยันการออกจากระบบ ใช่หรือไม่?</h4>
        <br>
        <a href="<?php echo site_url('login/logout') ?>">
        <button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> ใช่</button>
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> ไม่</button>
      </div>
      <br>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
  function show_icon(id){
    document.getElementById(id).style.display = "block";
  }

  function hide_icon(id){
    setTimeout(function(){ document.getElementById(id).style.display = "none"; }, 1500);
  }

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
</script>

</body>
</html>
