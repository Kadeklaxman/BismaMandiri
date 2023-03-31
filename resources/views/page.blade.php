@extends('layouts.main')

@section('content')
    @if(Route::is('dashboard'))
        @section('title','Dashboard')
        @section('page-title','Dashboard')

        @push('link-bread')
        <li class="nav-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        @endpush
        <livewire:sale-chart>

        <!-- User Page -->
        @elseif(Route::is('user.*'))
        @if(Route::is('user.edit'))
            @include('component.user-edit')
        @elseif(Route::is('user.show'))
            @include('component.user-show')
        @else
            @include('component.user-create')
            @include('component.user-data')
        @endif

        <!-- Sale Page -->
    @elseif(Route::is('sale.*'))
    @if(Route::is('sale.history'))
        @include('component.search-box')
        @include('component.sale-history')
    @else
        @include('component.sale-create')
        @include('component.sale-data')
    @endif

        <!-- Dokumen Page -->
    @elseif(Route::is('document.*'))
    {{-- @include('component.dokumen-create') --}}
    @if(Route::is('document.show'))
        @include('component.dokumen-show')
    @elseif(Route::is('document.edit'))
        @include('component.dokumen-edit')
    @elseif(Route::is('document.history'))
        @include('component.search-box')
        @include('component.dokumen-history') 
    @else
        @include('component.dokumen-data')
    @endif

        <!-- Unit Page -->
        @elseif(Route::is('unit.*'))
        @if(Route::is('unit.edit'))
            @include('component.unit-edit')
        @elseif(Route::is('unit.show'))
            @include('component.unit-show')
        @else
            @include('component.unit-create')
            @include('component.unit-data')
        @endif

        <!-- Stock Page -->
        @elseif(Route::is('stock.*'))
        @if(Route::is('stock.edit'))
            @include('component.stock-edit')
        @elseif(Route::is('stock.show'))
            @include('component.stock-show')
        @else
            @include('component.stock-create')
            @include('component.stock-data')
        @endif

        <!-- Color Page -->
        @elseif(Route::is('color.*'))
        @if(Route::is('color.edit'))
            @include('component.color-edit') 
        @else
            @include('component.color-create')
            @include('component.color-data')
        @endif

    @endif
    
@endsection

@push('after-script')
<script>
    $(document).ready(function () {
        $('#basic-datatables').DataTable({});

        $('#basic-table-position').DataTable({});

        $('#multi-filter-select').DataTable({
            "pageLength": 20,
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });
    });

</script>
@endpush
