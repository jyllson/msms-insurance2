@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ \App\Models\Page::find($id)->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('/') }}/data/store" method="POST">
                        @csrf
                        <input type="hidden" name="page" value="{{ $id }}">
                        <textarea rows="5" name="data_title" class="form-control" style="font-family: 'Comic Neue', sans-serif; font-size: 20px; "></textarea>
                        <textarea rows="30" name="data_text" class="form-control" style="font-family: 'Comic Neue', sans-serif; font-size: 20px; "></textarea>
                        <input type="submit" class="btn btn-primary" value="Unezi podatke">
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection