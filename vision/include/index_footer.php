		<footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 footer-colmun">
                    <div class="footer-wideget logo-wideget">
                        <div class="logo-top">
                            <div class="footer-logo">
                                <a href="index.php"></a>
                            </div>
                            <div class="text"><p>VISIONEX is the perfect place for you to buy and sell Cryptocurrency, Trade easily and securely.</p></div>
                            <a href="#"><i class="fa fa-long-arrow-right"></i>more about us</a>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12 footer-colmun">
                    <div class="footer-wideget contact-widget">
                        <div class="footer-title"><h5>Contact us</h5></div>
                        <div class="single-item">
                            <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                            <div class="text"><p> India</p></div>
                        </div>
                       <div class="single-item">
                            <div class="icon-box"><i class="fa fa-envelope"></i></div>
                            <div class="text"><p>Email: info@visionex.com</p></div>
                        </div>
                        <div class="footer-social">
                            <div class="footer-title"><h5>we are social</h5></div>
                            <ul class="social-list">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-6 col-xs-12 footer-colmun" id="contact">
                	<div class="sec-title ">
                          <h2 class="left">Request A Call Back</h2>
                          <p>We do our best to respond to your queries quickly, it could take us 1-2 business days to get back to you. </p>
                          <p>Feel free to Drop Your Message.</p>
                      </div>
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
                  <!--   <div class="footer-wideget contact-widget">
                        <div class="footer-title"><h5>Contact us</h5></div>
                        <div class="single-item">
                            <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                            <div class="text"><p> India</p></div>
                        </div>
                       <div class="single-item">
                            <div class="icon-box"><i class="fa fa-envelope"></i></div>
                            <div class="text"><p>Email: info@visionex.com</p></div>
                        </div>
                        <div class="footer-social">
                            <div class="footer-title"><h5>we are social</h5></div>
                            <ul class="social-list">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="copyright">Copyright © 2017 <a href="#">VISIONEX.</a> All rights reserved.</div>
        </div>
    </div>



	<!-- Scroll Top Button -->
	<button class="scroll-top tran3s color2_bg">
		<span class="fa fa-angle-up"></span>
	</button>
	<!-- pre loader  -->
	<div class="preloader"></div>

		<!-- jQuery js -->
		<script src="js/jquery.js"></script>
		<!-- bootstrap js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- jQuery ui js -->
		<script src="js/jquery-ui.js"></script>
		<!-- owl carousel js -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- jQuery validation -->
		<script src="js/jquery.validate.min.js"></script>
		<!-- google map -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script> 
		<script src="js/gmap.js"></script>
		<!-- mixit up -->
		<script src="js/wow.js"></script>
		<script src="js/jquery.mixitup.min.js"></script>
		<script src="js/jquery.fitvids.js"></script>
		<script src="js/bootstrap-select.min.js"></script>

		<!-- revolution slider js -->
		<script src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
		<script src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script src="assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

		<!-- fancy box -->
		<script src="js/jquery.fancybox.pack.js"></script>
		<script src="js/jquery.polyglot.language.switcher.js"></script>
		<script src="js/nouislider.js"></script>
		<script src="js/jquery.bootstrap-touchspin.js"></script>
		<script src="js/SmoothScroll.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/jquery.countTo.js"></script>
		<script src="js/jquery.flexslider.js"></script>
		<script src="js/imagezoom.js"></script>	
		<script src="js/validation.js"></script>
		<script id="map-script" src="js/default-map.js"></script>
		<script src="js/custom.js"></script>

	</div>
	
</body>

</html>



