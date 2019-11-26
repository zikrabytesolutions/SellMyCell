<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" style="padding: 0px;">
                <section class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit State</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div id="error"></div>
                        <?php echo form_open('', 'class="form-horizontal form-bordered" id="edit_state_form"'); ?>
                        <div class="row">



                            <div class="form-group col-sm-12">
                                <label>State</label>

                                <input type="text" name="state_u" id="state_u" value="" class="form-control" placeholder="" required>

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

                <div class="row">
                    <div class="col-sm-6">
                        <h4>States</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Location/add_state');?>" class="btn btn-primary">Add New State</a>
                    </div>
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="state_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>Brand</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($result as $row): ?>
                            <tr class="text-center">

                                <td>
                                    <?= $row['state_name']; ?>
                                </td>

                                <td>
                                         <span data-toggle="modal" data-target="#editModal">
                                          <a class="btn btn-primary btn-sm updateUser" id="<?= $row['id']; ?>" name="updateMarks" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                     </span>
                                    <a href="" class="btn btn-danger btn-sm item_delete deleteUser" id="<?= $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
        $('#state_table').DataTable();
    });



    $(document).on('click','.updateUser',function(){

        var id = $(this).attr("id");

        $.ajax({
            url:"<?php echo base_url('Location/fetch_state'); ?>",
            data: {id:id},
            method:"POST",
            dataType:"json",
            success: function (data) {
                $('#editModal').modal('show');

                $("input[name='state_u']").val(data.state_name);
                $("input[name='id_u']").val(data.id);

            }
        });
    });

    $('#edit_state_form').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('Location/update_state') ?>',
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

    $(document).on('click','.deleteUser',function(e){

        e.preventDefault(e);

        let id = $(this).attr('id');
        let table_name = "cls_state";
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

    $("#l_state").addClass('active');
    $("#l_location").addClass('pcoded-trigger active');

</script>


