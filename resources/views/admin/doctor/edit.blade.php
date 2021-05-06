@extends('admin.layout.master')

@section('admin-content')
      
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Edit Doctor</h5>
                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
<div class="col-md-10">
    @if(Session::has('message'))

        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>

    @endif
<div class="card">
    <div class="card-header"><h3>Doctor add form </h3></div>
    <div class="card-body">
        <form class="forms-sample" action = "{{ route('doctors.update', [$user->id]) }}" method = "POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputName1">Full name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" value="{{ $user->name }}" name="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail3" value="{{ $user->email }}" name = "email" placeholder="Email">
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                   
                </div>
            </div>

            <div class="row">


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Password</label>
                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" id="" placeholder="password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select name="gender"  class="form-control  @error('gender') is-invalid @enderror" id="exampleSelectGender">
                          @foreach(['male', 'female'] as $gender)

                            <option value = "{{ $gender }}" @if($user->gender==$gender)selected @endif> {{ $gender }}  </option>

                          @endforeach
                        </select>
                         @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword4">Highest education</label>
                        <input type="text" value="{{ $user->education }}" class="form-control  @error('gender') is-invalid @enderror" id="exampleInputPassword4" name="education" placeholder="education">
                         @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword4">Address</label>
                        <input type="text" value="{{ $user->address }}" class="form-control @error('gender') is-invalid @enderror" id="exampleInputPassword4" name="address" placeholder="address">
                        @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Specialist</label>
                        <input type="text" value="{{ $user->department }}" name="department" class="form-control @error('gender') is-invalid @enderror">
                         @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" value="{{ $user->phone_number }}" name="phone_number" class="form-control @error('gender') is-invalid @enderror">
                        @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

            </div>
            <div class="row">
            <div class="form-group">
                <label>File upload</label>
                
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control file-upload-info @error('gender') is-invalid @enderror"  placeholder="Upload Image">
                     @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <span class="input-group-append">
                   
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                        <div class="form-group">
                       <select name="role_id" value="{{ old('role_id') }}" class="form-control @error('gender') is-invalid @enderror">
                           <option value="">select role</option>
                           @foreach(App\Models\Role::where('name', '!=', 'patient')->get() as $role)
                            <option value="{{ $role->id }}"@if($user->role_id==$role->id)selected @endif>{{ $role->name }}</option>
                           @endforeach
                       </select> 
                        @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
            </div>
           <div class="row">
                 <div class="col-md-12">
                     <div class="form-group">
                <label for="exampleTextarea1">About</label>
                <textarea class="form-control @error('gender') is-invalid @enderror" value="{{ old('description') }}" id="exampleTextarea1" rows="4" name="description"> {{ $user->description }} </textarea>
                 @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            </div>
            <div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
           
        </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
