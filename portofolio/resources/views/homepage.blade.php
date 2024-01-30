@extends('layouts.app')

@section('content')
<h1>僕は</h1>
<a href="{{ route('portfolio.list') }}">project saya</a>

    <div class="container">
        <div class="row">
            <a href="{{ route('siswa.index') }}">
                <div class="card" style="width: 18rem;">
                    <img src="#" alt="dongok">
                </div>
            </a>
        </div>
    </div>
@endsection