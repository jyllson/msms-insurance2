@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Preview of {{ \App\Models\Page::find($id)->name }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-tabs">
                        @foreach(\App\Models\Page::all() as $page)                        
                            <li class="nav-item">
                                <a class="nav-link {{ $page->id == $id ? 'zeleno' : '' }}" aria-current="page" href="{{ url('/') }}/data/{{ $page->id }}">
                                    {{ $page->name }}
                                </a>
                            </li>                        
                        @endforeach
                    </ul>

                    <div class="tab-content" id="nav-tabContent">                        
                            @yield('data')                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection