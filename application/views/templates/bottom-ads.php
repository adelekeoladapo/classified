                        <div class="side-bar">
                            <ul class="side-ads">
                                <?
                                    foreach ($adverts as $advert){
                                        if($advert->advert_position == "Bottom"){
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