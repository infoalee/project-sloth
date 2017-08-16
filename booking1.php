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
                  <label for="lbCampaignCode" class="col-sm-2 control-label">Campaign code</label>

                  <div class="col-sm-10 col-lg-6">
                        <div class="input-group">
                       $campaignCode
                        </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="lbCampaingName" class="col-sm-2 control-label">Campaign Name</label>
                  <div class="col-sm-10 col-lg-6">
                     $campaignName
                  </div>
                </div>

                <div class="form-group">
                  <label for="lbContactDate" class="col-sm-2 control-label">Contact Date</label>
                  <div class="col-sm-5 col-lg-2">
                    $contactDate
                  </div>
                  <label for="lbAmount" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-3 col-lg-2">
                    $amount
                  </div>
                </div>

                <div class="form-group">
                  <label for="lbChannel" class="col-sm-2 control-label">Channel</label>
                  <div class="col-sm-5 col-lg-2">
                    $channel
                  </div>
                  <label for="lbChType" class="col-sm-2 control-label">Type</label>
                  <div class="col-sm-3 col-lg-2">
                    $channelType
                  </div>
                </div>

                  <div class="form-group sms">
                      <label for="inputSMSMeassage1" class="col-sm-2 control-label">SMS Message</label>
                      <div class="col-sm-8 col-md-6 col-lg-6 SMSMSG">
                        <textarea row="3" class="form-control" id="inputSMSMeassage1" placeholder="SMS Message 1"></textarea>  
                      </div>

                    <div class="col-sm-2 col-md-2 col-lg-1">
                      <span id='btnAddSMS' class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</span>
                      <span id='btnDelSMS' class="btn btn-sm btn-flat btn-warning"><i class="fa fa-minus" aria-hidden="true"></i> Del</span>
                    </div>
                  </div>

                <script>
