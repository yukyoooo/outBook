@extends('layouts.app')

@section('content')
    <div class="top-image" style="margin-top:-63px;">
        <h1 class="top-title">Out Book</h1>
        <p>let's output a book ! out book!</p>
    </div>
    <div class="container">
        <div class="row justify-content-around" style="margin-bottom:30px;">
            @include('components._slides')

        </div>
{{--        {{  $slides->links() }}--}}
    </div>
@endsection
