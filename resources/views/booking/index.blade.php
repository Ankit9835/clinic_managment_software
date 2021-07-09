@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your appointments({{ $appointments->count() }})</div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Time</th>
                          <th scope="col">Date for</th>
                          <th scope="col">Created date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse($appointments as $key=>$row)
                        <tr>
                          <th scope="row">{{ $key + 1 }}</th>
                          <td>{{ $row->user->name }}</td>
                          <td>{{ $row->time }}</td>
                          <td>{{ $row->date }}</td>
                          <td>{{ $row->created_at }}</td>
                          <td>

                            @if($row->status == 0)
                              <button class="btn btn-primary">Not visited</button>
                            @else
                              <button class="btn btn-success"> Cheked</button>
                            @endif
                             
                          </td>
                        </tr>
                        @empty
                        <p> No Appointments Available </p>
                       @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
