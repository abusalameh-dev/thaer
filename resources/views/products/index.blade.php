@extends('layouts.app')
@section('styles')
    <style type="text/css">
        td {
            vertical-align:middle!important;
            font-size:18px!important;
            text-align: center;
        }

    </style>
@endsection
@section('heading')
	قائمة الأصناف 
    
@endsection

@section('content')
	@include('partials.flash')
	<table class="table table-bordered table-responsive" id="products">
        <thead>
            <tr >
                <th>الرقم التسلسلي</th>
                <th>اسم الصنف</th>
                <th>سعر البيع</th>
                <th>سعر التكلفة</th>
                <th>الصورة</th>
                <th>الاجراءات</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script>
$(function() {
    $('#products').DataTable({
        lengthMenu: [ [10, 25, 50], [10, 25, 50] ],
        processing: true,
        serverSide: true,
        ajax: '{!! route('api.products') !!}',
        paging:true,
        responsive: true,
        language: {
	        url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Arabic.json"
	    },
        columns: [
            { data: 'id', name: 'id',orderable: true, searchable: true },
            { data: 'name', name: 'name',orderable: true, searchable: true },
            { data: 'sell_price', name: 'sell_price',orderable: true, searchable: true },
            { data: 'origin_price', name: 'origin_price',orderable: true, searchable: true },
            { data: 'image', name: 'image',orderable: true, searchable: true },
            {data: 'actions', name: 'actions', orderable: false, searchable: false}
        ]
    });
});
var alertEl = $('div.alert');
    if (alertEl) {
        setTimeout(function() {
            alertEl.slideUp('2000', function() {
            });
        }, 2500);
    }

function deleteItem(id) {
        var message = 'Are you sure you want to delete this record ?';
        var ok = confirm(message);
        if (!ok) return false;
        $('#delete-form-' + id).submit();
    }
</script>
@endpush