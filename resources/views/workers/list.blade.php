@extends("layouts.app")

@section("content")

    <div class="container">
        <a href="{{url('home')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
        <div class="row">
            @foreach($workers as $worker)
                <div class="col-md-3 worker">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$worker->name}} {{$worker->surname}}</h4>
                            <p>{{$worker->position->position}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/add/salary/'.$worker->id)}}" class="btn btn-success">Աշխատավարձ <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                </svg></a>
                            <a href="{{url('/calculate/'.$worker->id)}}" class="btn btn-danger">Հաշվել <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                </svg></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
