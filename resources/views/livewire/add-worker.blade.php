<div class="container add-worker">
    <a href="{{url('home')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                        <label for="name" class="d-block">Պաշտոն</label>
                        @foreach($positions as $position)
                            <button class="btn btn-warning" id="position-{{$position->id}}" wire:click="changePosition({{$position->id}})">{{$position->position}}</button>
                        @endforeach
                        @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Ստաբիլ օրական աշխատավարձ (ոչ պարտադիր դաշտ)</label>
                        <input type="number" wire:model="defaultSalary" class="form-control">
                    </div>
                    <div class="form-group">
                        <button wire:loading.attr="disabled" wire:click="add" class="btn btn-primary">Ավելացնել</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