/*                     $(function (){
                        $("#btnAddSMS").click(function(){
                            alert($(".SMSMSG").size());
                            $(".SMSMSG").append("<textarea row='3' class='form-control' id='nputSMSMeassage1' placeholder='SMS Message 2'></textarea>")
                        });
                    });
 */

                   var n = $( ".SMSMSG > textarea" ).length;
                    if (n > 1){
                        $("#btnDelSMS").show();
                    }else{
                        $("#btnDelSMS").hide();
                    }

                    $("#btnAddSMS")
                    .click(function() {
                        var n = $( ".SMSMSG > textarea" ).length + 1;
                        if (n > 1 ){
                            $("#btnDelSMS").show();
                        }
                        if (n < 10 ){
                            $(".SMSMSG").append( $( "<textarea row='3' class='form-control sms" + n + "' id='inputSMSMeassage1' placeholder='SMS Message " + n + "'></textarea>" ) );
                        }else{
                            alert("limit SMS Message")
                        }
                        var n = $( ".SMSMSG > textarea" ).length;
                        //alert( "There are " + n + " textareas." + "Click to add more.");
                    });
                    // Trigger the click to start
                    //.trigger( "click" );

                    $("#btnDelSMS")
                    .click(function() {
                        var n = $( ".SMSMSG > textarea" ).length;
                        //if (n < 10 ){
                            //alert($('textarea').length);
                            $('.SMSMSG > textarea').remove( ".sms" + n);
                        //}else{
                        //    alert("limit SMS Message")
                       // }
                        if ($( ".SMSMSG > textarea" ).length < 2){
                            $(this).hide();
                        }
                        //alert( "There are " + n + " textareas." + "Click to add more.");
                    });

                </script>

                <div class="form-group sms">
                  <label for="inputBudgetOwn" class="col-sm-2 control-label">Budget Owner</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputBudgetOwn" placeholder="Budget Owner">
                  </div>
                </div>

                <div class="form-group edm">
                  <label for="slSenderEmail" class="col-sm-2 control-label">Sender Name</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slSenderEmail" class="form-control selectpicker inline">
                        <option>Please select</option>
                        <option value="K-Special">K-Special</option>
                        <option value="KBankCardDF">KBankCard</option>
                        <option value="K-Expert">K-Expert</option>
                        <option>Other..</option>
                    </select>
                  </div>
                </div>

                <div class="form-group edm">
                  <label for="inputEdmSubject" class="col-sm-2 control-label">Subject</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputEdmSubject" placeholder="Subject">
                  </div>
                </div>

                <div class="form-group edm">
                  <label for="inputEdmPathAW" class="col-sm-2 control-label">Path Artwork</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputEdmPathAW" placeholder="Path Artwork">
                  </div>
                </div>

                <div class="form-group">
                  <label for="slSenderKPLUS" class="col-sm-2 control-label">Sender (Page Code)</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slSenderKPLUS" class="form-control selectpicker inline">
                        <option>Please select</option>
                        <option value="PA0014">PA0014 - My Promotion</option>
                        <option value="PA0015">PA0015 - K PLUS</option>
                        <option value="PA0017">PA0017 - KBank</option>
                        <option value="PA0003">PA0003 - K-Expert</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="slSendTypeKPLUS" class="col-sm-2 control-label">Feed Type</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slSendTypeKPLUS" class="form-control selectpicker inline">
                        <option>Please select</option>
                        <option value="TA07-1">TA07-1 : Feed แบบ 1 ปุ่ม (สีเขียว)</option>
                        <option value="TA07-2">TA07-2 : Feed แบบ 2 ปุ่ม (สีเขียวและสีแดง)</option>
                        <option value="Normal">Normal : Feed แบบ ไม่มีปุ่ม</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="slSendTypeFuncKPLUS" class="col-sm-2 control-label">URL Action</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slSendTypeFuncKPLUS" class="form-control selectpicker inline">
                        <option>Please select</option>
                        <option value="1">Register PromptPay</option>
                        <option value="2">Purchase Mutual Fund</option>
                        <option value="3">Purchase Travel Insurance</option>
                        <option value="4">Register Debit Card</option>
                        <option value="5">Add Credit Card / K-Express Cash</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="slSendLangKPLUS" class="col-sm-2 control-label">Language</label>
                  <div class="col-sm-10 col-lg-3">
                    <select id="slSendLangKPLUS" class="form-control selectpicker inline">
                        <option value="TH">Thai</option>
                        <option value="TH/EN">Thai / English</option>
                        <option value="EN">English</option>
                    </select>
                  </div>
                </div>

