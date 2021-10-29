

<div class="card add-salary">

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card-header">Ավելացնել աշխատավարձ</div>
    <div class="card-body">

        @if($worker->position_id == '1')
            <div class="alert alert-danger">Նշեք այն օրերը, երբ աշխատակիցը ներկա է եղել</div>
            <div class="multiple"></div>
            <button class="btn btn-primary save-default-worker-salary">Պահպանել</button>
            <input type="hidden" class="worker_id" value="{{$worker->id}}">
            <div class="status"></div>
        @else
            <div class="form-group">
            <label for="">Ընտրել ամսաթիվը</label>
            <input type="date" wire:model="date" class="form-control">
            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="">Քառակուսի մետր</label>
            <input type="number" wire:model="qm" class="form-control">
        </div>
            <div class="form-group">
                <label for="">Ընտրել աշխատանքը</label>
                <select name="" class="form-control" wire:model="work" id="">
                    <option value="">Ընտրել</option>
                    @foreach($works as $work)
                        <option value="{{$work->id}}">{{$work->name}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <button class="btn btn-primary" wire:click="submit">Պահպանել</button>
        </div>
    </div>
        @endif

        <div class="card-footer">
        <p>Աշխատակից ՝ {{$worker->name}} {{$worker->surname}}</p>
    </div>
</div>
