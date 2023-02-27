@extends('layouts.main',['title'=>'Notification Order'])
@section('notification')
<div class="container mb-3">

    <div class="row border">
        <div class="col p-3">
            <div class="d-flex justify-content-between mb-3 mx-2">
                <b>Email Notification</b>
                <a href="#" class="text-dark">
                    <i class="fa fa-envelope-open"></i>
                </a>
            </div>
            <div class="card">
                <div class="card-body">
                    @foreach ($notifications as $notif)
                    @if (!$notif->read_at)
                    {{-- <a href="notification/{id}/mark-as-read" > --}}
                        
                        
                    <div class="card btn btn-outline-info mb-3" data-bs-toggle="modal" data-bs-target="#modalId{{ $notif->notifiable_id }}" id="mailbtn">
                        <div class="card-body">
                            <div class="container">
                                <div class="d-flex justify-content-start text-dark">
                                    <i class="fa fa-envelope" id="iconmail">
                                    </i>
                                    <b class="ms-2" >
                                        
                                        {{ $notif->data['subject'] }} 
                                    </b>
                                    <p class="text-muted"> -{{ substr($notif->data['body'],0,60) }}...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
                    @else
                    <div class="card btn btn-outline-info mb-3" data-bs-toggle="modal" data-bs-target="#modalId{{ $notif->notifiable_id }}" id="mailbtn" href="">
                        <div class="card-body">
                            <div class="container">
                                <div class="d-flex justify-content-start text-dark">
                                    <i class="fa fa-envelope-open" id="iconmail">
                                    </i>
                                    <span class="ms-2" >
                                        
                                        {{ $notif->data['subject'] }} 
                                    </span>
                                    <p class="text-muted"> -{{ substr($notif->data['body'],0,60) }}...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="modal fade" id="modalId{{ $notif->notifiable_id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">Pesanan Masuk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row border" style="background-color:#edf2f7">
                                            <div class="col">
                                                <p class="fs-2 text-center fw-bold mt-3">Dolphin Tour</p>
                                                <div class="card m-3">
                                                    <div class="card-body">
                                                        <div class="container ms-3">

                                                            <p class="fw-bold">{{ $notif->data['greeting'] }}</p>
                                                            <p>{{ $notif->data['body'] }}</p>
                                                            <p class="d-flex align-item-center justify-content-center">

                                                                <a href="/penyewaan" class="btn btn-dark">
                                                                    Cek Sekarang
                                                                </a>
                                                            </p>
                                                            <p>Regards, Dolphin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center my-4">
                                                    © 2022 Copyright:
                                                    <a class="text-dark" href="/">Dolphintour.com</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div> --}}
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->


<script>
    // var modalId = document.getElementById('modalId');

    // modalId.addEventListener('show.bs.modal', function (event) {
    //     // Button that triggered the modal
    //     let button = event.relatedTarget;
    //     // Extract info from data-bs-* attributes
    //     let recipient = button.getAttribute('data-bs-whatever');

    //     // Use above variables to manipulate the DOM
    // });

    // var mail = document.getElementById('mailbtn');
    // mail.addEventListener("click",function(){
    //     document.getElementById('iconmail').classList = "fa fa-envelope-open";
    // });
</script>

@endsection