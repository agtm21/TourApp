@extends('Adminlayouts.adminmain',['title'=> 'Manage Pembayaran'])
@section('managepembayaran')
<div class="container mt-3">

    <table class="table table-responsive table-striped text-center">
        <thead class="bg-dark text-white">
            <tr>
                <td>Wisatawan</td>
                <td>Paket</td>
                <td>Bukti Pembayaran</td>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $item)
                
            <tr>
                <td>{{ $item->user->username }}</td>
                <td>{{ $item->product_name}}</td>
                
                <td class="d-flex justify-content-center">
                    <button class="btn btn-secondary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalId">
                        <i class="fa fa-eye me-2"></i>
                        Lihat
                    </button>
                    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Bukti Pembayaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div >

                                            <img src="{{ asset('storage/'.$item->image) }}" alt="bukti-pembayaran" height="300" width="300">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
  Launch
</button> --}}

<!-- Modal -->


<script>
    var modalId = document.getElementById('modalId');

    modalId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>

@endsection