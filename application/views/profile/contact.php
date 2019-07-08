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
			   <form method="post" action="<?php echo base_url('profile/kirimEmail') ?>" target="_blank">
				  <input type="text" value="Name " name="nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name ';}">
				  <input type="text" value="Email " name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email ';}">
				 
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
				 	 	<p>Email: <span>primagamabondowoso@gmail.com</span></p>
				   		<p>Follow on: <a href="https://www.facebook.com/login/?next=https%3A%2F%2Fid-id.facebook.com%2Fprimagama.bondowoso"><span>Primagama Bondowoso</span></p>
				   </div>
		      </div>
		     <div class="clear"></div>
			</div>
		 </div>
	 </div>
	 
     
</body>
</html>
