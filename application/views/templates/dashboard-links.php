                        <div class="col-md-12">
                            <div class="dashboard">
                                <div class="row">
                                    <div class="col-md-5 col-sm-12 col-xs-12 user">
                                        <i class="fa fa-user"></i> <? echo $this->session->user_firstname." ".$this->session->user_lastname; ?>
                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12 links">
                                        <div class="header-data">
                                            <div class="hdata">
                                                <div class="mcol-left">
                                                    <i class="fa fa-clone"></i>
                                                </div>
                                                <div class="mcol-right">
                                                    <p>
                                                        <a href="<? echo base_url()."manage-ads"; ?>"><? echo $this->ProductModel->getUserProductCount($this->session->user_id); ?></a>
                                                        <em>Ads</em>
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="hdata">
                                                <div class="mcol-left">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <div class="mcol-right">
                                                    <p>
                                                        <a href="<? echo base_url()."messages"; ?>"><? echo $this->MailModel->getUserUnreadMailCount($this->session->user_id) ?></a>
                                                        <em>Msgs</em>
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="hdata">
                                                <div class="mcol-left">
                                                    <i class="fa fa-gear"></i>
                                                </div>
                                                <div class="mcol-right">
                                                    <p>
                                                        <a href="<? echo base_url()."my-profile"; ?>">My</a>
                                                        <em>Profile</em>
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>