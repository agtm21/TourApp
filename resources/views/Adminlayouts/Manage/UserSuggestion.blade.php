@extends('Adminlayouts.adminmain',['title'=>'User Suggestion'])
@section('usersuggestion')
    <div class="container mt-3">
        <h3 class="mt-3 mb-3">Kritik Dan Saran</h3>
        <table class="table table-striped table-responsive text-center">
            <thead class="bg-dark text-white">
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        Username
                    </td>
                    <td>
                        Kritik dan Saran
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggest as $s)
                    @if ($s)
                        
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->user->username }}</td>
                            <td>{{ $s->suggestion }}</td>
                        </tr>
                    @else
                        <tr>
                            <td>Tidak ada data</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection