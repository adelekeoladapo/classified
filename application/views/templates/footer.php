        
        <div class="block top-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 div">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="<? echo base_url()."about-us"; ?>">About Homebuds</a></li>
                            <li><a href="<? echo base_url()."billing-policy"; ?>">Billing Policy</a></li>
                            <li><a href="<? echo base_url()."privacy-policy"; ?>">Privacy Policy</a></li>
                            <li><a href="<? echo base_url()."terms-conditions"; ?>">Terms and Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 div">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">support@homebuds.com</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 div">
                        <h4>Find Us On</h4>
                        <ul>
                            <li><a href="https://www.facebook.com/HomeBuds-150758782016960/" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/Homebuds_Intl" target="_blank"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                            <li><a href="https://www.instagram.com/homebuds/" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
                            <li><a href="https://www.pinterest.com/homebudsng/" target="_blank"><i class="fa fa-pinterest-square"></i> Pinterest</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 div">
                        <h4>Payment Methods</h4>
                        <p>
                            <img style="width: 100%;" src="<? echo base_url(); ?>assets/images/voguepay.png">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block footer">
            <div class="container-fluid">
                <div class="row down-footer">
                    <div class="col-md-6 copyright">
                        <a href="#">© 2016 Homebuds. </a> All rights reserved
                    </div>
                    <div class="col-md-6 links">
                        <ul class="footer-links">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                            <li>
                                <a href="<? echo base_url()."terms-conditions"; ?>">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal Notification -->
        <div class="transparent-overlay notification" id="notification">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 col-xs-12">
                        <div class="my-modal">
                            <!--<h4 class="m-title">Title</h4>-->
                            <div class="m-content">
                            </div>
                            <div class="m-bottom">
                                <a class="btn" id="btn-cancel">
                                    Cancel
                                </a>
                                <a class="btn" id="btn-ok">
                                    OK
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification -->
        
        
        <!-- Loading Overlay -->
        <div class="transparent-overlay loading-overlay">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 col-xs-12">
                        <div class="loader">
                            <img src="<? echo base_url(); ?>assets/images/loading.gif">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Loading Overlay -->