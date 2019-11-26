<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Add Models</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Product/view_models');?>" class="btn btn-primary">View Models</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_model"'); ?>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Select Brand</label>
                    <div class="col-lg-6">
                        <select name="brand" class="form-control" id="brand" required>
                            <option value="">Select Brand</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Model</label>
                    <div class="col-lg-6">
                        <input type="text" name="model" value="<?= set_value('model'); ?>" class="form-control" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Icon</label>
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
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Import Models By Excel File</h5>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a href="" id="download_sample_model" class="btn btn-primary">Download Sample</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error_file"></div>
                <div id="success_file"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="import_model"'); ?>



                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Upload Excel File</label>
                    <div class="col-lg-6">
                        <input type="file" name="excel_file" class="form-control" required>

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
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url('Product/fetch_brand'); ?>",
            method:"POST",
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#brand").append('<option value="' + value.id + '">' + value.brand + '</option>');
                });
            }
        });
    });

    $(document).on('change','#brand',function(){
        let brand = $('#brand').val();
        if(brand != '') {
            $('#download_sample_model').attr("href", "<?= base_url('Product/export_model/');?>" + brand);
        }
        else{
            $('#download_sample_model').attr("href", "");
        }
    });

    $('#add_model').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/insert_model'); ?>',
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

                    $("input[name='model']").val('');
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

    $('#download_sample_model').click(function(e){

        let brand = $('#brand').val();
        if(brand != ''){
            $('#error_file').hide();
        }
        else{
            e.preventDefault();
            $('#error_file').html("<div class='alert alert-danger'>"+
                "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                "<strong>Error! </strong>" + "Please select a brand" +
                "</div>");
        }
    });

    $('#import_model').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/import_model'); ?>',
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

    $("#l_model").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');
</script>
