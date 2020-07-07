<?php $this->load->view('research/permission') ; ?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> <?php echo $header_title; ?> </h1>
          <ol class="breadcrumb  row-hidden">
          <li><a  href="<?php echo site_url('research/seed_test_list/'.$research_id) ?>" class="btn btn-social-icon btn-linkedin" style="color:#FFF; border-color:#FFF;"><i class="fa fa-th"></i></a></li>
        </ol>
        </section><br>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('research') ?>">หน้าแรก</a></li>
          <li><a href="<?php echo site_url('research/seed_test_list/'.$research_id) ?>">การทดสอบเมล็ดพันธุ์</a></li>
          <li class="active"><?php echo $header_title ?></li>
        </ol>

        <!-- Main content -->
        <section class="content">
          	<?php $this->load->view($form_header) ?>
            <!-- Form Content -->
            <?php $this->load->view($form_content) ?>
            <!-- Form Comment -->
            <?php $this->load->view($form_comment) ?>
            <!-- Next & Previous button -->
            <?php // $this->load->view($form_next_button,$research_id) ?>
          	<!-- form submit -->
          	<?php $this->load->view($form_submit) ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->