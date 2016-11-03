<!DOCTYPE html>
<html>
    <head>
        <title>About Us | HomeBuds</title>

        <!--CSS-Links-->
        <? include 'templates/css-links.php'; ?>
        <!--End CSS-Links-->

    </head>
    <body>

        <!--Header-->
        <? include 'templates/header.php'; ?>
        <!--End Header-->

        <div class="block search-block">
            <div class="search-filters">
                <h4>
                    What we are all about
                </h4>
            </div>
        </div>

        <!--Page Body-->
        <div class="block page-content">
            <div class="container-fluid">
                <div class="row"> 
                    <!--Breacrumb-->
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<? echo base_url(); ?>">Home</a></li>
                            <li class="active">About Us</li>
                        </ol>
                    </div>
                    <!--End Breacrumb-->
                    <!--Main content-->
                    <div class="col-md-8 col-sm-8 minus-padding-right">
                        <div class="static-page-content">
                            <h4>About Homebuds</h4>
                            <p>
                                Homebuds is the connection between individuals that need home services and service providers, in Nigeria. 
                            </p>
                            
                            <p>
                                Homebuds was started in 2016 (so we are very much a new startup) as the solution to the difficulty in sourcing quick and reliable home services in Nigeria. 
                            </p>
                            <p>
                                CEO, Zainab, was regularly frustrated by the difficulty and word-of-mouth effort it took to find any sort of home service in Nigeria. 
                            </p>
                            <p>
                                Whether you are looking for a professional masseuse, handyman (or woman), makeup artist, cleaner, cook, or someone to fan you (although we hope not!), our goal is to provide the quickest and most convenient platform for busy home bodies in Nigeria to book home services.
                            </p>
                            
                        </div>
                        <!-- Bottom Adverts -->
                        <? include 'templates/bottom-ads.php'; ?>
                        <!-- Bottom Adverts -->
                        
                    </div>

                    <!--Side Bar-->
                    <div class="col-md-4 col-sm-4">
                        
                        <!-- Side ads -->
                        <? include 'templates/side-ads.php'; ?>
                        <!-- End Side ads -->
                        
                    </div>
                    <!--End side bar-->
                </div>
            </div>
        </div>
        <!--End Page Body-->

        <!--Footer-->
        <? include 'templates/footer.php'; ?>
        <!--End Footer-->

        <!--JS-Links-->
        <? include 'templates/js-links.php'; ?>
        <!--End JS-Links-->
        
    </body>
</html>
