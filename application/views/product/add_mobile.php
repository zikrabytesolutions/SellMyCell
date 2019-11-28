<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Add Mobile</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Product/view_mobiles');?>" class="btn btn-primary">View Mobiles</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_mobile"'); ?>

                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Select Brand</label>

                        <select name="brand" class="form-control" id="brand" required>
                            <option value="">Select Brand</option>
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Select Model</label>

                        <select name="model" class="form-control" id="model" required>
                            <option value="">Select Model</option>
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Select Variant</label>

                        <select name="variant" class="form-control" id="variant" required>
                            <option value="">Select Variant</option>
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Mobile Title</label>

                        <input type="text" name="mobile_title" value="" class="form-control" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Processor</label>

                        <input type="text" name="processor" value="" class="form-control" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">RAM</label>

                        <input type="text" name="ram_size" value="" class="form-control" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Internal Memory</label>

                        <input type="text" name="internal_memory" value="" class="form-control" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Mobile Image</label>

                        <input type="file" accept="image/*" name="icon" value="" class="form-control" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Base Price</label>

                        <input type="text" name="like_new" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)"  required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Box NA</label>

                        <input type="text" name="box_na" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Bill NA</label>

                        <input type="text" name="bill_na" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Charger NA</label>

                        <input type="text" name="charger_na" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>


                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Earphone NA</label>

                        <input type="text" name="earphone_na" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty <3</label>

                        <input type="text" name="warranty_below_3" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty  3-6</label>

                        <input type="text" name="warranty_3_6" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty 6-6</label>

                        <input type="text" name="warranty_6_11" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty >11</label>

                        <input type="text" name="warranty_above_11" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Broken Glass</label>

                        <input type="text" name="glass_broke" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Display Crack</label>

                        <input type="text" name="display_crack" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Front Camera Fault</label>

                        <input type="text" name="front_camera_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Back Camera Fault</label>

                        <input type="text" name="back_camera_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Wifi Fault</label>

                        <input type="text" name="wifi_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Battery Fault</label>

                        <input type="text" name="battery_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Speaker Fault</label>

                        <input type="text" name="speaker_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Mic Fault</label>

                        <input type="text" name="mic_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Volume Button Fault</label>

                        <input type="text" name="volumn_btn_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Charging Fault</label>

                        <input type="text" name="charging_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Power Button Fault</label>

                        <input type="text" name="power_button_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Fingerprint Scanner Fault</label>

                        <input type="text" name="fingerprint_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Face Recognisation Fault</label>

                        <input type="text" name="face_recog_fault" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Looking New</label>

                        <input type="text" name="looking_new" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Looking Good</label>

                        <input type="text" name="looking_good" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Looking Average</label>

                        <input type="text" name="looking_average" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label text-lg-right pt-2" for="inputDefault">Looking Below Average</label>

                        <input type="text" name="looking_average_below" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                    </div>


                    <div class="form-group col-md-12">
                        <div class="text-center">
                            <button type="submit" class="mb-1 mt-1 mr-1 btn btn-info">Submit</button>
                        </div>
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
                        <h5>Import Mobiles By Excel File</h5>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a href="" id="download_sample_mobile" class="btn btn-primary">Download Sample</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error_file"></div>
                <div id="success_file"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="import_mobile"'); ?>



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
    $('#variant').select2();
    
    $(document).on('change','#brand',function(){
        let brand = $('#brand').val();
        
       $('#model').val(null).trigger('change');
        
        if(brand != '') {
            $('#download_sample_mobile').attr("href", "<?= base_url('Product/export_mobile/');?>" + brand);
        }
        else{
            $('#download_sample_mobile').attr("href", "");
        }
    });

    $('#download_sample_mobile').click(function(e){

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

    $("select[name='brand']").on('change', function() {
        var brand_id = this.value;
        $('#model').html(' ');
        $('#model').append('<option value="">Select Model</option>');
        $.ajax({
            url:"<?php echo base_url('Product/fetch_model'); ?>",
            method:"POST",
            data: {brand_id: brand_id},
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#model").append('<option value="' + value.id + '">' + value.model + '</option>');
                });
            }
        });
    });

    $("select[name='model']").on('change', function() {
        var brand_id = $("#brand option").filter(":selected").val()
        var model_id = this.value;
        
    $('#variant').val(null).trigger('change');

        $('#variant').html(' ');
        $('#variant').append('<option value="">Select Variant</option>');
        $.ajax({
            url:"<?php echo base_url('Product/fetch_variant'); ?>",
            method:"POST",
            data: {model_id: model_id},
            dataType:"json",
            success: function (data) {
                
                $.each(data, function (key, value) {
                    $("#variant").append('<option value="' + value.id + '">' + value.varient + '</option>');
                });
            }
        });
    });

    $('#add_mobile').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/insert_mobile'); ?>',
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
                        
                         Swal.fire({
                        text: "Record is inserted successfully",
                        timer: 1000
                    });

                    $("input[type='text']").val('');
                    $("input[type='file']").val('');

                    $("#error").hide();

                }
                else{
                    $('#error').html("<div class='alert alert-danger'>" +
                        "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                        "<strong>Error! </strong>" + data.msg +
                        "</div>");

                    Swal.fire({
                        text: "Duplicate Entry",
                        timer: 1000
                    });
                }
            }
        });

        window.setTimeout(function() {
            $(".alert-success").fadeTo(500, 0,  function() {
                $(this).hide();
            });
        }, 1000);
    });

    $('#import_mobile').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Product/import_mobile'); ?>',
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

    $("#l_mobile").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');
</script>
