<?php $this->load->view('admin/components/page_head'); ?>
<body>
    <div class="navbar navbar-static-top navbar-inverse">
	    <div class="navbar-inner">
		    <a class="brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title_short; ?></a>
		    <ul class="nav">
			    <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">صفحه کنترل</a></li>
			    <li><?php echo anchor('admin/assistance', 'مساعدت'); ?></li>
			    <li><?php echo anchor('admin/expenditure', 'مصارفات کاندیدان'); ?></li>
			    <li><?php if($this->session->userdata('user_type') != 'User'){ echo anchor('admin/user', 'کاربران'); }?></li>
		    </ul>
	    </div>
    </div>

	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="span9">
				<?php $this->load->view($subview);?>
			</div>
			<!-- Sidebar -->
			<div class="span3">
				<section>
				<?php echo '<i class="icon-user"></i>' . " " . $this->session->userdata('name');?>
					<?php //echo mailto('qasim.bigzad@iec.org.af', '<i class="icon-user"></i> joost@codeigniter.tv'); ?><br>
					<?php echo anchor('admin/user/logout', '<i class="icon-off"></i> logout'); ?>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/page_tail'); ?>