@extends('Login.layoutbaru')
@section('konten')

@section('navbar')
    <h1>navbar</h1>
@endsection

@section('konten')

<div class="container d-flex justify-content-end align-items-center polman-form-login login-divider">
    <form class="border p- bg-white" style="width: 300px;" action="/loginproses" method="post">
        @csrf
        <h4 class="text mb-4 login-divide">Login</h4>
        <hr class="black-bold-divider"><!-- Tambahkan tag <hr> di sini -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username<span style="color: red;">*</span></label>
            <input type="text" class="form-control border" name="png_username">
            @error('png_username')
                <span class="text-danger">Email tidak boleh kosong</span><br>
            @enderror
            
        </div>
        <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">Password<span style="color: red;">*</span></label>
            <input type="password" class="form-control" name="png_password">
            @error('png_password')
                <span class="text-danger">Password tidak boleh kosong</span><br>
            @enderror
            @if(session('error'))
        <div style="color: red; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif
        </div>
    

        <p class="mb-0">
            <a href="/register" class="text-center">Pembuatan Akun</a>
        </p>
       <br>
        <button type="submit" class="btn btn-primary">Masuk</button>
       
    </form>
</div>


@endsection
