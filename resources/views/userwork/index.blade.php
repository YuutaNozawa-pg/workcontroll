@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td><!-- 月を表示 --></td>
                        <td>始業時間</td>
                        <td>終業時間</td>
                        <td>休憩時間</td>
                        <td>残業時間</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><!-- 日を表示 --></td>
                        <td>10:00</td>
                        <td>19:00</td>
                        <td>1:00</td>
                        <td>1:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection