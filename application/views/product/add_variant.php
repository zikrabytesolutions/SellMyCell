<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Add Variants</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Product/view_variants');?>" class="btn btn-primary">View Variants</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_variant"'); ?>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Select Brand</label>
                    <div class="col-lg-6">
                        <select name="brand" class="form-control" id="brand" required>
                            <option value="">Select Brand</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Select Model</label>
                    <div class="col-lg-6">
                        <select name="model" class="form-control" id="model" required>
                            <option value="">Select Model</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Variant</label>
                    <div class="col-lg-6">
                        <input type="text" name="variant" value="" class="form-control" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Icon</label>
                    <div class="col-lg-6">
                        <input type="file" accept="image/*" name="icon" value="" class="form-control" required>

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
                        <h5>Import Variants By Excel File</h5>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a href="" id="download_sample_variant" class="btn btn-primary">Download Sample</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error_file"></div>
                <div id="success_file"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="import_variant"'); ?>



                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Upload Excel File</label>
                    <div class="col-lg-6">
                        <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="excel_file" class="form-control" required>

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
    
    $('#model').select2();

    $(document).on('change','#brand',function(){
        let brand = $('#brand').val();
        $('#model').val(null).trigger('change');
        if(brand != '') {
            $('#download_sample_variant').attr("href", "<?= base_url('Product/export_variant/');?>" + brand);
        }
        else{
            $('#download_sample_variant').attr("href", "");
        }
    });

    $('#download_sample_variant').click(function(e){

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

    $('#import_variant').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/import_variant'); ?>',
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

    $("select[name='brand']").on('change', function() {
        var brand_id = this.value;
        $('#model').html(' ');
        $.ajax({
            url:"<?php echo base_url('Product/fetch_model'); ?>",
            method:"POST",
            data: {brand_id: brand_id},
            dataType:"json",
            success: function (data) {
                $("#model").append('<option value=""> Select Model </option>');

                $.each(data, function (key, value) {
                    $("#model").append('<option value="' + value.id + '">' + value.model + '</option>');
                });
            }
        });


    });

    $('#add_variant').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/insert_variant'); ?>',
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

                    $("input[name='variant']").val('');
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



    $("#l_variant").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');
</script>
