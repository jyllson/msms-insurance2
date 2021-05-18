@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Podesavanja</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Stranice:
                    <hr>
                    <form action="/page/store" method="POST">
                        @csrf
                        @foreach($pages as $page)
                            <p>
                                <input type="text" name="page_{{ $page->id }}" value="{{ $page->name }}">
                            </p>
                        @endforeach
                        <input type="submit" value="Promeni nazive strana">
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection