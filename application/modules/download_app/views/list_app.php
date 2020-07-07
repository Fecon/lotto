<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-download"></i> ดาวน์โหลด App </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">ดาวน์โหลด App</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
  
  <!-- Default box -->
  <div class="row">
    <div class="col-md-12">
    <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rice breeding program Application</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-md-5">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">#</th>
                  <th width="20%">Version</th>
                  <th class="text-center">Release date</th>
                  <th class="text-center">Download</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>V.1.00</td>
                  <td class="text-center">2 มี.ค. 2560</td>
                  <td class="text-center"><a href="<?php echo base_url('assets/app/rbp_v1.00.apk') ?>"><i class="fa fa-download"></i></a></td>
                </tr>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
  <!-- /.box-body -->
 
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<?php $segment1 = $this->uri->segment(1) ; ?>
<?php if($segment1=='department'){?>
<!-- jvectormap --> 
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-th-mill.js"></script> 
<script>
	var markers = [
    <?php foreach($department_all as $dept_all){
				echo '{latLng: ['.$dept_all['dep_la_location'].', '.$dept_all['dep_long_location'].'], name: "'.$dept_all['dep_name'].'", weburl : "../index.php"},' ;
			} ?>
];
	$('#map').vectorMap({
		map: 'th_mill',
		normalizeFunction: 'polynomial',
		hoverOpacity: 0.7,
		hoverColor: false,
		backgroundColor: 'transparent',
		regionStyle: {
		  initial: {
			fill: 'rgba(210, 214, 222, 1)',
			"fill-opacity": 1,
			stroke: 'none',
			"stroke-width": 0,
			"stroke-opacity": 1
		  },
		  hover: {
			"fill-opacity": 0.7,
			cursor: 'pointer'
		  },
		  selected: {
			fill: 'yellow'
		  },
		  selectedHover: {
		  }
		},
		
		markerStyle: {
		  initial: {
			fill: '#00a65a',
			stroke: '#111'
		  }
		},

		markers: markers,

  });
  
    </script>
<?php } ?>
