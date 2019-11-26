<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" style="padding: 0px;">
                <section class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pincode</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div id="error"></div>
                        <?php echo form_open('', 'class="form-horizontal form-bordered" id="edit_pincode_form"'); ?>
                        <div class="row">



                            <div class="form-group col-sm-12">
                                <label>City</label>

                                <select name="city_u" id="city_u" class="form-control" required>
                                    <option value="" disabled selected>Select City</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Pincode</label>

                                <input type="text" name="pincode_u" value="" onkeypress="return ((event.charCode >= 48 &&  event.charCode <= 57) || (event.charCode >= 0 && event.charCode <= 31) )" maxlength="6" class="form-control" placeholder="">


                            </div>



                            <input type="hidden" name="id_u" value="">

                            <div class="form-group col-md-12 text-center">
                                <button type="submit" name="update" class="mb-1 mt-1 mr-1 btn btn-info">Update</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">

                <div id="success"></div>
                <div id="error"></div>

                <div class="row">
                    <div class="col-md-7">
                        <h4>Pincodes</h4>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-danger" id="delete_multi" disabled>Delete Selected</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('Location/add_pincode');?>" class="btn btn-primary">Add New Pincode</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="pincode_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>
                                <input type='checkbox' name='check_all' class='check_all'">
                            </th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($result as $row): ?>
                            <tr class="text-center">
                            <td>
                                    <input type='checkbox' name='multi_del' class='multi_del' value="<?=$row['pin_id']; ?>">
                                </td>

                                <td>
                                    <?= $row['city_name']; ?>
                                </td>
                                <td>
                                    <?= $row['pincode']; ?>
                                </td>
                                <td>
                                         <span data-toggle="modal" data-target="#editModal">
                                          <a class="btn btn-primary btn-sm updateUser" id="<?= $row['pin_id']; ?>" name="updateMarks" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                     </span>
                                    <a href="" class="btn btn-danger btn-sm item_delete deleteUser" id="<?= $row['pin_id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready( function () {
        $('#pincode_table').DataTable();

        $.ajax({
            url:"<?php echo base_url('Location/fetch_all_cities'); ?>",
            method:"POST",
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#city_u").append('<option value="' + value.id + '">' + value.city_name + '</option>');
                });
            }
        });
    });

    $('#editModal').on('hidden.bs.modal', function(e) {
        $(this).find('#edit_pincode_form')[0].reset();
        $("#error").hide();
    });

    $(document).on('click','.updateUser',function(){

        var id = $(this).attr("id");
        $('#city_u option:selected').removeAttr('selected');

        $.ajax({
            url:"<?php echo base_url('Location/fetch_pincode_single'); ?>",
            data: {id:id},
            method:"POST",
            dataType:"json",
            success: function (data){
                $('#editModal').modal('show');
                $("#city_u option[value= '"+data.city_id+"' ]").attr("selected", "selected");
                $("input[name='pincode_u']").val(data.pincode);
                $("input[name='id_u']").val(data.pin_id);
            }
        });
    });

    $('#edit_pincode_form').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('Location/update_pincode') ?>',
            method: 'POST',
            dataType:"json",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data){
                if(data.error === 0){
                    $("#editModal").modal('hide');
                    Swal.fire({
                        text: "Record updated successfully",
                        showCancelButton: false,
                            showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();

                }
                else{
                    $('#error').html("<div class='alert alert-danger'>" +
                        "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                        "<strong>Error! </strong>" + data.msg +
                        "</div>");
                }
            }
        });
    });
    
    $(".check_all").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });


    $(document).on('click','.deleteUser',function(e){

        e.preventDefault(e);

        let id = $(this).attr('id');
        let table_name = "cls_city_pincode";
        let path = "./upload/cities/";
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
                            location.reload();
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
                location.reload();
            }
        });
    });
    
    $(".multi_del").click(function() {

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


        let table_name = "cls_city_pincode";
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
                            location.reload();
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
                location.reload();
            }
         });
    });

    $("#l_pincode").addClass('active');
    $("#l_location").addClass('pcoded-trigger active');

</script>


