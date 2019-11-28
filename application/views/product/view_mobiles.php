<div class="modal" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" style="padding: 0px;">
                <section class="card">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Mobiles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div id="error"></div>
                        <?php echo form_open('', 'class="form-horizontal form-bordered" id="edit_mobile_form"'); ?>
                        <div class="row">



                            <div class="form-group col-md-4">
                                <label>Brand</label>

                                <select name="brand_u" id="brand_u" disabled class="form-control" required>
                                    <option value="" disabled>Select Brand</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Model</label>

                                <select name="model_u" id="model_u" disabled class="form-control" required>
                                    <option value="" disabled>Select Model</option>
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                <label>Variant</label>

                                <select name="variant_u" id="variant_u" disabled class="form-control" required>
                                    <option value="" disabled>Select Variant</option>
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                <label>Title</label>

                                <input type="text" name="title_u" value="" class="form-control" placeholder="">


                            </div>
                            <div class="form-group col-md-4">
                                <label>Processor</label>

                                <input type="text" name="processor_u" id="processor_u" value="" class="form-control" placeholder="">


                            </div>
                            <div class="form-group col-md-4">
                                <label>Ram</label>

                                <input type="text" name="ram_u" value="" class="form-control" placeholder="">


                            </div>
                            <div class="form-group col-md-4">
                                <label>Internal Memory</label>

                                <input type="text" name="internal_u" value="" class="form-control" placeholder="">


                            </div>

                            <div class="form-group col-md-4">
                                <label>Icon</label>

                                <input type="file" accept="image/*" name="icon_u" value="" class="form-control" placeholder="" onchange="loadFile(event)">


                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Base Price</label>

                                <input type="text" name="like_new_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)"  required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Box (NA)</label>

                                <input type="text" name="box_na_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Bill (NA)</label>

                                <input type="text" name="bill_na_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Charger (NA)</label>

                                <input type="text" name="charger_na_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>


                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Earphone (NA)</label>

                                <input type="text" name="earphone_na_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty <3</label>

                                <input type="text" name="warranty_below_3_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty  3-6</label>

                                <input type="text" name="warranty_3_6_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty 6-11</label>

                                <input type="text" name="warranty_6_11_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Warranty Above 11</label>

                                <input type="text" name="warranty_above_11_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Broken Glass</label>

                                <input type="text" name="glass_broke_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Display Crack</label>

                                <input type="text" name="display_crack_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Front Camera Fault</label>

                                <input type="text" name="front_camera_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Back Camera Fault</label>

                                <input type="text" name="back_camera_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Wifi Fault</label>

                                <input type="text" name="wifi_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Battery Fault</label>

                                <input type="text" name="battery_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Speaker Fault</label>

                                <input type="text" name="speaker_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Mic Fault</label>

                                <input type="text" name="mic_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Volume Button Fault</label>

                                <input type="text" name="volumn_btn_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Charging Fault</label>

                                <input type="text" name="charging_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Power Button Fault</label>

                                <input type="text" name="power_button_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Fingerprint Scanner Fault</label>

                                <input type="text" name="fingerprint_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Face Recognition Fault</label>

                                <input type="text" name="face_recog_fault_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Looking New</label>

                                <input type="text" name="looking_new_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Looking Good</label>

                                <input type="text" name="looking_good_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Looking Average</label>

                                <input type="text" name="looking_average_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label text-lg-right pt-2" for="inputDefault">Looking Below Average</label>

                                <input type="text" name="looking_average_below_u" value="" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0)" required>

                            </div>


                            <div class="col-md-12 text-center">
                                <img id="preview_img" src="" height="50" width="50">
                            </div>


                            <input type="hidden" name="id_u" value="">
                            <input type="hidden" name="variant_h" value="">

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
                        <h4>Mobiles</h4>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-danger" id="delete_multi" disabled>Delete Selected</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('Product/add_mobiles');?>" class="btn btn-primary">Add New Mobiles</a>
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
                            <th>Action</th>
                            <th>Icon</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Variant</th>
                            <th>Title</th>
                            <th>Processor</th>
                            <th>Ram</th>
                            <th>Internal Memory</th>
                            
                            <th>Base Price</th>
                            <th>Box (NA)</th>
                            <th>Bill (NA)</th>
                            <th>Charger (NA)</th>
                            <th>Earphone (NA)</th>
                            <th>Warranty Below 3</th>
                            <th>Warranty 3-6</th>
                            <th>Warranty 6-11</th>
                            <th>Warranty Above 11</th>
                            <th>Broken Glass</th>
                            <th>Display Crack</th>
                            <th>Front Camera Fault</th>
                            <th>Back Camera Fault</th>
                            <th>Battery Fault</th>
                            <th>Wifi Fault</th>
                            <th>Speaker Fault</th>
                            <th>Mic Fault</th>
                            <th>Volume Button Fault</th>
                            <th>Charging Fault</th>
                            <th>Power_button Fault</th>
                            <th>Fingerprint Fault</th>
                            <th>Face_recog Fault</th>
                            <th>Looking New</th>
                            <th>Looking Good</th>
                            <th>Looking Average</th>
                            <th>Looking Average_below</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

