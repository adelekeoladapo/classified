<div class="row page-content">
    <div class="page-title">
        Manage Adverts
    </div>
    <div class="col-md-12 top-btns">
        <a ui-sref="new-advert" class="btn btn-primary"><i class="fa fa-plus-circle"> </i> Add</a>
        <!--<button class="btn btn-back"><i class="fa fa-arrow-circle-left"></i> Back</button>-->
    </div>
    <div class="col-md-12 page-inner">
        <table class="table table-striped table-hover table-responsive" datatable="ng">
            <thead class="table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Position</th>
                    <th>Date Added</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-bordered">
                <tr ng-repeat="advert in adverts">
                    <td>{{ advert.advert_title }}</td>
                    <td>{{ advert.advert_type }}</td>
                    <td>{{ advert.advert_position }}</td>
                    <td>{{ factory.formatDate_1(advert.advert_date_added) }}</td>
                    <td class="tb-btn" ng-init="status = advert.advert_activated">
                        <i class="ion {{ (status == 1) ? 'ion-arrow-graph-down-right tb-btn-edit' : 'ion-arrow-graph-up-right tb-btn-view' }}" ng-init="dd = advert.advert_id;" ng-click="toggleStatus(dd, status)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="{{ (status == 0) ? 'Activate' : 'Deactivate' }}" onmouseenter="$(this).tooltip('show')"></i>
                        <i class="ion ion-close tb-btn-primary tb-btn-delete" ng-init="id = advert.advert_id" ng-click="deleteAdert(id)" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Delete" onmouseenter="$(this).tooltip('show')"></i>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>