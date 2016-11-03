<div class="row page-content">
    <div class="page-title">
        <a href="#">User /</a> {{ user.user_firstname+" "+user.user_lastname }}
    </div>
    <!-- Back Button -->
    <a ui-sref="users" class="btn default-btn-back"><i class="fa fa-arrow-circle-left"></i> Back</a>
    <!-- End Back Button -->
    <div class="col-md-12 page-inner">
        <div class="split-block">
            <div class="title-div">
                <ul>
                    <li class="active" data-url="pane-1">Basic Information</li>
                    <li data-url="pane-2">Payments History</li>
                </ul>
            </div>
            <div class="content-div">
                <div class="active" id="pane-1">
                    <div class="row">
                        <div class="col-md-4 info-block">
                            <table class="table">
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Username 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ user.user_username }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Account Type 
                                    </td>
                                    <td class="info-item-descr" ng-init="type = (user.user_account_type == 1) ? 'Basic' : 'Premium' ">
                                        {{ type }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Date Registered
                                    </td>
                                    <td class="info-item-descr">
                                        {{ factory.formatDate_2(user.user_date_registered) }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Date Activated 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ factory.formatDate_2(user.user_date_activated) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 info-block">
                            <table class="table">
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Phone 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ user.user_phone }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Email 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ user.user_email }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Address
                                    </td>
                                    <td class="info-item-descr">
                                        {{ user.location_address+", "+user.state_name }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Country 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ user.country_name }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <div class="user-btns">

                                <button ng-show="(user.user_account_type == 1) ? true : false " class="btn btn-default btn-boost" ng-click="showBoostAccOverlay()"><i class="ion ion-checkmark-circled"></i>Boost Account</button>

                                <button ng-show="(user.user_status == 1) ? true : false " class="btn btn-default btn-deactivate-user" ng-click="deactivateUser()"><i class="ion ion-close-round"></i>Deactivate User</button>

                                <button ng-show="(user.user_status == 1) ? false : true " class="btn btn-default btn-activate-user" ng-click="activateUser()"><i class="ion ion-checkmark-round"></i>Activate User</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="pane-2">
                    <table class="table table-striped table-hover table-responsive" datatable="ng">
                        <thead class="table-bordered">
                            <tr>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Date Paid</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Status-2</th>
                                <!--<th></th>-->
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            <tr ng-repeat="payment in payments">
                                <td>{{ payment.transaction_id }}</td>
                                <td>₦{{ factory.number_format(payment.amount_paid) }}</td>
                                <td>{{ factory.formatDate_2(payment.date) }}</td>
                                <td>{{ payment.method }}</td>
                                <td>{{ payment.status }}</td>
                                <td ng-init="used = (payment.used == 1) ? 'Used' : 'Unused' " >{{ used }}</td>
                                <!--<td class="tb-btn">
                                    <i ng-hide="" class="ion ion-clipboard tb-btn-primary tb-btn-view" ui-sref="user({ id:payment.user_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View User" onmouseenter="$(this).tooltip('show')"></i>
                                </td>-->
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Boost Account Form -->
<div class="row transparent-overlay" id="boost-account-overlay">
    <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="content">
            <div class="title">
                Boost Account
            </div>
            <div class="middle">
                <form id="form-boost-account">
                    <div class="form-group">
                        <label class="control-label" for="payment_code">Transaction ID <span class="required-field"> *</span></label>
                        <input type="text" class="form-control" required id="payment_code" name="payment_code" ng-model="Category.category_name">
                    </div>
                </form>
            </div>
            <div class="footer">
                <button class="btn" ng-click="hideBoostAccOverlay()">Cancel</button>
                <button class="btn fg-primary" ng-click="boostAccount()">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Boost Account Form -->