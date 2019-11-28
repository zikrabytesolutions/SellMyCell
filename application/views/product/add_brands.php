

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Add Brands</h4>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Product/view_brands');?>" class="btn btn-primary">View Brands</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_brand"'); ?>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Brand</label>
                    <div class="col-lg-6">
                        <input type="text" name="brand" value="<?= set_value('brand'); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Icon</label>
                    <div class="col-lg-6">
                            <input type="file" name="icon" accept="image/*" value="<?= set_value('icon'); ?>" class="form-control" required>

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
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Import Brands By Excel File</h5>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Product/export_brand');?>" class="btn btn-primary">Download Sample</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error_file"></div>
                <div id="success_file"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="import_brand"'); ?>



                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Upload Excel File</label>
                    <div class="col-lg-6">
                        <input type="file" name="excel_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" required>

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
<script>


    $('#add_brand').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/insert_brand'); ?>',
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

                   $("input[name='brand']").val('');
                   $("input[name='icon']").val('');
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

    $('#import_brand').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/import_brand'); ?>',
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType: 'json',
            success: function(data){

                if(data.error === 0){

                    $('#success_file').html("<div class='alert alert-success'>" +
                        "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                        "<strong>Success! </strong>" + data.msg +
                        "</div>");

                    $("input[name='excel_file']").val('');
                    $("#error_file").hide();
                }
                else{
                    $('#error_file').html("<div class='alert alert-danger'>" +
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

    $("#l_brand").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');
</script>
