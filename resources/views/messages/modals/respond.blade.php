
<div class="modal fade" id="modal_respond" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Para {{$message->sender->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('response_message')}}">
            @csrf
      <div class="modal-body">
            <input type="hidden" name="user_response" value="{{$message->sender_id}}">
            <input type="hidden" name="conversation_id" value="{{$message->conversation_id}}">
            
            <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" name="body" id="message-text" required></textarea>
            </div>
            <div class="form-group">
                <strong>{!! $errors->first('body','<div class="alert alert-danger text-danger" role="alert"><span class=error>El mensaje no puede estar vacío!!</span></div>') !!}</strong>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Enviar mensaje">
      </div>
    </form>
    </div>
  </div>
</div>