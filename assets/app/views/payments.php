<!--Student List Block-->
<div>
    <div class="row page-content">
        <div class="page-title">
            Manage Payments
        </div>
        <div class="col-md-12 page-inner">
            <table class="table table-striped table-hover table-responsive" datatable="ng">
                <thead class="table-bordered">
                    <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Paid By</th>
                        <th>Date Paid</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Status-2</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <tr ng-repeat="payment in payments">
                        <td>{{ payment.transaction_id }}</td>
                        <td>₦{{ factory.number_format(payment.amount_paid) }}</td>
                        <td>{{ payment.user_firstname+" "+payment.user_lastname }}</td>
                        <td>{{ factory.formatDate_2(payment.date) }}</td>
                        <td>{{ payment.method }}</td>
                        <td>{{ payment.status }}</td>
                        <td ng-init="used = (payment.used == 1) ? 'Used' : 'Unused' " >{{ used }}</td>
                        <td class="tb-btn">
                            <i ng-hide="" class="ion ion-clipboard tb-btn-primary tb-btn-view" ui-sref="user({ id:payment.user_id })" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View User" onmouseenter="$(this).tooltip('show')"></i>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
<!--End Student List Block-->
