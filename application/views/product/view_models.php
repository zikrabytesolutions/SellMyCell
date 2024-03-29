<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" style="padding: 0px;">
                <section class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Models</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div id="error"></div>
                        <?php echo form_open('', 'class="form-horizontal form-bordered" id="edit_model_form"'); ?>
                        <div class="row">



                            <div class="form-group col-sm-12">
                                <label>Brand</label>

                                <select name="brand_u" disabled id="brand_u" class="form-control" required>
                                    <option value="" disabled selected>Select Brand</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Model</label>

                                <input type="text" name="model_u" value="" class="form-control" placeholder="">


                            </div>

                            <div class="form-group col-md-12">
                                <label>Icon</label>

                                <input type="file" accept="image/*" name="icon_u" value="" class="form-control" placeholder="" onchange="loadFile(event)">


                            </div>

                            <div class="col-md-12 text-center">
                                <img id="preview_img" src="" height="50" width="50">
                            </div>


                            <input type="hidden" name="id_u" value="">

                            <input type="hidden" name="brand_h" value="">

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
                    <div class="col-md-7">
                        <h4>Models</h4>
                    </div>
                    <div class="col-md-5">
                        <div class=row>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-danger" id="delete_multi" disabled>Delete Selected</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('Product/add_models');?>" class="btn btn-primary">Add New Models</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="brand_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr class="text-center">
                             <th>
                                   
                                 
                                <input type='checkbox' name='check_all' class='check_all'">
                               
                            </th>
                             <th>Model Id</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

<!--                        --><?php //foreach ($result as $row): ?>
<!--                            <tr class="text-center">-->
<!--                                <td>-->
<!--                                  -->
<!--                                    <input type='checkbox' name='multi_del' class='multi_del' value="--><?//=$row['id']; ?><!--">-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['id']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['brand']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['model']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    <img src="--><?//= base_url();?><!--upload/models/--><?//=$row['icon']; ?><!--" height="50" width="50">-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                         <span data-toggle="modal" data-target="#editModal">-->
<!--                                          <a class="btn btn-primary btn-sm updateUser" id="--><?//= $row['id']; ?><!--" name="updateMarks" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>-->
<!--                                     </span>-->
<!--                                    <a href="" class="btn btn-danger btn-sm item_delete deleteUser" id="--><?//= $row['id']; ?><!--" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                        --><?php //endforeach; ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready( function () {
        $('#brand_table').DataTable({
            'ajax': '<?= base_url('Product/get_models')?>',
              scrollY:        "500px",
            // scrollX:        true,
            scrollCollapse: true,
            paging:         true,

        });

        $.ajax({
            url:"<?php echo base_url('Product/fetch_brand'); ?>",
            method:"POST",
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#brand_u").append('<option value="' + value.id + '">' + value.brand + '</option>');
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
        $('#brand_u option:selected').removeAttr('selected');

        $.ajax({
            url:"<?php echo base_url('Product/fetch_model_details'); ?>",
            data: {id:id},
            method:"POST",
            dataType:"json",
            success: function (data){
            console.log(data);
                $('#editModal').modal('show');
                var img='<?= base_url(); ?>upload/models/'+data.icon;
                $("#brand_u option[value= '"+data.brand_id+"' ]").attr("selected", "selected");
                $("input[name='model_u']").val(data.model);
                // $("input[name='icon_u']").attr("placeholder",data.icon);
                $("input[name='id_u']").val(data.id);
                $("input[name='brand_h']").val(data.brand_id);

                $("#preview_img").attr("src",img);
            }
        });
    });

    $('#edit_model_form').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('Product/update_model') ?>',
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
                    $('#brand_table').DataTable().ajax.reload(null, false);

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
        if($(".multi_del:checked").length > 0){
            $('#delete_multi').removeAttr("disabled","disabled");
        }
        else{
            $('#delete_multi').attr("disabled","disabled");
        }
    });

    $(document).on('click','.deleteUser',function(e){

        e.preventDefault(e);

        let id = $(this).attr('id');
        let table_name = "cls_m_model";
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
                            $('#brand_table').DataTable().ajax.reload(null, false);
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
                $('#brand_table').DataTable().ajax.reload(null, false);
            }
        });
    });
    $(document).on('click','.multi_del', function() {

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
        
      

        let table_name = "cls_m_model";
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
                    url: '<?= base_url('Product/common_multi_delete'); ?>',
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
                            $('#brand_table').DataTable().ajax.reload(null, false);
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
                $('#brand_table').DataTable().ajax.reload(null, false);
            }
         });
         
         
    });

    $("#l_model").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');

</script>


