@extends("layouts.app")
@section("content")

    <div class="container">
        <div class="col-md-12">
            <a href="{{url('workers')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
            <livewire:salary :worker="$worker" />
        </div>
    </div>
    </div>

@endsection
