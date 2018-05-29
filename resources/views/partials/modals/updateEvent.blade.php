<!-- Modal -->
<div class="modal fade" id="updateEvent" tabindex="-1" role="dialog" aria-labelledby="updateEventTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateEventTitle">Update Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="eventsUpdate" >
            <input type="text" id="event_id" name="event_id" class="hidden">
            <div class="form-group row">
                <label for="title" class="col-4 col-form-label">Title</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div> 
                    <input id="title" name="title" type="text" class="form-control here">
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="start_date" class="col-4 col-form-label">Start Date</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-play"></i>
                    </div> 
                    <input type="text" id="start_date" name="start_date" class="form-control datetimepicker"/>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="end_date" class="col-4 col-form-label">End Date</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-stop"></i>
                    </div> 
                    <input type="text" id="end_date"  name="end_date" class="form-control datetimepicker"/>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="color2" class="col-4 col-form-label">Color</label> 
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-paint-brush"></i>
                        </div> 
                        <input type="text" name="color2" id="color2"  class="form-control"/>
                    </div>
                </div>
            </div>
            
      </div>
      <div class="modal-footer text-center">
        <button id='close' type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Close</button>
        @can('delete-event')    <button onclick="dprompt()" id="delete" type="button" class="btn btn-danger">Delete Event</button>  @endcan
        <button onclick="update()" id="submit" type="button" class="btn btn-primary pull-left">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>