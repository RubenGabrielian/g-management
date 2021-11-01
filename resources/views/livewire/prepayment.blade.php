<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="form-group">
        <h5>Ընտրել Տեսակը</h5>
        <div class="mt-3">
            <label for="debt">Պարտք</label>
            <input type="radio" wire:model="type" name="prepayment" id="debt" value="debt">
            <label for="prepayment" class="ml-3">Կանխաճար</label>
            <input type="radio" wire:model="type" name="prepayment" id="prepayment" value="prepayment">
        </div>
    </div>
    <div class="form-group">
        <label for="">Գումարի չափ</label>
        <input type="number" wire:model="price" class="form-control">
    </div>
    <div class="form-group prepayment-month">
        <label for="">{{$label}}</label>
        <input type="month" wire:model="date" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" {{$disabled}} wire:click="submit">Պահպանել</button>
    </div>

</div>
