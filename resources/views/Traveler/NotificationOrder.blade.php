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
                   
                        @foreach ($notifications as $item)
                            
                            <a class="card-body btn btn-outline-info mb-3" href="#mailcollapse"  data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="mail">
                                <div class="d-flex justify-content-start align-item-start ms-3">
                                    <i class="fa fa-envelope" id="amplop">
                                        <span style="font-family: Arial, Helvetica, sans-serif" class="ms-2">
                                            {{ $item->data['subject'] }} <span class="text-muted fw-normal"> - content substring</span>
                                        </span>
                                    </i>
                                </div>
                            </a>
                            
                        @endforeach
                    {{-- collapse email content  --}}
                    <div class="collapse" id="mailcollapse">
                        <div class="container">
                            <div class="row bg-secondary">
                                <p class="fs-2 fw-bold text-center mt-3">
                                    Dolphin Tour
                                </p>
                                <div class="col col-2"></div>
                                <div class="col border m-3 shadow-sm bg-white">
                                    
                                    <div class="mx-4 mt-5"> 
                                        <b >
                                            Hi {{}}
                                        </b>
                                        <p class="my-4">Isi Pesan</p>
                                        <div class="d-flex justify-content-center my-4">

                                            <a class="btn btn-dark " href="/penyewaan">
                                                Cek Pesanan
                                            </a>
                                        </div>
                                        <p>Salam, Dolphin Tour</p>
                                        <hr>
                                        <p class="text-center">
                                            Semoga Tour Anda Menyenangkan!
                                        </p>
                                    </div>
                                </div>
                                <div class="col col-2"></div>
                                <div class="text-center my-4">
                                    © 2022 Copyright:
                                    <a class="text-dark" href="#">Dolphintour.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection