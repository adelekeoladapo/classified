                        <div class="boost-ad">
                            <div class="title">
                                N1,000<span>/1year</span>
                                <div>Boost Premium</div>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <span class="big">3x</span> more clients than basic ads
                                    </li>
                                    <li>
                                        Highlighting in results and categories
                                    </li>
                                    <li>
                                        Promotion in Trending Ads section
                                    </li>
                                </ul>
                                
                                
                                <!-- Payment Integration -->
                                <form method='POST' action='https://voguepay.com/pay/'>

                                    <input type='hidden' name='v_merchant_id' value='8178-0042971' />
                                    <input type='hidden' name='merchant_ref' value='<? echo $this->session->user_id; ?>' />
                                    <input type='hidden' name='memo' value='HomeBuds Premium Service' />

                                    <input type='hidden' name='notify_url' value='<? echo base_url()."api/add-payment"; ?>' />
                                    <input type='hidden' name='success_url' value='<? echo base_url()."api/add-payment"; ?>' />
                                    <input type='hidden' name='fail_url' value='<? echo base_url()."api/add-payment"; ?>' />

                                    <input type='hidden' name='item_1' value='Premium Account' />
                                    <input type='hidden' name='description_1' value='' />
                                    <input type='hidden' name='price_1' value='1000' />

                                    <input type='hidden' name='developer_code' value='pq7778ehh9YbZ' />
                                    <input type='hidden' name='store_id' value='2136' />

                                    <input type='hidden' name='total' value='1000' />

                                    <input type='image' class="btn" src='http://voguepay.com/images/buttons/buynow_blue.png' alt='Submit' />

                                    </form>
                                <!-- End Payment Integration -->
                                
                                
                                <!--<button class="btn" id=s"btn-checkout">Buy Now</button>-->
                            </div>
                        </div>