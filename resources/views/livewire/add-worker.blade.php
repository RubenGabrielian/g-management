<div class="container">
    <a href="{{url('home')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            <div class="card">
                <div class="card-header">Ավելացնել նոր աշխատակից</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Անուն</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Ազգանուն</label>
                        <input type="text" class="form-control" wire:model="surname">
                        @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Պաշտոն</label>
                        <input type="text" wire:model="position" class="form-control">
                        @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <button wire:loading.attr="disabled" wire:click="add" class="btn btn-primary">Ավելացնել</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