<script>
                    


                   var n = $( ".KPLUSMSG > textarea" ).length;
                    if (n > 1){
                        $("#btnAddKPLUS").show();
                    }else{
                        $("#btnDelKPLUS").hide();
                    }

                    $( "#slSendLangKPLUS" ).change(function() {
                      if ($(this).val() == 'TH' ) {
                          $(".th").show();
                          $(".en").hide();
                      }else if ($(this).val() == 'TH/EN' ) { 
                          $(".th").show();
                          $(".en").show();
                      }else if ($(this).val() == 'EN' ) { 
                          $(".th").hide();
                          $(".en").show();
                      }
                    });


                    $("#btnAddKPLUS")
                    .click(function() {
                        var n = $( ".KPLUSMSG > textarea" ).length + 1;
                        if (n > 1 ){
                            $("#btnDelKPLUS").show();
                        }
                        if (n < 10 ){
                            $(".KPLUSMSG").append( $( "<textarea row='3' class='form-control sms" + n + "' id='inputSMSMeassage1' placeholder='Message Thai " + n + "'></textarea>" ) );
                        }else{
                            alert("limit KPLUS Message")
                        }
                        var n = $( ".KPLUSMSG > textarea" ).length;
                        //alert( "There are " + n + " textareas." + "Click to add more.");
                    });
                    // Trigger the click to start
                    //.trigger( "click" );

                    $("#btnDelKPLUS")
                    .click(function() {
                        var n = $( ".KPLUSMSG > textarea" ).length;
                        //if (n < 10 ){
                            //alert($('textarea').length);
                            $('.KPLUSMSG > textarea').remove( ".sms" + n);
                        //}else{
                        //    alert("limit SMS Message")
                       // }
                        if ($( ".KPLUSMSG > textarea" ).length < 2){
                            $(this).hide();
                        }
                        //alert( "There are " + n + " textareas." + "Click to add more.");
                    });

                </script>

                <div class="form-group kpkus th">
                    <label for="inputKPlusMeassageTH1" class="col-sm-2 control-label">Message Thai</label>
                    <div class="col-sm-8 col-md-6 col-lg-6 KPLUSMSG">
                      <textarea row="3" class="form-control" id="inputKPlusMeassageTH1" placeholder="Message Thai 1"></textarea>  
                    </div>

                  <div class="col-sm-2 col-md-2 col-lg-1">
                    <span id='btnAddKPLUS' class="btn btn-flat btn-sm btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</span>
                    <span id='btnDelKPLUS' class="btn btn-flat btn-sm btn-warning"><i class="fa fa-minus" aria-hidden="true"></i> Del</span>
                  </div>
                </div>

                <div class="form-group kpkus th">
                  <label for="inputKPlusNotiTH1" class="col-sm-2 control-label">Alert Thai</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputKPlusNotiTH1" placeholder="Alert Thai 1">
                  </div>
                </div>

                <div class="form-group  kpkus th">
                  <label for="fileKPlusImgTH1" class="col-sm-2 control-label">Image Thai</label>
                  <div class="col-sm-6 col-lg-4">
                   <input type="file" class="form-control inline" id="fileKPlusImgTH1" />
                  </div>
                </div>

                <div class="form-group kpkus en">
                    <label for="inputKPlusMeassageEN1" class="col-sm-2 control-label">Message English</label>
                    <div class="col-sm-8 col-md-6 col-lg-6">
                      <textarea row="3" class="form-control" id="inputKPlusMeassageEN1" placeholder="Message English 1"></textarea>  
                    </div>
                </div>

                <div class="form-group kpkus en">
                  <label for="inputKPlusNotiEN1" class="col-sm-2 control-label">Alert English</label>
                  <div class="col-sm-10 col-lg-6">
                    <input type="text" class="form-control" id="inputKPlusNotiEN1" placeholder="Alert English 1">
                  </div>
                </div>

                <div class="form-group kpkus en">
                  <label for="fileKPlusImgEN1" class="col-sm-2 control-label">Image English</label>
                  <div class="col-sm-6 col-lg-4">
                   <input type="file" class="form-control inline" id="fileKPlusImgEN1" />
                  </div>
                </div>
      
                <div class="form-group">
                  <label for="fileMobileTest" class="col-sm-2 control-label">Mobile To Test</label>
                  <div class="col-sm-6 col-lg-4">
                   <input type="file" class="form-control inline" id="fileMobileTest" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="fileLeadUpload" class="col-sm-2 control-label">Lead Upload</label>
                  <div class="col-sm-6 col-lg-4">
                   <input type="file" class="form-control inline" id="fileLeadUpload" />
                  </div>
                </div>

                <div class="form-group kpkus">
                    <label for="inputKPLUSMeassage1" class="col-sm-2 control-label">Remark</label>
                    <div class="col-sm-8 col-md-6 col-lg-6">
                      <textarea row="3" class="form-control" id="inputKPLUSMeassage1" placeholder="Remark"></textarea>  
                    </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer col-centered text-center">
                <button type="cancel" class="btn btn-warning"><i class='fa fa-arrow-circle-left'></i> Back</button>
                <button type="submit" class="btn btn-success"><i class='X glyphicon glyphicon-book'></i> Booking</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

<script type="text/javascript">
    $(function(){

            //$(".sms").show();
            //$(".edm").hide();

    });
</script>