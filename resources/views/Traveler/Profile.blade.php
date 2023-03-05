@extends('layouts.main',['title'=>'Profile'])
@section('profile')
<form action="/update" enctype="multipart/form-data" method="POST">
    
    @csrf
    <div class="row justify-content-center mt-4 vh-100">
        <div class="col col-md-7">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header text-light fw-bold bg-info">Account Details</div>
                <div class="card-body text-dark shadow">
                    <input type="hidden" name="user_id" value="{{ $users->id }}" id="user_id">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="username" value={{ auth()->user()->username }}>
                    <label for="exampleFormControlInput1" class="form-label my-3">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value={{ auth()->user()->email }}>
                    <label for="exampleFormControlInput1" class="form-label my-3">Phone</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" value={{ $users->phone }}>
                    <label for="exampleFormControlInput1" class="form-label my-3">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" name="password" required>
                    <button class="btn btn-info my-3 " role="button" type="submit">Save Changes</button>
                </div>
            </div>
            
        </div>
        <div class="col col-md-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header text-light fw-bold bg-info">Profile Picture</div>
                <div class="card-body text-center shadow">
                    <!-- Profile picture image-->
                    @if($users->image!=NULL)
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('storage/'.$users->image) }}" alt="{{ $users->image }}" width="300px" height="300px"> 
                    @else
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" >
                    @endif
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" name="image" id="image" accept="image/*" style="display: none">
                    {{-- <input type="file" name="uploadImage" id="uploadImage"> --}}
                    <input class="btn btn-primary" type="button" role="button" id="upload" onclick="document.getElementById('image').click();" value="Upload Image">
                   
                    
                </div>
            </div>
            
        </div>
        
    </div>
    
</form>

@endsection