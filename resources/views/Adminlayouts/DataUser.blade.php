@extends('Adminlayouts.adminmain',['title'=> 'Data User'])
@section('datauser')

{{-- memisahkan data berdasarkan role user --}}
    <div class="container mt-3">
        <div class="container-fluid bg-white py-2 rounded">
            <h1 class="fs-1 fw-bold text-dark">Data Traveler</h1>
            
            <div class="row justify-content-between ">
                
                <div class="col-md-2 mb-3">

                    <a href="/Admin/create" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i>Tambah User</a>
                </div>
            </div>
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-dark text-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Username</th>
                        <th>Email</th>
                        <th>Picture</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($traveler as $tvl)
                    <tr>
                        {{-- <td>{{ $user->id }}</td> --}}
                        <td>
                            @if($tvl->image)
                            <img src="{{ asset('storage/'.$tvl->image) }}" alt="gambar-profile" class="rounded-circle" width="30" height="30">
                            @else
                            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="gambar-profile" class="rounded-circle" width="30" height="30">
                            @endif
                            {{ $tvl->username }}
                        </td>
                        <td>{{ $tvl->email }}</td>
                        <td>{{ $tvl->image }}</td>
                        <td>{{ $tvl->role }}</td>
                        {{-- Action Button for Update --}}
                        <td>
                            <a href="/Admin/{{ $tvl->uuid }}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/Adminlayouts/datauser/{{ $tvl->uuid }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('are you sure delete this data?')"><i class="fa-solid fa-trash"></i></button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $traveler->links() }}
            </div>
        </div>
    </div>
    {{-- sesi kedua --}}
    <div class="container mt-3">
        <div class="container-fluid bg-white py-2 rounded">
            <h1 class="fs-1 fw-bold text-dark">Data Nelayan</h1>
            
            <div class="row justify-content-between ">
                
                <div class="col-md-2 mb-3">

                    <a href="/Admin/create" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i>Tambah User</a>
                </div>
            </div>
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-dark text-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Username</th>
                        <th>Email</th>
                        <th>Picture</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nelayan as $nl)
                    <tr>
                        {{-- <td>{{ $user->id }}</td> --}}
                        <td>
                            @if ($nl->image)
                            <img src="{{ asset('storage/'.$nl->image) }}" alt="gambar-profile" class="rounded-circle" width="30" height="30">
                            @else
                            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="gambar-profile" class="rounded-circle" width="30" height="30">
                            @endif
                            {{ $nl->username }}
                        </td>
                        <td>{{ $nl->email }}</td>
                        <td>{{ $nl->image }}</td>
                        <td>{{ $nl->role }}</td>
                        {{-- Action Button for Update --}}
                        <td>
                            <a href="/Admin/{{ $nl->uuid }}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/Adminlayouts/datauser/{{ $nl->uuid }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('are you sure delete this data?')"><i class="fa-solid fa-trash"></i></button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $nelayan->links() }}
            </div>
        </div>
    </div>
@endsection
