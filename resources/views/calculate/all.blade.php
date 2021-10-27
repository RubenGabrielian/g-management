@extends("layouts.app")
@section("content")
    <?php
        $date = date("Y-m");
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{url('home')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
                <livewire:calculate-all :date="$date" />
            </div>
        </div>
    </div>

@endsection
