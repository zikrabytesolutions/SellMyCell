
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">

                <div id="success"></div>

                <div class="row">
                    <div class="col-sm-6">
                        <h5>Users</h5>
                    </div>
<!--                    <div class="col-sm-6 text-right">-->
<!--                        <a href="--><?//= base_url('Location/add_pincode');?><!--" class="btn btn-primary">Add New Pincode</a>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="user_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($result as $row): ?>
                            <tr class="text-center">

                                <td>
                                    <?= $row['full_name']; ?>
                                </td>
                                <td>
                                    <?= $row['mobile']; ?>
                                </td>
                                <td>
                                    <?= $row['email']; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>

            </div>
            <!--<div id="test">-->
                
            <!--</div>-->
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('#user_table').DataTable({
           responsive: true,
            "lengthChange": true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
       });
    });

    $("#l_view_user").addClass('active');
    $("#l_users").addClass('pcoded-trigger active');
</script>
