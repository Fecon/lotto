<?php $user_data = $this->session->userdata('user_data'); ?>
<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo site_url('User_index') ?>">
                <i class="fa fa-sort-numeric-asc"></i> <span>บันทึกเลข (อย่างง่าย)</span>
              </a>
            </li>
<!--             <li>
              <a href="<?php echo site_url('User_index/custom') ?>">
                <i class="fa fa-pencil" aria-hidden="true"></i> <span>บันทึกเลข (แบบละเอียด)</span>
              </a>
            </li> -->
            <li>
              <a href="<?php echo site_url('login/logout') ?>">
                <i class="fa fa-sign-out"></i> <span>ออกจากระบบ</span>
              </a>
            </li>
          </ul>