<!--                        --><?php //foreach ($result as $row): ?>
<!--                            <tr class="text-center">-->
<!--                                <td>-->
<!--                                    <input type='checkbox' name='multi_del' class='multi_del' value="--><?//=$row['mobile_id']; ?><!--">-->
<!--                                </td>-->
<!---->
<!--                                <td>-->
<!--                                         <span data-toggle="modal" data-target="#editModal">-->
<!--                                          <a class="btn btn-primary btn-sm updateUser" id="--><?//= $row['mobile_id']; ?><!--" name="updateMarks" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>-->
<!--                                     </span>-->
<!--                                    <a href="" class="btn btn-danger btn-sm item_delete deleteUser" id="--><?//= $row['mobile_id']; ?><!--" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['mobile_id']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['brand']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['model']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['varient']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['mobile_title']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['processor']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['ram_size']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['internal_memory']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    <img src="--><?//= base_url();?><!--upload/mobiles/--><?//=$row['mobile_img']; ?><!--" height="50" width="50">-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['like_new']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['box_na']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['bill_na']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['charger_na']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['earphone_na']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['warranty_below_3']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['warranty_3_6']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['warranty_6_11']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['warranty_above_11']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['glass_broke']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['display_crack']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['front_camera_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['back_camera_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['battery_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['wifi_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['speaker_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['mic_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['volumn_btn_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['charging_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['power_button_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['fingerprint_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['face_recog_fault']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['looking_new']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['looking_good']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['looking_average']; ?>
<!--                                </td>-->
<!--                                <td>-->
<!--                                    --><?//= $row['looking_average_below']; ?>
<!--                                </td>-->
<!---->
<!---->
<!--                            </tr>-->
<!--                        --><?php //endforeach; ?>

                        </tbody>

                    </table>
                </div>
                <div id="test">

                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready( function () {

        $('#brand_table').DataTable({
            ajax: "<?= base_url('Product/get_mobiles'); ?>",
            scrollY: "500px",
             scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            // "processing": true,
            // "serverSide": true,
            responsive: true,
            "lengthChange": true,
            dom: 'lfrtip',

            initComplete: (settings, json)=>{
                $('.dataTables_paginate').appendTo('#test');
            },
        });

        $('#editModal').on('hidden.bs.modal', function(e) {
            $(this).find('#edit_mobile_form')[0].reset();
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
        $('#model_u option:selected').removeAttr('selected');
        $('#variant_u option:selected').removeAttr('selected');

        $.ajax({
            url:"<?php echo base_url('Product/fetch_mobile_details'); ?>",
            data: {id:id},
            method:"POST",
            dataType:"json",
            success: function (data){
                console.log(data);
                $('#editModal').modal('show');

                var img='<?= base_url(); ?>upload/mobiles/'+data.mobile_img;
                $("#brand_u option[value= '"+data.brand_id+"' ]").attr("selected", "selected");



                fetch_model(data.brand_id,data.model_id);

                fetch_variant(data.model_id,data.varient_id);


                $("#variant_u option[value= '"+data.variant_id+"' ]").attr("selected", "selected");

                $("input[name='title_u']").val(data.mobile_title),
                    $("input[name='processor_u']").val(data.processor),
                    $("input[name='ram_u']").val(data.ram_size),
                    $("input[name='internal_u']").val(data.internal_memory),
                    $("input[name='like_new_u']").val(data.like_new),
                    $("input[name='box_na_u']").val(data.box_na),
                    $("input[name='bill_na_u']").val(data.bill_na),
                    $("input[name='charger_na_u']").val(data.charger_na),
                    $("input[name='earphone_na_u']").val(data.earphone_na),
                    $("input[name='warranty_below_3_u']").val(data.warranty_below_3),
                    $("input[name='warranty_3_6_u']").val(data.warranty_3_6),
                    $("input[name='warranty_6_11_u']").val(data.warranty_6_11),

                    $("input[name='warranty_above_11_u']").val(data.warranty_above_11),
                    $("input[name='glass_broke_u']").val(data.glass_broke),
                    $("input[name='display_crack_u']").val(data.display_crack),
                    $("input[name='front_camera_fault_u']").val(data.front_camera_fault),

                    $("input[name='back_camera_fault_u']").val(data.back_camera_fault),
                    $("input[name='wifi_fault_u']").val(data.wifi_fault),
                    $("input[name='battery_fault_u']").val(data.battery_fault),
                    $("input[name='speaker_fault_u']").val(data.speaker_fault),

                    $("input[name='mic_fault_u']").val(data.mic_fault),

                    $("input[name='volumn_btn_fault_u']").val(data.volumn_btn_fault),
                    $("input[name='charging_fault_u']").val(data.charging_fault),
                    $("input[name='power_button_fault_u']").val(data.power_button_fault),
                    $("input[name='fingerprint_fault_u']").val(data.fingerprint_fault),
                    $("input[name='face_recog_fault_u']").val(data.face_recog_fault),


                    $("input[name='looking_new_u']").val(data.looking_new),
                    $("input[name='looking_good_u']").val(data.looking_good),
                    $("input[name='looking_average_u']").val(data.looking_average),
                    $("input[name='looking_average_below_u']").val(data.looking_average_below),



                    $("input[name='id_u']").val(data.id);
                $("input[name='variant_h']").val(data.varient_id);
                $("#preview_img").attr("src",img);


            }
        });
    });


    //$("select[name='brand_u']").on('change', function() {
    //    var brand_id = this.value;
    //
    //    $('#model_u').html(' ');
    //     $('#model_u').val(null).trigger('change');
    //
    //    $.ajax({
    //        url:"<?php //echo base_url('Product/fetch_model'); ?>//",
    //        method:"POST",
    //        data: {brand_id: brand_id},
    //        dataType:"json",
    //        success: function (data) {
    //            $.each(data, function (key, value) {
    //                $("#model_u").append('<option value="' + value.id + '">' + value.model + '</option>');
    //            });
    //        }
    //    });
    //});
    //
    //$("select[name='model_u']").on('change', function() {
    //    // var model_id = this.value;
    //    var model_id = $("#model_u").val();
    //    var brand_id = $('#brand_u').val();
    //
    //    console.log("brand: "+brand_id+" model: "+model_id);
    //
    //    $('#variant_u').html(' ');
    //
    //    $('#variant_u').val(null).trigger('change');
    //    $.ajax({
    //        url:"<?php //echo base_url('Product/fetch_variant'); ?>//",
    //        method:"POST",
    //        data: {model_id: model_id,brand_id:brand_id},
    //        dataType:"json",
    //        success: function (data) {
    //            console.log(data);
    //            $.each(data, function (key, value) {
    //                $("#variant_u").append('<option value="' + value.id + '">' + value.varient + '</option>');
    //            });
    //        }
    //    });
    //});

    function fetch_model(brand_id,model_id) {


        $('#model_u').html(' ');
        $.ajax({
            url:"<?php echo base_url('Product/fetch_model'); ?>",
            method:"POST",
            data: {brand_id: brand_id},
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#model_u").append('<option value="' + value.id + '">' + value.model + '</option>');
                });

                $("#model_u option[value= '"+model_id+"' ]").attr("selected", "selected");

                //  $('#model_u').select2({
                //     dropdownParent: $('#editModal')
                // });
            }
        });
       
    
    };


    function fetch_variant(model_id,variant_id) {


        $('#variant_u').html(' ');
        $.ajax({
            url:"<?php echo base_url('Product/fetch_variant'); ?>",
            method:"POST",
            data: {model_id: model_id},
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#variant_u").append('<option value="' + value.id + '">' + value.varient + '</option>');
                });

                $("#variant_u option[value= '"+variant_id+"' ]").attr("selected", "selected");

                // $('#variant_u').select2({
                //     dropdownParent: $('#editModal')
                // });
            }
        });
        
        
    };


    $('#edit_mobile_form').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '<?= base_url('Product/update_mobile') ?>',
            method: 'POST',
            dataType:"json",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data){
                console.log(data);
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
        let table_name = "cls_m_mobile";
        let path = "./upload/mobiles/";
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
                    url: '<?= base_url('Product/common_mobile_delete'); ?>',
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



        let table_name = "cls_m_mobile";
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
                    url: '<?= base_url('Product/common_mobile_multi_delete'); ?>',
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


    $("#l_mobile").addClass('active');
    $("#l_product").addClass('pcoded-trigger active');

</script>


