@extends('Adminlayouts.adminmain',['title'=> 'Data User'])
@section('datauser')
    <div class="container mt-3">
        <div class="container-fluid bg-white py-2 rounded">
            <h1 class="fs-1 fw-bold text-dark">Data User</h1>
            <div class="float-end my-2">
                <a href="/Admin/create" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i>Tambah User</a>
            </div>
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        {{-- <td>{{ $user->id }}</td> --}}
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        {{-- Action Button for Update --}}
                        <td>
                            <a href="/Admin/{{ $user->id }}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/Adminlayouts/datauser/{{ $user->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('are you sure delete this data?')"><i class="fa-solid fa-trash"></i></button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p>penomoran here</p>
            {{ $users->links() }}
            <div>
                
            </div>
        </div>
    </div>
@endsection
