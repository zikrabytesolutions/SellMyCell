<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" style="padding: 0px;">
                <section class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Brands</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div id="error"></div>
                        <?php echo form_open('', 'class="form-horizontal form-bordered" id="edit_brand_form"'); ?>
                        <div class="row">



                            <div class="form-group col-sm-12">
                                <label>Brand</label>

                                <input type="text" name="brand_u" id="brand_u" value="" class="form-control" placeholder="" required>

                            </div>

                            <div class="form-group col-md-12">
                                <label>Icon</label>

                                <input type="file" name="icon_u" accept="image/*" value="" class="form-control" placeholder="" onchange="loadFile(event)">


                            </div>

                            <div class="col-md-12 text-center">
                                <img id="preview_img" src="" height="50" width="50">
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
                        <h5>Brands</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Product/add_brands');?>" class="btn btn-primary">Add New Brands</a>
                    </div>
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                                            <table id="brand_table" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Brand Id</th>
                                                    <th>Brand</th>
                                                    <th>Icon</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($result as $row): ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?= $row['id']; ?>
                                                        </td>

                                                        <td>
                                                            <?= $row['brand']; ?>
                                    </td>
                                    <td>
                                        <img src="<?= base_url();?>upload/brands/<?=$row['icon']; ?>" height="50" width="80">
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
        $('#brand_table').DataTable();
    });


    var loadFile = function(event) {
        var output = document.getElementById('preview_img');
        output.src = URL.createObjectURL(event.target.files[0]);
    };


    $(document).on('click','.updateUser',function(){

        var id = $(this).attr("id");

        $.ajax({
            url:"<?php echo base_url('Product/fetch_brand_details'); ?>",
            data: {id:id},
            method:"POST",
            dataType:"json",
            success: function (data) {
                $('#editModal').modal('show');
                var img='<?= base_url(); ?>upload/brands/'+data.icon;
                $("input[name='brand_u']").val(data.brand);
                $("input[name='icon_u']").attr("placeholder",data.icon);
                $("input[name='id_u']").val(data.id);
                $("#preview_img").attr("src",img);
            }
        });
    });

    $('#edit_brand_form').submit(function(e){
        e.preventDefault();

        $.ajax({
                url: '<?= base_url('Product/update_brand') ?>',
                method: 'POST',
                dataType:"json",
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function(data){
                    if(data.error === 0){
                        $("#editModal").modal('hide');
                        Swal.fire({
                            text: "Record Updated successfully",
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
        let table_name = "cls_m_brand";
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
                    url: '<?= base_url('Product/common_delete'); ?>',
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

    $("#l_brand").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');

</script>


