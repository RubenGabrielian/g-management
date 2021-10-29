<div class="card-body add-work">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="form-group">
        <label for="">Անվանում</label>
        <input type="text" wire:model="name" class="form-control">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="">Քառակուսի մետրի գինը</label>
        <input type="text" wire:model="qm_price" class="form-control">
        @error('qm_price') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary" wire:click="add">Ավելացնել</button>
    </div>
    <div class="status"></div>
    @if(!empty($works))
        <div class="col-lg-12 works">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Անուն</th>
                        <th scope="col">Քառակուսի մետրի գին</th>
                        <th scope="col">Պահպանել</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($works as $work)
                        <tr id="work-{{$work->id}}">
                            <th scope="row">{{$work->id}}</th>
                            <td>{{$work->name}}</td>
                            <td><input type="text" value="{{$work->qm_price}}" style="width: 100px;"> ֏</td>
                            <input type="hidden" value="{{$work->id}}" class="work-id">
                            <td>
                                <button class="btn btn-success changeWorkPrice">Պահպանել</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
