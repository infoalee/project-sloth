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
                  <label for="inputCampCode" class="col-sm-2 control-label">Campaign code :</label>

                  <div class="col-sm-10 col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Campaign Code" id="inputCampCode">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">Check !</button>
                                </span>
                        </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputCampName" class="col-sm-2 control-label">Campaign Name :</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="password" class="form-control" id="inputCampName" placeholder="Campaign Name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputslProduct" class="col-sm-2 control-label">Product :</label>

                  <div class="col-sm-10 col-lg-6">
                    <select id="slProduct" class="form-control selectpicker inline">
                        <option value="BA">BA</option>
                        <option value="CC">CC</option>
                        <option value="DF">DF</option>
                        <option value="MF">MF</option>
                        <option value="PL">PL</option>
                        <option value="KEC">KEC</option>
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