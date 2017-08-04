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
                  <label for="lbCampaignCode" class="col-sm-2 control-label">Campaign code :</label>

                  <div class="col-sm-10 col-lg-6">
                        <div class="input-group">
                       $campaignCode
                        </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="lbCampaingName" class="col-sm-2 control-label">Campaign Name :</label>
                  <div class="col-sm-10 col-lg-6">
                     $campaignName
                  </div>
                </div>

                <div class="form-group">
                  <label for="lbContactDate" class="col-sm-2 control-label">Contact Date :</label>

                  <div class="col-sm-5 col-lg-2">
                    $contactDate
                  </div>
                  <label for="lbAmount" class="col-sm-2 control-label">Amount :</label>
                  <div class="col-sm-5 col-lg-2">
                    $amount
                  </div>
                  
                </div>

                <div class="form-group">
                  <label for="imputSMSMeassage1" class="col-sm-2 control-label">SMS Message :</label>
                  <div class="col-sm-10 col-lg-6">
                    <textarea row="3" class="form-control" id="imputSMSMeassage1" placeholder="SMS Message 1"></textarea>
                    
                  </div>
                  <div class="col-sm-2 col-lg-1">
                    <button class="form-control btn-sm btn-primary">Add</Button>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputBudgetOwn" class="col-sm-2 control-label">Contact Date :</label>

                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputBudgetOwn" placeholder="Budget Owner">
                  </div>
                  
                </div>


                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-centered">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info">Booking</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->