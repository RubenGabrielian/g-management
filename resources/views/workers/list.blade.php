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
                            <p>{{$worker->position}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/add/salary/'.$worker->id)}}" class="btn btn-success">Ավելացնել աշխատավարձ</a>
                            <a href="{{url('/calculate/'.$worker->id)}}" class="btn btn-warning">Հաշվել</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
