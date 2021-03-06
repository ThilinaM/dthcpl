@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('user_detail_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.user-details.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.userDetail.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.userDetail.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-UserDetail">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.nic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.library_card_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.userDetail.fields.sms_send') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userDetails as $key => $userDetail)
                                    <tr data-entry-id="{{ $userDetail->id }}">
                                        <td>
                                            {{ $userDetail->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $userDetail->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $userDetail->nic ?? '' }}
                                        </td>
                                        <td>
                                            {{ $userDetail->library_card_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $userDetail->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $userDetail->address ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $userDetail->sms_send ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $userDetail->sms_send ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('user_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.user-details.show', $userDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('user_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.user-details.edit', $userDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('user_detail_delete')
                                                <form action="{{ route('frontend.user-details.destroy', $userDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.user-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-UserDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection