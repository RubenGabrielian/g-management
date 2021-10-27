

<div class="card">

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card-header">Ավելացնել աշխատավարձ</div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Ընտրել ամսաթիվը</label>
            <input type="date" wire:model="date" class="form-control">
            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="">Գումարի չափ</label>
            <input type="number" wire:model="price" class="form-control">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="">Քմ․ (ոչ պարտադիր դաշտ)</label>
            <input type="number" wire:model="qm" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" wire:click="submit">Պահպանել</button>
        </div>
    </div>
    <div class="card-footer">
        <p>Աշխատակից ՝ {{$worker->name}} {{$worker->surname}}</p>
    </div>
</div>
