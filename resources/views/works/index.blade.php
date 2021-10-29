@extends("layouts.app")
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{url('/home')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
                <div class="card">
                    <div class="card-header">Ավելացնել նոր աշխատանք</div>
                    <livewire:add-work/>
                </div>
            </div>
        </div>
    </div>

@endsection
