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
                        <th scope="col">Քառակուսի մետր</th>
                        <th scope="col">Մանրամասն</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($totals as $total)

                        <tr>
                            <th scope="row">{{$total->id}}</th>
                            <td>{{$total->worker->name . $total->worker->surname}}</td>
                            <td>{{$total->total_price}} ֏</td>
                            <td>{{$total->total_qm}} ՔՄ․</td>
                            <td><a href="{{url("/calculate/".$total->worker->id.'?date='.$selectedDate)}}"
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
