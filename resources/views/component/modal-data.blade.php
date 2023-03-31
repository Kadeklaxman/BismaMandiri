<div class="modal fade modalData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">@yield('modal-title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i style="color: red;" class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="modal-filter-select" class="display table table-striped table-hover" width="100%">
                        <!-- IF -->
                        @if(Route::is('stock.*') )
                        <thead>
                            <tr>
                                <th>Model Name</th>
                                <th>Category</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Qty</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Model Name</th>
                                <th>Category</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Qty</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($unit as $o)
                            <tr data-id="{{ $o->id }}" data-model="{{ $o->model_name }}"
                                data-color="{{ $o->color->color_name }}" data-colorcode="{{ $o->color->color_code }}"
                                data-yearmc="{{ $o->year_mc }}"data-onhand="{{ $o->qty }}" class="klik">
                                <td>{{ $o->model_name }}</td>
                                <td>{{ $o->category }}</td>
                                <td style="background-color: <?php echo $o->color->color_code ?>50 ;">
                                    {{ $o->color->color_name }}
                                </td>
                                <td>{{ $o->year_mc }}</td>

                                <td>{{ $o->createdBy->name }}</td>
                                <td>{{ $o->updatedBy->name }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <!-- ELSE IF -->
                        @elseif(Route::is('sale.*'))
                        
                        <thead>
                            <tr>
                                <th>Model Name</th>
                                <th>Color</th>
                                <th>Qty</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Model Name</th>
                                <th>Color</th>
                                <th>Qty</th>
                                <th>Year</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($unit as $o)
                            <tr data-id="{{ $o->id }}" data-model="{{ $o->model_name }}"
                                data-color="{{ $o->color->color_name }}"
                                data-colorcode="{{ $o->color->color_code }}" data-yearmc="{{ $o->year_mc }}"
                                data-onhand="{{ $o->qty }}"
                                class="klik">
                                <td>{{ $o->model_name }}</td>
                                <td style="background-color: <?php echo $o->color->color_code ?>50 ;">
                                    {{ $o->color->color_name }}
                                </td>
                                <td @if($o->qty == 0) style="background-color: maroon; color: #fff;" @endif>{{ $o->qty }}</td>
                                <td>{{ $o->year_mc }}</td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <!-- ELSE IF -->
                        @elseif(Route::is('document.*'))
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Model Name</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Frame No</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Customer</th>
                                <th>Model Name</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Frame No</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($sale as $o)
                            <tr data-id="{{ $o->id}}" 
                                data-customer="{{ $o->customer_name }}"
                                data-phone="{{ $o->phone }}"
                                data-address="{{ $o->address }}"
                                data-model="{{ $o->unit->model_name }}"
                                data-color="{{ $o->unit->color->color_name }}"
                                data-yearmc="{{ $o->unit->year_mc }}"
                                data-frame="{{ $o->frame_no }}"
                                data-engine="{{ $o->engine_no }}"
                                data-colorcode="{{ $o->unit->color->color_code }}"
                                class="klik">
                                <td>{{ $o->customer_name }}</td>
                                <td>{{ $o->unit->color->color_name }}</td>
                                <td>{{ $o->unit->model_name }}</td>
                                <td>{{ $o->frame_no }}</td>
                                <td>{{ $o->unit->year_mc }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>

                        <!-- ELSE IF -->
                        @elseif(Route::is('branch-delivery.*'))
                        <thead>
                            <tr>
                                <th>Model Name</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Frame No</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Model Name</th>
                                <th>Color</th>
                                <th>Year</th>
                                <th>Frame No</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($out as $o)
                            <tr data-id="{{ $o->id}}"
                                data-model="{{ $o->stock->unit->model_name }}"
                                data-color="{{ $o->stock->unit->color->color_name }}"
                                data-yearmc="{{ $o->stock->unit->year_mc }}"
                                data-frame="{{ $o->frame_no }}"
                                data-engine="{{ $o->engine_no }}"
                                data-colorcode="{{ $o->stock->unit->color->color_code }}"
                                class="klik">
                                <td>{{ $o->stock->unit->color->color_name }}</td>
                                <td>{{ $o->stock->unit->model_name }}</td>
                                <td>{{ $o->frame_no }}</td>
                                <td>{{ $o->stock->unit->year_mc }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>

                        <!-- ELSE -->
                        @else
                        <tbody>
                            <tr style="text-align: center;">
                                <td colspan="5" style="text-align: center;">No data available</td>
                            </tr>
                        </tbody>
                        <!-- END IF -->
                        @endif
                    </table>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <p><strong>BismaM</strong></p>
            </div>
        </div>
    </div>
</div>

@push('after-script')

@if(Route::is('stock.*') )
<script>
    $(document).on('click', '.klik', function (e) {
        let code = $(this).attr('data-colorcode');
        $('#unit_id').val($(this).attr('data-id'));
        $('#model_name').val($(this).attr('data-model'));
        $('#color').val($(this).attr('data-color'));
        $('#year_mc').val($(this).attr('data-yearmc'));
        $('.modalData').modal('hide');
        $('#on_hand').val($(this).attr('data-onhand'));
        $('#color_code').css('background', code);
    });
</script>
@elseif(Route::is('sale.*'))
<script>
    $(document).on('click', '.klik', function (e) {
        let code = $(this).attr('data-colorcode');
        $('#unit_id').val($(this).attr('data-id'));
        $('#model_name').val($(this).attr('data-model'));
        $('#color').val($(this).attr('data-color'));
        $('#year_mc').val($(this).attr('data-yearmc'));
        $('#on_hand').val($(this).attr('data-onhand'));
        $('.modalData').modal('hide');
        $('#color_code').css('background', code);
    });
</script>
@elseif(Route::is('document.*'))
<script>
    $(document).on('click', '.klik', function (e) {
        let code = $(this).attr('data-colorcode');
        $('#sale_id').val($(this).attr('data-id'));
        $('#customer_name').val($(this).attr('data-customer'));
        $('#phone').val($(this).attr('data-phone'));
        $('#address').val($(this).attr('data-address'));
        $('#model_name').val($(this).attr('data-model'));
        $('#color').val($(this).attr('data-color'));
        $('#year_mc').val($(this).attr('data-yearmc'));
        $('#frame_no').val($(this).attr('data-frame'));
        $('#engine_no').val($(this).attr('data-engine'));
        $('.modalData').modal('hide');

        $('#color_code').css('background', code);
    });
</script>
@elseif(Route::is('branch-delivery.*'))
<script>
    $(document).on('click', '.klik', function (e) {
        let code = $(this).attr('data-colorcode');
        $('#out_id').val($(this).attr('data-id'));
        $('#phone').val($(this).attr('data-phone'));
        $('#address').val($(this).attr('data-address'));
        $('#model_name').val($(this).attr('data-model'));
        $('#color').val($(this).attr('data-color'));
        $('#year_mc').val($(this).attr('data-yearmc'));
        $('#frame_no').val($(this).attr('data-frame'));
        $('#engine_no').val($(this).attr('data-engine'));
        $('.modalData').modal('hide');

        $('#color_code').css('background', code);
    });
</script>
@endif

<script>
    $(document).ready(function () {
        $('#modal-filter-select').DataTable({
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