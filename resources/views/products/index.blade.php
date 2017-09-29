@extends('layouts.app')
@section('styles')
    <style type="text/css">
        table{
            font-size: 12pt;
        }

        td {
            vertical-align:middle!important;
            font-size:15pt!important;
            text-align: center;
        }
        table.dt-rowReorder-float{position:absolute !important;opacity:0.8;table-layout:fixed;outline:2px solid #888;outline-offset:-2px;z-index:2001}tr.dt-rowReorder-moving{outline:2px solid #555;outline-offset:-2px}body.dt-rowReorder-noOverflow{overflow-x:hidden}table.dataTable td.reorder{text-align:center;cursor:move}

        table.dataTable.dtr-inline.collapsed>tbody>tr>td.child,table.dataTable.dtr-inline.collapsed>tbody>tr>th.child,table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty{cursor:default !important}table.dataTable.dtr-inline.collapsed>tbody>tr>td.child:before,table.dataTable.dtr-inline.collapsed>tbody>tr>th.child:before,table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty:before{display:none !important}table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child,table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child{position:relative;padding-left:30px;cursor:pointer}table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before{top:9px;left:4px;height:14px;width:14px;display:block;position:absolute;color:white;border:2px solid white;border-radius:14px;box-shadow:0 0 3px #444;box-sizing:content-box;text-align:center;font-family:'Courier New', Courier, monospace;line-height:14px;content:'+';background-color:#31b131}table.dataTable.dtr-inline.collapsed>tbody>tr.parent>td:first-child:before,table.dataTable.dtr-inline.collapsed>tbody>tr.parent>th:first-child:before{content:'-';background-color:#d33333}table.dataTable.dtr-inline.collapsed>tbody>tr.child td:before{display:none}table.dataTable.dtr-inline.collapsed.compact>tbody>tr>td:first-child,table.dataTable.dtr-inline.collapsed.compact>tbody>tr>th:first-child{padding-left:27px}table.dataTable.dtr-inline.collapsed.compact>tbody>tr>td:first-child:before,table.dataTable.dtr-inline.collapsed.compact>tbody>tr>th:first-child:before{top:5px;left:4px;height:14px;width:14px;border-radius:14px;line-height:14px;text-indent:3px}table.dataTable.dtr-column>tbody>tr>td.control,table.dataTable.dtr-column>tbody>tr>th.control{position:relative;cursor:pointer}table.dataTable.dtr-column>tbody>tr>td.control:before,table.dataTable.dtr-column>tbody>tr>th.control:before{top:50%;left:50%;height:16px;width:16px;margin-top:-10px;margin-left:-10px;display:block;position:absolute;color:white;border:2px solid white;border-radius:14px;box-shadow:0 0 3px #444;box-sizing:content-box;text-align:center;font-family:'Courier New', Courier, monospace;line-height:14px;content:'+';background-color:#31b131}table.dataTable.dtr-column>tbody>tr.parent td.control:before,table.dataTable.dtr-column>tbody>tr.parent th.control:before{content:'-';background-color:#d33333}table.dataTable>tbody>tr.child{padding:0.5em 1em}table.dataTable>tbody>tr.child:hover{background:transparent !important}table.dataTable>tbody>tr.child ul.dtr-details{display:inline-block;list-style-type:none;margin:0;padding:0}table.dataTable>tbody>tr.child ul.dtr-details li{border-bottom:1px solid #efefef;padding:0.5em 0}table.dataTable>tbody>tr.child ul.dtr-details li:first-child{padding-top:0}table.dataTable>tbody>tr.child ul.dtr-details li:last-child{border-bottom:none}table.dataTable>tbody>tr.child span.dtr-title{display:inline-block;min-width:75px;font-weight:bold}div.dtr-modal{position:fixed;box-sizing:border-box;top:0;left:0;height:100%;width:100%;z-index:100;padding:10em 1em}div.dtr-modal div.dtr-modal-display{position:absolute;top:0;left:0;bottom:0;right:0;width:50%;height:50%;overflow:auto;margin:auto;z-index:102;overflow:auto;background-color:#f5f5f7;border:1px solid black;border-radius:0.5em;box-shadow:0 12px 30px rgba(0,0,0,0.6)}div.dtr-modal div.dtr-modal-content{position:relative;padding:1em}div.dtr-modal div.dtr-modal-close{position:absolute;top:6px;right:6px;width:22px;height:22px;border:1px solid #eaeaea;background-color:#f9f9f9;text-align:center;border-radius:3px;cursor:pointer;z-index:12}div.dtr-modal div.dtr-modal-close:hover{background-color:#eaeaea}div.dtr-modal div.dtr-modal-background{position:fixed;top:0;left:0;right:0;bottom:0;z-index:101;background:rgba(0,0,0,0.6)}@media screen and (max-width: 767px){div.dtr-modal div.dtr-modal-display{width:95%}}
    </style>

@endsection
@section('heading')
	قائمة المنتجات 
    
@endsection

@section('content')
	@include('partials.flash')
    <div style="width: 100%; padding-left: -10px;">
        <div class="table-responsive">
        	<table class="table-bordered display nowrap responsive" id="products" cellspacing="0" width="100%"> 
                <thead>
                    <tr >
                        <th>الرقم التسلسلي</th>
                        <th>اسم المنتج</th>
                        <th>سعر البيع</th>
                        <th>المزود</th>
                        <th>التصنيف</th>
                        <th>الصورة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
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
        owReorder: {
            selector: 'td:nth-child(2)'
        },
        language: {
	        url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Arabic.json"
	    },
        columns: [
            { data: 'id', name: 'id',orderable: true, searchable: true },
            { data: 'name', name: 'name',orderable: true, searchable: true },
            { data: 'sell_price', name: 'sell_price',orderable: true, searchable: true },
            { data: 'provider_id', name: 'provider_id',orderable: true, searchable: true },
            {data: 'category_id', name: 'category_id',orderable: true, searchable: true },
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
        var message = 'هل انت متأكد من أنك تود اتمام عملية الحذف ?';
        var ok = confirm(message);
        if (!ok) return false;
        $('#delete-form-' + id).submit();
    }
</script>
@endpush