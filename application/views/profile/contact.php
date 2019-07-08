<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<?php $this->load->view('profile/_partials/head') ?>
</head>
<body>
  <div class="header">
      <div class="wrap">
      	<div class="project-top">
	         <div class="logo">
				<a href="index.html"><img src="images/logo.png" alt=""/></a>
			 </div>
			 <div class="cssmenu">
        <ul>
          <li class="active"><a href="<?php echo base_url('profile'); ?>">Home</a></li>
          <!-- <li><a href="blog.html">Testimoni</a></li> -->
          <li><a href="<?php echo base_url('profile/contact') ?>">Contact</a></li>
          <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
        </ul>
        </div>
         <div class="clear"></div>
   </div>
			  <div class="clear"></div>
		</div>
	   </div>
   </div>
   <div class="main">
	 <div class="wrap">
	   	<div class="project">
	   		 <div class="map">
				<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7346846110845!2d113.81740251477899!3d-7.922756894292909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6dcd088820991%3A0x1ee2c6b4c5087645!2sLBB+Primagama+Bondowoso!5e0!3m2!1sid!2sid!4v1562559817365!5m2!1sid!2sid"></iframe><br><small><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7346846110845!2d113.81740251477899!3d-7.922756894292909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6dcd088820991%3A0x1ee2c6b4c5087645!2sLBB+Primagama+Bondowoso!5e0!3m2!1sid!2sid!4v1562559817365!5m2!1sid!2sid" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
			 </div>
		  <div class="cont span_2_of_3">
			<div class="about-left">
				<h3>Contact Us</h3>
		    </div>
			<p>Jika ingin menghubungi kami, anda bisa mengisi dan melengkapi form berikut:</p>
		    <div class="contatct-form">
			   <form method="post" action="<?php echo base_url('profile/kirimEmail') ?>">
				  <input type="text" value="Name " name="nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name ';}">
				  <input type="text" value="Email " name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email ';}">
				  <input type="text" value="Phone " name="hp" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone ';}">
				  <textarea rows="2" cols="70" name="pesan" onfocus="if(this.value == 'Message ') this.value='';" onblur="if(this.value == '') this.value='Message ';">Message </textarea>
				  <input type="submit" value="Submit">
			   </form>
			</div>
		    </div>
			<div class="rsidebar span_1_of_3">
				 <div class="company_address">
				     	<h3>Address</h3>
						    	<p>Jl. Letnan Jend. Donald Isac Panjaitan No.234,</p>
						   		<p>Dabasah, Kec. Bondowoso, Kabupaten Bondowoso</p>
						   		<p>Jawa Timur</p>
				   		<p>Phone:0852-3661-0634</p>
				 	 	<p>Email: <span>info[at]mycompany.com</span></p>
				   		<p>Follow on: <a href="https://www.facebook.com/login/?next=https%3A%2F%2Fid-id.facebook.com%2Fprimagama.bondowoso"><span>Facebook</span></p>
				   </div>
		      </div>
		     <div class="clear"></div>
			</div>
		 </div>
	 </div>
	 
     <div class="footer">
		<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_footer span_1_of_footer">
					<h3>Beranda</h3>
					<p> Home </p>
					<p>Kontak</p>
				</div>
				<div class="col_1_of_footer span_1_of_footer">
					<h3>Home</h3>
					<p> Primagama Siap </p>
					<p>Kenapa Primagama</p>
				</div>
				<div class="col_1_of_footer span_1_of_footer">
					<h3> Recent Testimoni </h3>
					<div class="recent-tweet">
						<div class="recent-tweet-icon">
							<span> </span>
						</div>
						<div class="recent-tweet-info">
							<p>Ds which don't look even slightly believable. If you are going to use nibh euismod tincidunt ut laoreet<a href="#">About 1 Hour Ago</a></p>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="recent-tweet">
						<div class="recent-tweet-icon">
							<span> </span>
						</div>
						<div class="recent-tweet-info">
							<p>Ds which don't look even slightly believable. If you are going to use nibh euismod tincidunt ut laoreet<a href="#">About 2 Hour Ago</a></p>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="col_1_of_footer span_1_of_footer">
					<h3>Tokoh</h3>
					<div class="gallery">
						<ul>
							<li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="<?php echo base_url('images/g1.jpg')?>" alt=""/></a></li>
							<li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="<?php echo base_url('images/g2.jpg')?>" alt=""/></a></li>
							<li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="<?php echo base_url('images/g3.jpg')?>" alt=""/></a></li>
							<li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="<?php echo base_url('images/g4.jpg')?>" alt=""/></a></li>
							<li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="<?php echo base_url('images/g5.jpg')?>" alt=""/></a></li>
							<li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="<?php echo base_url('images/g6.jpg')?>" alt=""/></a></li>
							 <div id="small-dialog1" class="mfp-hide">
								<div class="pop_up">
								 	<img src="<?php echo base_url('images/g_zoom.jpg')?>" alt=""/>
									<h2>Photo View</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					  			</div>
							</div>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	    <?php $this->load->view('profile/_partials/foot') ?>
	</div>
</body>
</html>
