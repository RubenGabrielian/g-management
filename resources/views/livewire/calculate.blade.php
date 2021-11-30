<div class="container">
    <?php
    if (isset($_GET['date'])) {
        $selectedDate = $_GET['date'];
    }
    ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{url('workers')}}" class="btn mb-3 btn-outline-danger">Հետ</a>
            <div class="card">
                <div class="card-header">
                    Հաշվել աշխատակցի աշխատավարձը ({{$worker->name}} {{$worker->surname}})
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Ընտրել ամիսը</label>
                        <input wire:model="month" type="month" class="form-control">
                    </div>
                    <div class="btn btn-primary mb-3" wire:click="calc">Հաշվել</div>
                    @if(!empty($salary))
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ամսաթիվ</th>
                                        <th scope="col">Գումար</th>
                                        @if($salary[0]->worker->position_id == 2)
                                            <th scope="col">Աշխատանք</th>
                                        @endif
                                        <th scope="col">Քառակուսի մետր</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($salary))
                                        @foreach($salary as $sal)

                                            <tr>
                                                <th scope="row">{{$sal->id}}</th>
                                                <td>{{$sal->day . '-' . $sal->month . '-' . $sal->year}}</td>
                                                <td>
                                                    @if($sal->worker->position_id == 1)
                                                        {{$sal->worker->default_salary}}
                                                    @else
                                                        {{$sal->qm * $sal->work->qm_price}}
                                                    @endif
                                                    ֏
                                                </td>
                                                @if($sal->worker->position_id == 2)
                                                    <td>
                                                        {{$sal->work->name}}
                                                    </td>
                                                @endif
                                                <td>{{$sal->qm}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4 class="text-right">Ընդհանուր այս ամսվա համար ՝ <strong>{{$total}} ֏</strong></h4>
                        <hr>
                        <div class="text-right">
                            @if(!empty($prepayments))
                                @foreach($prepayments as $prepayment)
                                    <p><?php  echo $prepayment->type == "prepayment" ? "Կանխավճար" : "Պարտք" ?> {{$prepayment->price}} ֏</p>
                                @endforeach
                            @endif
                            <h4 class="alert alert-danger">Հանած պարքերը և
                                կանխավճարները: {{$grandTotal}} ֏</h4>
                            <button class="btn btn-danger" wire:click="takeDept">Թողնել պարտք</button>
                            <button class="btn btn-success" wire:click="print"><span>ՏՊԵԼ</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-printer" viewBox="0 0 16 16">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                </svg>
                            </button>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if($showPrepayment)
                                <div class="take-debt">
                                    <div class="form-group mt-3">
                                        <label for="">Գումարի որ մասն եք ուզում թողնել պարտք</label>
                                        <input type="number" wire:model="prepayment" class="form-control">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Որ ամսին եք ուզում վերադարձնել</label>
                                        <input type="month" wire:model="whichMonth" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" wire:click="addPrepayment">Պահպանել</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
