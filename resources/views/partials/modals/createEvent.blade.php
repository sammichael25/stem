<!-- Modal -->
<div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="createEventTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEventTitle">Create New Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="eventsCreate" action="{{ route('events.store') }}" method="POST">
                    {{ csrf_field() }}
            <input type="hidden" name="_method" value="post">
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
                <label for="color" class="col-4 col-form-label">Color</label> 
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-paint-brush"></i>
                        </div> 
                        <input type="text" name="color" id="color" value="#000000" class="form-control"/>
                    </div>
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input id="submit" type="submit" class="btn btn-primary pull-left" value="Add Event"/>
      </div>
      </form>
    </div>
  </div>
</div>