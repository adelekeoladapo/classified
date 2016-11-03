    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1431561700396653";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="block top-block">
        <div class="top">
            <div class="country">
                <li class="fa fa-map-marker"></li> Nigeria  <li class="fa fa-angle-down btn-select-country"></li>
                <ul class="country-list">
                    <li class="title"><a href="#">Countries</a></li>
                    <?
                        foreach($this->LocationModel->getCountries() as $country){
                            echo '<li><a href="#">'.$country->country_name.'</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="btn-socials pull-right">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/HomeBuds-150758782016960/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Homebuds_Intl" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/homebuds/" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default block header">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#links" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<? echo base_url(); ?>">
                    <img alt="Brand" src="<? echo base_url(); ?>assets/images/logo2.png">
                </a>
            </div>
            <!--Links-->
            <div class="collapse navbar-collapse" id="links">
                
                <?
                    if($this->session->logged_in){
                        echo '<ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="'.base_url().'logout">Logout <i class="fa fa-power-off"></i></a>
                                </li>
                                <li>
                                    <a href="'.base_url().'my-profile">My Account <i class="fa fa-user"> </i> </i></a>
                                </li>
                                <li class="divider-vertical">
                                </li>
                                <li>
                                    <a class="btn btn-post-ad" href="'.base_url().'post-ad">Post Free Ad</a>
                                </li>
                            </ul>';
                    }else{
                        echo '<ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="'.base_url().'login">Login</a>
                                </li>
                                <li>
                                    <a href="'.base_url().'sign-up">Signup</a>
                                </li>
                                <li class="divider-vertical">
                                <li>
                                    <a class="btn btn-post-ad" href="'.base_url().'login">Post Free Ad</a>
                                </li>
                            </ul>';
                    }
                ?>
                
            </div>
        </div>
    </nav>