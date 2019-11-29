<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Add Unavailability  Time Slots</h4>
                    </div>

                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_time_slot"'); ?>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Date</label>
                    <div class="col-lg-6">
                        <input type="text" id="slot_date" name="slot_date" value="<?= set_value('time_slot'); ?>" autocomplete="off" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">

                    <label class="col-md-3 control-label text-lg-right pt-2" for="inputDefault">Time Slot</label>
                    <div class="col-md-2">
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" class="timeslot" name="time_9_12" value="1">
                                    <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    9AM - 12PM
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">

                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" class="timeslot" name="time_12_3" value="1">
                                    <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    12PM - 3PM
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" class="timeslot" name="time_3_6" value="1">
                                    <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    3PM - 6PM
                                </label>
                            </div>
                        </div>

                    </div>



                </div>


                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="mb-1 mt-1 mr-1 btn btn-info">Submit</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">

                <div id="success"></div>

                <div class="row">
                    <div class="col-md-7">
                        <h4>Time Slots</h4>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-danger" id="delete_multi" disabled>Delete Selected</button>
                            </div>
<!--                            <div class="col-sm-6">-->
<!--                                <a href="--><?//= base_url('Product/add_variants');?><!--" class="btn btn-primary">Add New Variant</a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="time_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr class="text-center">
                            <th>
                                <input type='checkbox' name='check_all' class='check_all'">

                            </th>
                            <th>Date</th>
                            <th>9AM - 12PM</th>
                            <th>12PM - 3PM</th>
                            <th>3PM - 6PM</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">



                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){

        $('#time_table').DataTable({
            'ajax': '<?= base_url('product/get_time_slot')?>',
            scrollY:        "500px",
            // scrollX:        true,
            scrollCollapse: true,
            paging:         true,

        });


    });

    $('#slot_date').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        prevText: '<i class="fa fa-caret-left"></i>',
        nextText: '<i class="fa fa-caret-right"></i>',
        // onClose: function(selectedDate) {
        //     $('#time_slot').datepicker("option", "maxDate", selectedDate);
        // }
    });

    $(document).on('click','.check_all',function(){
        $("input[name='multi_del']").not(this).prop('checked', this.checked);
        if($(".multi_del:checked").length > 0){
            $('#delete_multi').removeAttr("disabled","disabled");
        }
        else{
            $('#delete_multi').attr("disabled","disabled");
        }
    });


    $(document).on('click','.multi_del',function() {


        if($(".multi_del:checked").length > 0){
            $('#delete_multi').removeAttr("disabled","disabled");
        }
        else{
            $('#delete_multi').attr("disabled","disabled");
        }

    });

    $(document).on('click','#delete_multi',function(e){

        e.preventDefault(e);

        var id = [];
        $.each($("input[name='multi_del']:checked"), function(){
            id.push($(this).val());
        });




        let table_name = "cls_time_slot";
        let path = "./upload/models/";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: '<?= base_url('Product/delete_all'); ?>',
                    dataType: 'json',
                    method: 'POST',
                    data: {id: id,table_name:table_name,path:path},

                    success: function (data) {
                        if(data.error === 0){
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                data.msg,
                                'success'
                            );
                            $('#time_table').DataTable().ajax.reload(null, false);
                        }
                    }
                });


            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                )
                $('#time_table').DataTable().ajax.reload(null, false);
            }
        });


    });

    $(document).on('click','.deleteUser',function(e){

        e.preventDefault(e);

        let id = $(this).attr('id');
        let table_name = "cls_time_slot";
        let path = "./upload/variants/";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: '<?= base_url('Product/delete'); ?>',
                    dataType: 'json',
                    method: 'POST',
                    data: {id: id,table_name:table_name,path:path},

                    success: function (data) {
                        if(data.error === 0){
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                data.msg,
                                'success'
                            );
                            $('#time_table').DataTable().ajax.reload(null, false);
                        }
                    }
                });


            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                )
                $('#time_table').DataTable().ajax.reload(null, false);
            }
        });
    });


    $(document).on('click','.time_9_12',function(){

        let id = $(this).attr('id');

        if(confirm("Are you sure ?")) {
            if($(this).is(":checked")){

                let status = 1;
                $.ajax({
                    url: '<?= base_url('Product/update_time_9_12') ?>',
                    method: 'POST',
                    dataType:"json",
                    data: {status: status, id: id},

                    success: function(data){
                        if(data.error === 0){

                            Swal.fire({
                                text: "Record updated successfully",
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            $('#time_table').DataTable().ajax.reload(null, false);

                        }
                    }
                });
            }

            else if($(this).is(":not(:checked)")){

                let status = 0;
                $.ajax({
                    url: '<?= base_url('Product/update_time_9_12') ?>',
                    method: 'POST',
                    dataType:"json",
                    data: {status: status, id: id},

                    success: function(data){
                        if(data.error === 0){

                            Swal.fire({
                                text: "Record updated successfully",
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            $('#time_table').DataTable().ajax.reload(null, false);

                        }
                    }
                });
            }
        }
        else{
            return false;
        }



    });

    $(document).on('click','.time_12_3',function(){

        let id = $(this).attr('id');

        if(confirm("Are you sure ?")) {
            if($(this).is(":checked")){
                let status = 1;

                $.ajax({
                    url: '<?= base_url('Product/update_time_12_3') ?>',
                    method: 'POST',
                    dataType:"json",
                    data: {id: id,status: status},
                    // contentType:false,
                    // processData:false,
                    success: function(data){
                        if(data.error === 0){
                            Swal.fire({
                                text: "Record updated successfully",
                                showCancelButton: false,
                                showConfirmButton: false,
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            $('#time_table').DataTable().ajax.reload(null, false);
                        }
                    }
                });
            }

            else if($(this).is(":not(:checked)")){

                let status = 0;

                $.ajax({
                    url: '<?= base_url('Product/update_time_12_3') ?>',
                    method: 'POST',
                    dataType:"json",
                    data: {id: id,status: status},
                    // contentType:false,
                    // processData:false,
                    success: function(data){
                        if(data.error === 0){
                            Swal.fire({
                                text: "Record updated successfully",
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            $('#time_table').DataTable().ajax.reload(null, false);
                        }
                    }
                });
            }
        }

        else{
            return false;
        }

    });

    $(document).on('click','.time_3_6', function(){

        let id = $(this).attr('id');

        if(confirm("Are you sure ?")) {
            if($(this).is(":checked")){

                let status = 1;

                $.ajax({
                    url: '<?= base_url('Product/update_time_3_6') ?>',
                    method: 'POST',
                    dataType:"json",
                    data: {id: id,status: status},
                    // contentType:false,
                    // processData:false,
                    success: function(data){
                        if(data.error === 0){

                            Swal.fire({
                                text: "Record updated successfully",
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1000
                            });

                            $('#time_table').DataTable().ajax.reload(null, false);

                        }
                    }
                });
            }

            else if($(this).is(":not(:checked)")) {

                let status = 0;

                $.ajax({
                    url: '<?= base_url('Product/update_time_3_6') ?>',
                    method: 'POST',
                    dataType:"json",
                    data: {id: id,status: status},
                    // contentType:false,
                    // processData:false,
                    success: function(data){
                        if(data.error === 0){

                            Swal.fire({
                                text: "Record updated successfully",
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 1000
                            });

                            $('#time_table').DataTable().ajax.reload(null, false);
                        }
                    }
                });
            }
        }

        else{
            return false;
        }


    });





    $('#add_time_slot').submit(function(e){
        e.preventDefault();

        if($(".timeslot:checked").length > 0){
            $.ajax({
                url:'<?= base_url('product/insert_timeslot'); ?>',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                dataType: 'json',
                success: function(data){

                    if(data.error === 0){

                        $('#success').html("<div class='alert alert-success'>" +
                            "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                            "<strong>Success! </strong>" + data.msg +
                            "</div>");

                        $('#add_time_slot')[0].reset();
                        
                        $('#time_table').DataTable().ajax.reload();
                        
                        $('#error').hide();


                    }
                    else{
                        $('#error').html("<div class='alert alert-danger'>" +
                            "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                            "<strong>Error! </strong>" + data.msg +
                            "</div>");
                    }
                }
            });

            window.setTimeout(function() {
                $(".alert-success").fadeTo(500, 0,  function() {
                    $(this).hide();
                });
            }, 1000);
        }

        else{
            $('#error').html("<div class='alert alert-danger'>" +
                "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                "<strong>Error! </strong>" + "Select at least one time slot" +
                "</div>");
        }

    });
</script>