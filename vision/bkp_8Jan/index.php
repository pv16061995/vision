<?php 
include 'include/index_header.php';


$errorcontact = array();
$transactionList = array();

$user_current_balance = 0;
$text_subject = "";
$trans_desc ="";

$client = "";


if (isset($_POST['btncontact'])) {
    $text_subject = $_POST['text_subject'];
    $user_email = $_POST['user_email'];
    $trans_desc = $_POST['discription'];


    if (empty($user_email)) {
        $errorcontact['user_emailError'] = "Please Provide valid Email";
    }

    if (empty($text_subject)) {
        $errorcontact['text_subjectError'] = "Please Provide valid Subject";
    }



    if (empty($trans_desc)) {
        $errorcontact['discriptionError'] = "Please Provide valid Message";
    }

    if (empty($errorcontact)) {
        sendMailToAdmin(ADMIN_EMAIL, $user_email, $text_subject, $trans_desc);

        $errorcontact2['user_emailError'] = "Thank you for contacting us. Your request has been submitted to concern person";
        $user_email= @$user_session;
        $text_subject = "";
        $trans_desc ="";
    }
}

?>
<section class="rev_slider_wrapper">
			<div id="slider1" class="rev_slider"  data-version="5.0">
				<ul>
					
					<li data-transition="fade">
						<img src="images/slider/1.jpg"  alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
						
						<div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="190" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h1>WELCOME TO VISIONEX</h1>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="280" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h3 style="color: white; margin-left: 20px">Easy Way to Trade with VISIONEX</h3>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="340" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<p>We are offering maximum security and advanced trading features..</p>
							</div>
						</div>
						<div class="tp-caption tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="430" 
							data-transform_idle="o:1;"                         
							data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							data-start="2300">
							<div class="slide-content-box">
								<!-- <div class="button">
									<a class="thm-btn yellow-bg" href="contact.php">contact us</a>     
								</div> -->
							</div>
						</div>
						
					</li>
					<li data-transition="fade">
						<img src="images/slider/2.jpg"  alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
						
						<div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="190" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h1>Invest in Cryptocurrency </h1>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="280" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h2>Easy Way to Trade Bitcoin</h2>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="340" 
							data-transform_idle="o:1;"         
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
							data-splitin="none" 
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<p>Trade using our industry leading REST-API or connect via our FIX interface and get access to even more features!</p>
							</div>
						</div>
						<div class="tp-caption tp-resizeme" 
							data-x="left" data-hoffset="55" 
							data-y="top" data-voffset="430" 
							data-transform_idle="o:1;"                         
							data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							data-start="2300">
							<div class="slide-content-box">
								<!-- <div class="button">
									<a class="thm-btn yellow-bg"  href="contact.php">contact us</a>     
								</div> -->
							</div>
						</div>
						
					</li>
					
				</ul>
			</div>
		</section>
		<!--End rev slider wrapper--> 

		<section class="about about-2">
			<div class="container">
				<div class="item-list">
					<div class="row">
					
						<div class="col-md-6 col-xs-12">
							<div class="item">
								<figure class="image-box">
									<img src="images/background/desktop.png" alt="" class="center-block img-responsive">
								</figure>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="item clearfix">
								<div class="sec-title">
									<h2 class="left">Buy and Sell Bitcoin</h2>
								</div>
								<div class="content-box">
									<h4 align="justify">VISIONEX is global trading platform with multi-currency support. The exchange has markets for trading digital assets, tokens and ICOs and provides a wide range of tools as well as stable uptime.</h4>
									<p align="justify">The core matching engine is among the most advanced technological products in its class and implements innovative features such as real-time clearing, advanced order matching algorithms and has been acclaimed for its fault-tolerance, uptime and high availability. </p>
									<a href="#" class="thm-btn">Join Us Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		

		<section class="our-services rotated-bg" id="service">
			<div class="container">
				<div class="sec-title">
					<h2 class="center">Why Choose VisionEx</h2>
					<p align="justify">Other Cryptocurrency exchanges are for skilled traders.We provide you with a convenient solution. Enjoy your best rates while we are doing the rest for you.</p>
				</div>
				<div class="row clearfix">
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
						
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="images/icons/service-1.png" alt="">
							</div>
							<div class="service-text">
								<h4><a href="service-single.php">Safe and Secure</a></h4>
								<p align="justify">Your account is protected with two way factor Authentication, e-mail Google Authenticator pin requirement. These layers of security will guarantee that every transaction is signed and validated by no one other than yourself.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
						
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="images/icons/service-2.png" alt="">
							</div>
							<div class="service-text">
								<h4><a href="service-single.php">Instantly</a></h4>
								<p align="justify"> deposit can be processed instantly and withdrawal will only take one working day before the money arrives in your bank account. Every Currency deposit or withdrawal is processed immediately and securely without delay.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
						
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="images/icons/service-3.png" alt="">
							</div>
							<div class="service-text">
								<h4><a href="service-single.php">Simplicity</a></h4>
								<p align="justify">You will only need one account , whether it is to sell, buy, invest or trade Bitcoin. Visionex can be accessed easily through various types of devices, such as: PC, laptop, tablet and smartphones. Trade anywhere, anytime, instantly!</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
							
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="images/icons/service-4.png" alt="">
							</div>
							<div class="service-text">
								<h4><a href="service-single.php">HIGH LIQUIDITY</a></h4>
								<p>Fast order execution, low spread, access to high liquidity orderbook for top currency pairs.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
							
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="images/icons/service-5.png" alt="">
							</div>
							<div class="service-text">
								<h4><a href="service-single.php">CROSS-PLATFORM TRADING</a></h4>
								<p>Trading via website, mobile app, WebSocket and REST API. FIX API for institutional traders.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">
							
							<div class="service-left-bg"></div>
							<div class="service-icon">
								<img src="images/icons/service-6.png" alt="">
							</div>
							<div class="service-text">
								<h4><a href="service-single.php">STORE ALL ASSETS IN ONE PLACE</a></h4>
								<p>You can store and manage Multiple digital currencies in one place at vision</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
				</div>
			</div>
		</section>

		<section class="about" id="about">
			<div class="container">
				<div class="item-list">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="item clearfix">
								<div class="sec-title">
									<h2 class="left">About VisionEx</h2>
								</div>
								<div class="content-box">
									<h4 align="justify">VISIONEX offers cross-platform trading via website, mobile app, WebSocket and REST API, providing access to high liquidity orderbook for top currency pairs on the market. Instant Cryptocurrency buying and selling is available via simplified bundle interface. </h4>
									<p align="justify">When you looking for a reliable online exchange might be a complicated task, trusting a platform with extensive coverage and positive reputation among its users might save your time. VISIONEX is the cryptocurrency trading platform that combines the crucial features: enhanced security, variety of options and high market liquidity. The team applies every effort to make your trading on the platform as convenient and safe as possible.</p>
								</div>
								
								<!--Fact Counter-->
								<div class="fact-counter">								  
									<div class="row">
										<div class="counter-outer">
											
											<!--Column-->
											<div class="column counter-column col-md-3 col-xs-6 wow fadeIn" data-wow-duration="600ms">
												<div class="item">
													<div class="inner-box">
														<div class="icon-box">
															<img class="counter-icon" src="images/icons/count-1.png" alt="">
														</div>
														<div class="count-outer">
															<span class="count-text" data-speed="3000" data-stop="16">0</span>
															<p>Support Currencies</p>
														</div>
													</div>														
												</div>
											</div>
												
											<!--Column-->
											<div class="column counter-column col-md-3 col-xs-6 wow fadeIn" data-wow-duration="900ms">
												<div class="item">
													<div class="inner-box">
														<div class="icon-box">
															<img class="counter-icon" src="images/icons/count-2.png" alt="">
														</div>
														<div class="count-outer">
															<span class="count-text" data-speed="3000" data-stop="1650">0</span>
															<p>Operators</p>
														</div>
													</div>														
												</div>
											</div>
											

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-10 col-xs-12">
							<div class="item">
								<figure class="image-box bity">
									<img src="images/about/1.png" alt="" />
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ask-question">
           <div class="container">
             <div class="row">
               <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active">
                    <div class="ask-circle">
                      <span class="fa fa-unlock-alt"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">Safe and secure</h3>
                      <p class="text-white">2-factor authentication, advanced encryption technology, cold storage – we give you peace of mind when it comes to security.</p>
                    </div>
                   
                 </div>
               </div>

             </div>
             <div class="row">
             	<div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active mt-30">
                    <div class="ask-circle">
                      <span class="fa fa-fighter-jet"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">Fast, responsive and feature-packed</h3>
                      <p class="text-white">Our terminal is built on the best technology and lets you trade effortlessly any of the HitBTC currency pairs.</p>
                    </div>
                   
                 </div>

               </div>
             </div>
             <div class="row">
             	<div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                 <!--ask item -->
                 <div class="ask-box active mt-30">
                    <div class="ask-circle">
                      <span class="fa fa-cogs"></span>
                    </div>
                    <div class="ask-info">
                      <h3 class="text-white">User-friendly API</h3>
                      <p class="text-white">Make the most out of your trading bot with our leading API and its low latency data and execution feeds.</p>
                    </div>
                   

                 </div>
               </div>
             </div>
           </div>
         </section>

		<section id="how-it-work" class="how-it-work">
          	<div class="container text-center">
            	<div class="sec-title">
					<h2 class="center">how it Works</h2>
					<p>No experience? No worries.</p>
				</div>
	            <div class="how-one-container">
	                <!--how it work Box-->
	                <div class="how-box-one col-md-4 col-sm-6 col-xs-12">
	                   <div class="inner-box">
	                      <div class="icon-box">
	                         <img src="images/icons/how-1.png" alt="">
	                      </div>
	                      <h4><a href="#">create your Account</a></h4>
	                      <div class="text">Create a digital currency Account where you can securely Buy and Sell digital currency.</div>
	                   </div>
	                </div>

	                <!--how it work Box-->
	                <div class="how-box-one active col-md-4 col-sm-6 col-xs-12">
	                   <div class="inner-box">
	                      <div class="icon-box">
	                         <img src="images/icons/how-2.png" alt="">
	                      </div>
	                      <h4><a href="#">Verify Your Account</a></h4>
	                      <div class="text">Connect your bank account, debit card, or credit card so that you can exchange digital currency into and out of your local currency.</div>
	                   </div>
	                </div>

	                <!--how it work Box-->
	                <div class="how-box-one col-md-4 col-sm-6 col-xs-12">
	                   <div class="inner-box">
	                      <div class="icon-box">
	                         <img src="images/icons/how-3.png" alt="">
	                      </div>
	                      <h4><a href="#">Buy or Sell Orders</a></h4>
	                      <div class="text">Capitalise on low hanging fruit to identify a ballpark value added activity to beta test.</div>
	                   </div>
	                </div>

	            </div>
            </div>
        </section>

       
	
		<!--Paralax Style One-->
		<section class="parallax-style-one" style="background-image:url(images/background/bg-1.jpg);">
			<div class="container">
				<div class="sec-title">
					<h2 class="center">Need to take care<br> of your<span> Currency Investments </span></h2>
					<p>Looking to get started in the world of cryptocurrency trading?</p>
				</div>									
				<ul class="link_btn text-center">
					<li><a href="#" class="thm-btn style-two">Get Started</a></li>
					<li><a href="#contact" class="thm-btn style-two">Contact us</a></li>
				</ul>	
			</div>
		</section>		
		 <section class="get-quote-section" style=" background-image:url(images/resources/getquote-bg-img.jpg);" id="contact">
            <div class="container">
                <div class="row clearfix">
                      
                  <!--Form Column-->
                  <div class="form-column col-lg-7 col-md-8 col-sm-12 col-xs-12">
                    <!--Title-->
                      <div class="sec-title ">
                          <h2 class="left">Request A Call Back</h2>
                          <p>We do our best to respond to quickly, it could take us 1-2 business days to get back to you. </p>
                          <p>Feel free to Drop Your Message</p>
                      </div>
              
                    <div class="form-box default-form">
                          <form method='post'><input type='hidden' name='form-name' value='form 1' />
                          
                              <div class="row clearfix">
                                  
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                      <div class="field-inner"><input type="email" name="user_email" value="" placeholder="Email" required=""></div>
													<?php if (isset($errorcontact['user_emailError'])) {
													echo "<br/><span class=\"messageClass\">".$errorcontact['user_emailError']."</span>";
													}?>
                                  </div>
                                  
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                      <div class="field-inner"><input type="text" name="text_subject" value="" placeholder="subject"></div>
													<?php if (isset($errorcontact['text_subjectError'])) {
													echo "<br/><span class=\"messageClass\">".$errorcontact['text_subjectError']."</span>";
													}?>
                                  </div>
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                      <div class="field-inner"><textarea name="discription" placeholder="Message"></textarea></div>
													<?php if (isset($errorcontact['discriptionError'])) {
													echo "<br/><span class=\"messageClass\">".$errorcontact['discriptionError']."</span>";
													}?>
													<?php if (isset($errorcontact2['user_emailError'])) {
													echo "<br/><span style=\"color:green\" class=\"messageClass\">".$errorcontact2['user_emailError']."</span>";
													}?>
                                  </div>
                                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                      <div class="field-inner theme-btn"><button type="submit" name="btncontact" class="thm-btn">Submit Now</button></div>
                                  </div>
                              </div>
                              
                          </form>
                      </div>
                  </div>
                  
                  <!--Image Column-->
                  <div class="image-column col-lg-5 col-md-4 col-sm-12 col-xs-12">
                  <figure class="image"><img src="images/resources/man-with-tab.png" alt=""></figure>
                  </div>
                  
              </div>
          </div>
        </section>
<?php 
include 'include/index_footer.php';
?>	
