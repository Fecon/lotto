<?php $user_data = $this->session->userdata('user_data'); ?>
<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo site_url('user_index') ?>">
                <i class="fa fa-home"></i> <span>หน้าแรก</span> 
              </a>
            </li>
                        <li>
              <a href="<?php echo site_url('dashboard') ?>">
                <i class="fa fa-bar-chart"></i> <span>ภาพรวม</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('research/user_research') ?>">
                <i class="fa flaticon-flasks4"></i>
                <span>การทดลอง</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('research/seed_test_list') ?>">
                <i class="fa fa-eyedropper"></i>
                <span>การทดสอบเมล็ดพันธุ์</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('report') ?>">
                <i class="fa fa-download" aria-hidden="true"></i>
                <span>ส่งออกข้อมูลวิเคราะห์</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('pedigree') ?>">
                <i class="fa flaticon-spring20"></i> <span>พันธุ์ / สายพันธุ์</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('download_app') ?>">
                <i class="fa fa-download"></i> <span>ดาวน์โหลด App</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('department') ?>">
                <i class="fa fa-university"></i>
                <span>ศูนย์วิจัย</span>
              </a>
            </li>
            
            <li>
              <a href="<?php echo site_url('user_manage/user_edit/'.$user_data['user_id']) ?>">
                <i class="fa fa-users"></i> <span>ข้อมูลส่วนตัว</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('login/logout') ?>">
                <i class="fa fa-sign-out"></i> <span>ออกจากระบบ</span>
              </a>
            </li>
          </ul>