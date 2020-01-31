@extends('layouts.app')

@section('content')

  <div class="float-left">
    {{ $userWorkList->date->format('Y年m月') }}分
  </div>

  <form action="/userwork/download" method="POST" class="m-0">
    @csrf
    <button type="submit" class="csv-download btn btn-primary float-right">CSV</button>
  </form>
  
  <button type="button" class="btn btn-primary float-right mr-3" data-toggle="modal" data-target="#modal1">
    一括入力
  </button>
  <div class="modal fade" id="modal1" tabindex="-1"
        role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="label1">一括で入力することが出来ます</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul>
            <li>始業<input type="text" name="bulk-start-time" value=""></li>
            <li>定時<input type="text" name="bulk-end-time" value=""></li>
            <li>休憩<input type="text" name="bulk-break-time" value=""></li>
            <li>残業<input type="text" name="bulk-over-time" value=""></li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button type="button" class="bulk-input btn btn-primary">一括入力する</button>
        </div>
      </div>
    </div>
  </div>

  <form action="/userwork" method="POST" class="m-0">
    @method('PUT')
    @csrf

    <input type="hidden" value={{ $userWorkList->id }} name="user_work_list_id">

    <button type="submit" class="btn btn-primary float-right mr-3">更新</button>

    <div class="table-responsive">
        <table class="table table-bordered text-center mt-3">
          <thead>
            <tr>
              <th>日</th>
              <th>始業</th>
              <th>定時</th>
              <th>休憩</th>
              <th>残業</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($userWorks as $userWork)
            <tr>
              <input class="userwork-id" type="hidden" name="id[]" value="{{ $userWork->id }}">
              <td>{{ $userWork->day }}</td>
              <td><input class="start-time" type="text" name="start_time[]" value="{{ $userWork->start_time }}"></td>
              <td><input class="end-time" type="text" name="end_time[]" value="{{ $userWork->end_time }}"></td>
              <td><input class="break-time" type="text" name="break_time[]" value="{{ $userWork->break_time }}"></td>
              <td><input class="over-time" type="text" name="over_time[]" value="{{ $userWork->over_time }}"></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

  </form>
@endsection

<script>
window.onload = function () {

  $('.csv-download').on('click', function() {
    $(this).after($('.userwork-id').clone());
    $(this).after($('.start-time').clone());
    $(this).after($('.end-time').clone());
    $(this).after($('.break-time').clone());
    $(this).after($('.over-time').clone());

    $(this).siblings('.start-time').attr('type', 'hidden');
    $(this).siblings('.end-time').attr('type', 'hidden');
    $(this).siblings('.break-time').attr('type', 'hidden');
    $(this).siblings('.over-time').attr('type', 'hidden');
  });

  $('.bulk-input').on('click', function () {
    $('.start-time').each(function (){
      $(this).val($('[name=bulk-start-time').val());
    });
    $('.end-time').each(function () {
      $(this).val($('[name=bulk-end-time').val());
    })
    $('.over-time').each(function () {
      $(this).val($('[name=bulk-over-time').val());
    })
    $('.break-time').each(function () {
      $(this).val($('[name=bulk-break-time').val());
    })
  })
}
</script>