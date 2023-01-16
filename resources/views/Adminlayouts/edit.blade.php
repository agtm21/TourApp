@extends('Adminlayouts.adminmain',['title'=> 'Edit User'])
@section('datauser')
    <div class="container text-dark ">
        <h1>Edit User</h1>
        <form action="/Admin/{{ $users->id }}" method="post">
            @method('put')
            @csrf
            
            <div class="form-floating mb-3 col-md-6">
                <input type="text" class="form-control" id="floatingInput" name="username" @error('username') is-invalid @enderror placeholder="Username" required value="{{ old('username',$users->username) }}">
                <label for="floatingInput" >Username</label>
                @error('username')
                    <div class="text-danger" id="floatingInput">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3 col-md-6">
                <input type="email" class="form-control" id="floatingInput" @error('email') is-invalid @enderror placeholder="Email" name="email" required value="{{ old('email',$users->email) }}">
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="text-danger" id="floatingInput">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3 col-md-6">
                <input type="password" class="form-control" id="floatingPassword" @error('password') is-invalid @enderror placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="text-danger" id="floatingPassword">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- <div class="form-floating mb-3 col-md-6">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="role">
                    <option selected>Select Role</option>
                    <option value="traveler">Traveler</option>
                    <option value="nelayan">Nelayan</option>
                </select>
                <label for="floatingSelect">Roles</label>
            </div> --}}
            <button class="btn btn-info" type="submit">Edit User</button>
        </form>
    </div>
@endsection