<!-- Search Calendar -->
<div id="search-calendar" style="clear: both; text-align: left">
    <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Appointment&nbsp;&nbsp;<i class ="glyphicon glyphicon-plus">  </i>
</button> <br><br></div>




</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

 


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Appointments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        


<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <div class="form-group">
            	 Date Start: <br>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <div class="form-group">
            	 Date End: <br>
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>
    </div>
</div>



<br>


<form>
  <div class="form-group">
    Subject <br>
    <input type="text" class="form-control"   placeholder="Enter Subject">
   
  </div>


<br>

 <div class="form-group">
    Note: <br>
    <textarea class="form-control" id="NoteForm" rows="3"></textarea>
  </div>
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Search Calendar Ends-->







