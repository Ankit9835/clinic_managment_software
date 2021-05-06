<div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Doctor Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          <img src = "{{ asset('images') }}/{{ $row->image }}" width = "200">
          <p class="badge badge-pill badge-dark"> Role : {{ $row->role->name }} </p>
         <p> Name: {{ $row->name }} </p>
         <p> Email: {{ $row->email }} </p>
         <p> Gender: {{ $row->gender }} </p>
         <p> Address: {{ $row->address }} </p>
         <p> Phone Number: {{ $row->phone_number }} </p>
         <p> Department: {{ $row->department }} </p>
         <p> Education: {{ $row->education }} </p>
         <p> Bio: {{ $row->description }} </p>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>