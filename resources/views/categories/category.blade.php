@extends('layouts.site')

@section('content')
<div class="container" id="comentBox">
        <div class="col-md-12">
        @foreach($category as $cat)
            <h2>Categoria: {{ $cat->nombre }}</h2>
        </div>
        @endforeach
</div>

@endsection