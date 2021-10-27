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
                    <div class="btn btn-primary" wire:click="calc">Հաշվել</div>
                    <p>{{$test}}</p>
                    @if(!empty($salary))

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ամսաթիվ</th>
                                        <th scope="col">Գումար</th>
                                        <th scope="col">Քառակուսի մետր</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($salary as $sal)

                                        <tr>
                                            <th scope="row">{{$sal->id}}</th>
                                            <td>{{$sal->day . '-' . $sal->month . '-' . $sal->year}}</td>
                                            <td>{{$sal->price}} ֏</td>
                                            <td>{{$sal->qm}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4 class="text-right">Ընդհանուր այս ամսվա համար ՝ <strong>{{$total}} ֏</strong></h4>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
