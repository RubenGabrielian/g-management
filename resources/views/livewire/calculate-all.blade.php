<?php $date = date("Y-m"); ?>

<div class="card">
    <div class="card-header">
        Տվյալ ամսվա աշխատավարձների ցուցակ {{date("Y-m")}}
    </div>
    <div class="card-body">
        <button id="changeDateFromAll" class="btn btn-success mb-2">Փոխել ամսաթիվը</button>
        <input type="month" id="changeDateFromAllInput" wire:model="date" class="form-control" value="{{date("Y-m")}}">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Անուն Ազգանուն</th>
                        <th scope="col">Գումար</th>
                        <th scope="col">ՔՄ / Օրավարձ</th>
                        <th scope="col">Մանրամասն</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($workers as $worker)

                        <tr>
                            <th scope="row">{{$worker->id}}</th>
                            <td>{{$worker->worker->name . '  ' . $worker->worker->surname}}</td>
                            <td>{{$worker->month_salary}} ֏</td>
                            <td>{{$worker->total_qm}} @if($worker->worker->position_id == 1) Օր/ {{$worker->worker->default_salary}} ֏ @else ՔՄ․ @endif</td>
                            <td><a href="{{url("/calculate/".$worker->worker->id.'?date='.$selectedDate)}}"
                                   class="btn btn-danger to-details">Մանրամասն</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <h4 class="text-right m-0">Ընդհանուր այս ամսվա համար ՝ <strong>{{$all}} ֏</strong></h4>
    </div>
</div>
