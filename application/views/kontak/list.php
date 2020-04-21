 <main id="main">

 	<!-- ======= Breadcrumbs ======= -->
 	<section id="breadcrumbs" class="breadcrumbs">
 		<div class="container">

 			<div class="d-flex justify-content-between align-items-center">
 				<h2><?php echo $title?></h2>
 				<ol>
 					<li><a href="<?= base_url('home')?>">Home</a></li>
 					<li>Halaman Kontak Detail</li>
 				</ol>
 			</div>

 		</div>
 	</section><!-- End Breadcrumbs -->

 	<section id="contact" class="contact">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-4" data-aos="fade-right">
 					<div class="section-title">
 						<h2>Contact</h2>
 						<p>Sma Banjarwangi-1</p>
 					</div>
 				</div>

 				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
 					<iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
 					<div class="info mt-4">
 						<i class="icofont-google-map"></i>
 						<h4>Location:</h4>
 						<p>Garut Jawa Barat Indonesia</p>
 					</div>
 					<div class="row">
 						<div class="col-lg-6 mt-4">
 							<div class="info">
 								<i class="icofont-envelope"></i>
 								<h4>Email:</h4>
 								<p>smabanjarwangi@gmail.com</p>
 							</div>
 						</div>
 						<div class="col-lg-6">
 							<div class="info w-100 mt-4">
 								<i class="icofont-phone"></i>
 								<h4>Call:</h4>
 								<p>+1 5589 55488 55s</p>
 							</div>
 						</div>
 					</div>
 					<form action="<?php echo base_url()?>kontak/simpan_kontak" method="POST" role="form" class="php-email-form mt-4">
 						<div class="form-row">
 							<div class="col-md-12 form-group">
 								<input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name">
 							</div>
 							<div class="col-md-12 form-group">
 								<input type="email" class="form-control" name="gmail" id="gmail" placeholder="Your Email" data-rule="email"  >
 							</div>
 						</div>
 						<div class="form-group">
 							<textarea class="form-control" name="pesan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
 						</div>
 					<button type="submit" class="btn btn-primary">Send Message</button>
 					</form>
 				</div>
 			</div>

 		</div>
 	</section><!-- End Contact Section -->

 </main><!-- End #main -->
