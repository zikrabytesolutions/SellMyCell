

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Add Banners</h5>
                    </div>


                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_banner"'); ?>



                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Banner</label>
                    <div class="col-lg-6">
                        <input type="file" name="icon" value="<?= set_value('icon'); ?>" class="form-control" required>

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
                    <div class="col-sm-6">
                        <h5>Banners</h5>
                    </div>

                </div>
            </div>
            <div class="card-block">

                <div class="dt-responsive table-responsive">

                    <table id="brand_table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr class="text-center">
                            <th>Banner</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($result as $row): ?>
                            <tr class="text-center">

                                <td>
                                    <img src="<?= base_url();?>upload/banners/<?=$row['slider_img']; ?>" height="70" width="130">
                                </td>
                                <td>

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
        $('#banner_table').DataTable();
    });

    $('#add_banner').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/insert_banner'); ?>',
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

                    $("input[name='icon']").val('');
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

        window.setTimeout(function() {
            $(".alert-success").fadeTo(500, 0,  function() {
                $(this).hide();
            });
        }, 1000);
    });

    $(document).on('click','.deleteUser',function(e){

        e.preventDefault(e);

        let id = $(this).attr('id');
        let table_name = "cls_slider";
        let path = "./upload/banners/";
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
                            // location.reload();
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

    $("#l_banner").addClass('active');
</script>
