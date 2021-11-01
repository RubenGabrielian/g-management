@extends("layouts.app")
@section("content")


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{url('/workers')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
                <div class="card">
                    <div class="card-header">
                        {{$worker->name . ' ' . $worker->surname}} - ին տալ կանխավճար / պարտք
                    </div>
                    <div class="card-body">
                        <livewire:prepayment :worker="$worker" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
