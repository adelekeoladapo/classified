                        <div class="side-bar">
                            
                            <!-- Facebook Like Box-->
                            <div class="fb-page" data-href="https://www.facebook.com/HomeBuds-150758782016960/" data-tabs="timeline" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" style="margin-bottom: 20px; border-radius: 3px;">
                                <blockquote cite="https://www.facebook.com/HomeBuds-150758782016960/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/HomeBuds-150758782016960/">HomeBuds</a></blockquote>
                            </div>
                            <!--End Facebook Like Box -->
                            
                            <ul class="side-ads">
                                <?
                                    foreach ($adverts as $advert){
                                        if($advert->advert_position == "Side"){
                                            if($advert->advert_type == "Image"){
                                                echo '<li>
                                                        <img src="'.base_url().'assets/images/uploads/'.$advert->advert_content.'">
                                                    </li>';
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                        </div>