<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" style="padding: 0px;">
                <section class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit City</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div id="error"></div>
                        <?php echo form_open('', 'class="form-horizontal form-bordered" id="edit_city_form"'); ?>
                        <div class="row">



                            <div class="form-group col-sm-12">
                                <label>State</label>

                                <select name="state_u" id="state_u" class="form-control" required>
                                    <option value="" disabled selected>Select State</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>City</label>

                                <input type="text" name="city_u" value="" class="form-control" placeholder="">


                            </div>

                            <div class="form-group col-md-12">
                                <label>Icon</label>

                                <input type="file" name="icon_u" value="" class="form-control" placeholder="" onchange="loadFile(event)">


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
                        <h4>Cities</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Location/add_city');?>" class="btn btn-primary">Add New City</a>
                    </div>
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="city_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>State</th>
                            <th>City</th>
                            <th>Icon</th>
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
                                    <?= $row['city_name']; ?>
                                </td>
                                <td>
                                    <img src="<?= base_url();?>upload/cities/<?=$row['city_icon']; ?>" height="50" width="50">
                                </td>
                                <td>
                                         <span data-toggle="modal" data-target="#editModal">
                                          <a class="btn btn-primary btn-sm updateUser" id="<?= $row['city_id']; ?>" name="updateMarks" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                     </span>
                                    <a href="" class="btn btn-danger btn-sm item_delete deleteUser" id="<?= $row['city_id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
        $('#city_table').DataTable();

        $.ajax({
            url:"<?php echo base_url('Location/fetch_all_states'); ?>",
            method:"POST",
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#state_u").append('<option value="' + value.id + '">' + value.state_name + '</option>');
                });
            }
        });
    });

    var loadFile = function(event) {
        var output = document.getElementById('preview_img');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    $(document).on('click','.updateUser',function(){

        var id = $(this).attr("id");
        $('#state_u option:selected').removeAttr('selected');

        $.ajax({
            url:"<?php echo base_url('Location/fetch_city_single'); ?>",
            data: {id:id},
            method:"POST",
            dataType:"json",
            success: function (data){
                console.log(data);
                $('#editModal').modal('show');
                var img='<?= base_url(); ?>upload/cities/'+data.city_icon;
                $("#state_u option[value= '"+data.state_id+"' ]").attr("selected", "selected");
                $("input[name='city_u']").val(data.city_name);
                $("input[name='icon_u']").attr("placeholder",data.city_icon);
                $("input[name='id_u']").val(data.city_id);
                $("#preview_img").attr("src",img);
            }
        });
    });

    $('#edit_city_form').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('Location/update_city') ?>',
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
        let table_name = "cls_city";
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

    $("#l_city").addClass('active');
    $("#l_location").addClass('pcoded-trigger active');

</script>


