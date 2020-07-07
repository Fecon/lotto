<?php 
	$user_data = $this->session->userdata('user_data');
	if(!isset($user_data)){
		redirect('login');
	}
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small><?php echo $user_data['username'];  ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div>
              
            </div>
        </section>
        <!-- /.content -->
      </div>