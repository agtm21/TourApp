@extends('layouts.main',['title'=> 'About'])
@section('about')
    <div class="container">
        <form action="/kritiksaran" method="post">
          @csrf
            <div class="mb-3">
              <label for="suggestion" class="form-label">Kritik dan Saran</label>
              <input type="text" class="form-control" id="suggestion" name="suggestion">
              <div id="suggestion" class="form-text">Kirimkan Saran dan Kritik Anda.</div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
    </div>
@endsection