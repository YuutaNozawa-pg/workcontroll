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
                    @foreach ($userWorks as $userWork)
                    <tr class="form-group">
                        <td>{{ $userWork->work_time }}</td>
                        <td><input class="form-control" type="text" value="{{ $userWork->start_time }}"></td>
                        <td><input class="form-control" type="text" value="{{ $userWork->end_time }}"></td>
                        <td><input class="form-control" type="text" value="{{ $userWork->break_time }}"></td>
                        <td><input class="form-control" type="text" value="{{ $userWork->over_time }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection