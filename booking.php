    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- bootstrap datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
          $(function () {
            //Date picker
            $('#datepickerFrom').datepicker({
                format: "dd-mm-yyyy",
            //startDate: "today",
            autoclose: true,
            todayHighlight: true
            });
            $('#datepickerTo').datepicker({
                format: "dd-mm-yyyy",
            //startDate: "today",
            autoclose: true,
            todayHighlight: true
            });
            $('#datepickerContact').datepicker({
                format: "dd-mm-yyyy",
            startDate: "today",
            autoclose: true,
            todayHighlight: true
            });
            
            $('#btnNext').click(function(){
                $('.ajax-content').load('booking1.php');
            });
          });
    </script>
<!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Booking !!</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputCampCode" class="col-sm-2 control-label">Campaign code :</label>

                  <div class="col-sm-10 col-lg-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Campaign Code" id="inputCampCode" maxlength="9"  required data-validation-required-message="Please enter to Search"  size="9">
                                <span class="input-group-btn">
                                <button type="button" id="btnCampaingChk" class="btn btn-info btn-flat">Check !</button>
                                </span>
                        </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputCampName" class="col-sm-2 control-label">Campaign Name :</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputCampName" placeholder="Campaign Name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputslProduct" class="col-sm-2 control-label">Product :</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="inputslProduct" class="form-control selectpicker inline">
                        <option>Please Select</option>
                        <? include "_view/product.php" ?>
                        <option>Other..</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputObjective" class="col-sm-2 control-label">Objective :</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputObjective" placeholder="Objective">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputCustGrp" class="col-sm-2 control-label">Customer Group :</label>
                  <div class="col-sm-10 col-lg-6">
                    <textarea row="3" class="form-control" id="inputCustGrp" placeholder="Customer Group"></textarea>

                  </div>
                </div>

                <!-- Campaign Period -->
                <div class="form-group">
                  <label for="dtCampaingPeriod" class="col-sm-2 control-label">Campaign Periods :</label>
                  <div class="col-sm-5 col-lg-3">
                    
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepickerFrom" placeholder="From">
                        </div>
                    </div>
                    
                    <div class="col-sm-5 col-lg-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepickerTo" placeholder="To">
                        </div>
                  </div>
                </div>
                <!-- ./Campaign Period -->

                <div class="form-group">
                  <label for="dtContact" class="col-sm-2 control-label">Contact Date :</label>
                  <div class="col-sm-10 col-lg-3">
                    <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepickerContact" placeholder="Contact Date">
                        </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputAmout" class="col-sm-2 control-label">Amount :</label>
                  <div class="col-sm-10 col-lg-3">
                    <input type="text" class="form-control" id="inputAmout" placeholder="Amount">
                  </div>
                </div>

                <div class="form-group">
                  <label for="slChannel" class="col-sm-2 control-label">Channel :</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slChannel" class="form-control selectpicker inline">
                        <option>SMS</option>
                        <option>EDM</option>
                        <option>KMB</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="slType" class="col-sm-2 control-label">Type :</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slType" class="form-control selectpicker inline">
                        <option>Normal (N)</option>
                        <option>Personalize (P)</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputRemark" class="col-sm-2 control-label">Remarks :</label>
                  <div class="col-sm-10 col-lg-6">
                    <textarea row="3" class="form-control" id="inputRemark" placeholder="Remark"></textarea>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer col-centered text-center">
                <button type="cancel" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-info" id="btnNext">Next <i class='fa fa-arrow-circle-right'></i></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <script src="./_controller/booking.js" />
          <script src="./_controller/page_function.js" />

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade modal-warning" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning</h4>
      </div>
      <div class="modal-body">
        <h3>Please enter Camapign Code.</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>