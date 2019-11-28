

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Add Pincode</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('Location/view_pincodes');?>" class="btn btn-primary">View Pincodes</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_pincode"'); ?>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Select City</label>
                    <div class="col-lg-6">
                        <select name="city" class="form-control" id="city" required>
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Pincode</label>
                    <div class="col-lg-6">
                        <input type="text" name="pincode" value="<?= set_value('pincode'); ?>" class="form-control" onkeypress="return ((event.charCode >= 48 &&  event.charCode <= 57) || (event.charCode >= 0 && event.charCode <= 31) )" maxlength="6" required>
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
            url:"<?php echo base_url('Location/fetch_all_cities'); ?>",
            method:"POST",
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#city").append('<option value="' + value.id + '">' + value.city_name + '</option>');
                });
            }
        });
    });

    $('#add_pincode').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('Location/insert_pincode'); ?>',
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType: 'json',
            success: function(data){

                if(data.error === 0){

                    $('#success').html("<div class='alert alert-success' id='succ'>" +
                        "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                        "<strong>Success! </strong>" + data.msg +
                        "</div>");

                    $("input[name='pincode']").val('');
                    $("#error").hide();

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

    $("#l_pincode").addClass('active');
    $("#l_location").addClass('pcoded-trigger active');
</script>
