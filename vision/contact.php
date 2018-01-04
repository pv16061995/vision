<?php 
include 'include/index_headers.php';
?>

		<div class="contact_details sec-padd">
			
				<div class="home-google-map">
					<div 
						class="google-map" 
						id="contact-google-map" 
						data-map-lat="28.4135047" 
						data-map-lng="77.0393453" 
						data-icon-path="images/logo/map-marker.png"
						data-map-title="Chester"
						data-map-zoom="10" >
					</div>
				</div>
			
		</div>
		
		<section class="feature-style-three">
			<div class="container">			
				<div class="item-list">
					<div class="row">
						<div class="item">
							<div class="column col-md-4 col-sm-6 col-xs-12">
								<div class="inner-box">
									<div class="icon-box"><span class="icon flaticon-pin-1"></span></div>
									<h3>Location</h3>
									<div class="text"><p>INDIA</p></div>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="column col-md-4 col-sm-6 col-xs-12">
								<div class="inner-box">
									<div class="icon-box"><span class="icon flaticon-cell-phone"></span></div>
									<h3>Phone Number</h3>
									<div class="text"><p>(+91) 564-334-21-22-34 <br>(+91) 564-334-21-22-38</p></div>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="column col-md-4 col-sm-6 col-xs-12">
								<div class="inner-box">
									<div class="icon-box"><span class="icon flaticon-message"></span></div>
									<h3>E-Mail Us</h3>
									<div class="text"><p>supportinfo@visionex.com <br>supportinfo@visionex.com</p></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="contact_us">
			<div class="container">   
                <div class="sec-title text-center">
                    <h2>Get In Touch</h2>
					<p>We do our best to respond to quickly, it could take us 1-2 business days to get back to you.Feel free to Drop Your Message</p>
                </div>
                <div class="default-form-area">
					<form id='contact-form' name='contact_form' class='col-md-10 col-md-offset-1 default-form' action='#' method='post'><input type='hidden' name='form-name' value='contact_form' />
						<div class="row clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12">
												
								<div class="form-group style-two">
									<input type="text" name="form_name" class="form-control" value="" placeholder="Name" required="">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<input type="email" name="form_email" class="form-control required email" value="" placeholder="Email" required="">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<input type="text" name="form_phone" class="form-control" value="" placeholder="Phone">
								</div>
							</div>	
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<input type="text" name="form_phone" class="form-control" value="" placeholder="Subject">
								</div>
							</div>	
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group style-two">
									<textarea name="form_message" class="form-control textarea required" placeholder="Your Message"></textarea>
								</div>
							</div>   											  
						</div>
						<div class="contact-section-btn text-center">
							<div class="form-group style-two">
								<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
								<button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">send message</button>
							</div>
						</div> 
					</form>
				</div>          
			</div>
		</section>
<?php 
include 'include/index_footer.php';
?>	