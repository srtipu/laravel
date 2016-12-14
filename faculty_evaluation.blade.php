@extends('layouts.app')

@section('content')
<style>
.panel-heading{
    font-size: 30px;
    text-align: center;
}
.panel-body{
   font-size: 20px;
   /*text-align: center;*/
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Faculty Evaluation</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Course</th>
                            <th>Q_1 Average</th>
                            <th>Q_2 Average</th>
                            <th>Q_3 Average</th>
                            <th>Q_4 Average</th>
                            <th>Q_5 Average</th>
                            <th>Total</th>
                        </tr>
                        @foreach($calculations as $calculation)
                        <tr>
                            <td>{!! $calculation->cid !!}</td>
                            <td>{!! $calculation->Q_1_Average !!}</td>
                            <td>{!! $calculation->Q_2_Average !!}</td>
                            <td>{!! $calculation->Q_3_Average !!}</td>
                            <td>{!! $calculation->Q_4_Average !!}</td>
                            <td>{!! $calculation->Q_5_Average !!}</td>
                            <td>{!! $calculation->overall !!}</td>
                        </tr>
                        @endforeach 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
