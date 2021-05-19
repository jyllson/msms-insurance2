@extends('data-show')

@section('data')	
    @foreach(\App\Models\Data::where('page_id', '=', $id)->get() as $data)                                    
        <div class="alert alert-primary">
            <div class="row">
                <strong class="col-md-9">{{ $data->title }}</strong>
                <span class="col-md-2">{{ date_format(date_create($data->created_at), 'd/m/Y') }}</span>
            </div>
        </div>
        <p>{{ $data->text }}</p>
    @endforeach
@endsection