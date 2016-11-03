<div class="row page-content">
    <div class="page-title">
        <a href="#">Admin /</a> {{ admin.admin_firstname+" "+admin.admin_lastname }}
    </div>
    <!-- Back Button -->
    <a ui-sref="admins" class="btn default-btn-back"><i class="fa fa-arrow-circle-left"></i> Back</a>
    <!-- End Back Button -->
    <div class="col-md-12 page-inner">
        <div class="split-block">
            <div class="title-div">
                <ul>
                    <li class="active" data-url="pane-1">Basic Information</li>
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
                                        {{ admin.admin_username }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Date Registered
                                    </td>
                                    <td class="info-item-descr">
                                        {{ (admin.admin_date_added != '0000-00-00 00:00:00') ? factory.formatDate_2(admin.admin_date_added) : '' }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Date Last Logged In 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ (admin.admin_last_loged_in != '0000-00-00 00:00:00') ? factory.formatDate_2(admin.admin_last_loged_in) : '' }}
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
                                        {{ admin.admin_phone }}
                                    </td>
                                </tr>
                                <tr class="info-item">
                                    <td class="info-item-title">
                                       Email 
                                    </td>
                                    <td class="info-item-descr">
                                        {{ admin.admin_email }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <div class="user-btns">

                                <!--<button ng-show="(user.user_status == 1) ? true : false " class="btn btn-default btn-deactivate-user" ng-click="deactivateUser()"><i class="ion ion-close-round"></i>Deactivate User</button>

                                <button ng-show="(user.user_status == 1) ? false : true " class="btn btn-default btn-activate-user" ng-click="activateUser()"><i class="ion ion-checkmark-round"></i>Activate User</button>-->

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
