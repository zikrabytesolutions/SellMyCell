<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Add Unavailability  Time Slots</h4>
                    </div>

                </div>
            </div>
            <div class="card-block">
                <div id="error"></div>
                <div id="success"></div>


                <?php echo form_open('', 'class="form-horizontal form-bordered" id="add_time_slot"'); ?>


                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Date</label>
                    <div class="col-lg-6">
                        <input type="text" id="slot_date" name="slot_date" value="<?= set_value('time_slot'); ?>" autocomplete="off" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">

                    <label class="col-md-3 control-label text-lg-right pt-2" for="inputDefault">Time Slot</label>
                    <div class="col-md-2">
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" class="timeslot" name="time_9_12" value="1">
                                    <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    9AM - 12PM
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">

                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" class="timeslot" name="time_12_3" value="1">
                                    <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    12PM - 3PM
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="check-task">
                                    <input type="checkbox" class="timeslot" name="time_3_6" value="1">
                                    <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                </span>
                                    3PM - 6PM
                                </label>
                            </div>
                        </div>

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

    $('#slot_date').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        prevText: '<i class="fa fa-caret-left"></i>',
        nextText: '<i class="fa fa-caret-right"></i>',
        // onClose: function(selectedDate) {
        //     $('#time_slot').datepicker("option", "maxDate", selectedDate);
        // }
    });



    $('#add_time_slot').submit(function(e){
        e.preventDefault();

        if($(".timeslot:checked").length > 0){
            $.ajax({
                url:'<?= base_url('product/insert_timeslot'); ?>',
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

                        $('#add_time_slot')[0].reset();

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
        }

        else{
            $('#error').html("<div class='alert alert-danger'>" +
                "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                "<strong>Error! </strong>" + "Select at least one time slot" +
                "</div>");
        }

    });
</script>