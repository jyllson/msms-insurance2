@extends('data-show')

@section('data')	
    @foreach($datas as $data)                                    
        <div class="alert alert-primary">
            <div class="row">
                <strong class="col-md-9"><pre wrap="hard">{!! $data->title !!}</pre></strong>
                <span class="col-md-2">{{ date_format(date_create($data->created_at), 'm/d/Y') }}</span>
            </div>
        </div>
        <p><pre wrap="hard">{{ $data->text }}</pre></p>
    @endforeach
    <div class="d-flex justify-content-center">
    	{{ $datas->links() }}
	</div>
@endsection