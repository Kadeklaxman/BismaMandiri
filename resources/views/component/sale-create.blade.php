@push('after-css')
<style>
    input[type=date]:required:invalid::-webkit-datetime-edit {
        color: transparent;
    }
    input[type=date]:focus::-webkit-datetime-edit {
        color: black !important;
    }
    ::-webkit-input-placeholder { /* WebKit browsers */
        text-transform: none;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        text-transform: none;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
        text-transform: none;
    }
    :-ms-input-placeholder { /* Internet Explorer 10+ */
        text-transform: none;
    }
    ::placeholder { /* Recent browsers */
        text-transform: none;
    }
</style>
@endpush

@push('button')
    @section('button-title','Sales History')
    @include('component.button-history')
@endpush

<div class="col-md-12" id="dataCreate">
    <div class="card">
        <div class="card-header">
        <livewire:widget-stock-qty>
            <span id="color_code" style="
                width: 10px; height: 50%; 
                display: inline-block;
                position: absolute;
                left: 0px;
                top: 0px;">
            </span>
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Add Sales</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('sale.store') }}" method="post" id="form">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="sale_date" type="date" class="form-control input-border-bottom"
                                name="sale_date" value="{{ old('sale_date') }}" required>
                            <label for="sale_date" class="placeholder">Date *</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input type="hidden" id="unit_id" name="unit_id" value="{{ old('unit_id') }}" required>
                            <input id="model_name" type="text" class="form-control input-border-bottom"
                                name="model_name" data-toggle="modal"
                                data-target=".modalData" value="{{ old('model_name') }}" style="text-transform: uppercase;" required>
                            <label for="model_name" class="placeholder">Select Stock *</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="color" type="text" class="form-control input-border-bottom" name="color" value="{{ old('color') }}"
                                placeholder="Color *" style="text-transform: uppercase;">
                            <label for="color" class="placeholder"></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="year_mc" type="number" class="form-control input-border-bottom" name="year_mc" value="{{ old('year_mc') }}"
                                placeholder="Year MC *" style="text-transform: uppercase;" >
                            <label for="year_mc" class="placeholder"></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="on_hand" type="text" class="form-control input-border-bottom" name="on_hand" value="{{ old('on_hand') }}"
                                placeholder="Stock On Hand *" style="text-transform: uppercase;" readonly>
                            <label for="on_hand" class="placeholder"></label>

                            <span class="invalid-feedback">
                                <strong><span id="error-msg"></span></strong>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="frame_no" type="text" class="form-control input-border-bottom {{ Session::has('auto') ? 'is-invalid' : '' }}" name="frame_no" value="{{ old('frame_no') }}" @if(Session::has('auto')) autofocus="autofocus" onclick="this.select()" @endif style="text-transform: uppercase;" required>
                            <label for="frame_no" class="placeholder">Frame No. *</label>
                            @if(Session::has('auto'))
                                <span class="invalid-feedback">
                                    <strong>frame no. already sold!</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="engine_no" type="text" class="form-control input-border-bottom" name="engine_no" value="{{ old('engine_no') }}" placeholder="Engine No." style="text-transform: uppercase;">
                            <label for="engine_no" class="placeholder"></label>
                        </div>
                    </div>
                

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="customer_email" type="text" class="form-control input-border-bottom" name="customer_email" value="{{ old('customer_email') }}" placeholder="Customer's Email">
                            <label for="customer_email" class="placeholder"></label>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="nik" type="number" class="form-control input-border-bottom" name="nik" value="{{ old('nik') }}"
                                placeholder="Customer's NIK" style="text-transform: uppercase;">
                            <label for="nik" class="placeholder"></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="customer_name" type="text" class="form-control input-border-bottom" name="customer_name" value="{{ old('customer_name') }}"
                                placeholder="Customer's Name" style="text-transform: uppercase;">
                            <label for="customer_name" class="placeholder"></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="phone" type="text" class="form-control input-border-bottom" name="phone" value="{{ old('phone') }}"
                                placeholder="Customer's Phone" style="text-transform: uppercase;">
                            <label for="phone" class="placeholder"></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-floating-label">
                            <input id="address" type="text" class="form-control input-border-bottom" name="address" value="{{ old('address') }}"
                                placeholder="Customer's Address" style="text-transform: uppercase;">
                            <label for="address" class="placeholder"></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
                <button type="reset" class="btn btn-default"><i class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
            </form>
        </div>
    </div>
</div>

@section('modal-title','Data Stock')
@include('component.modal-data')
{{-- <livewire:modal-dealer/> --}}

@push('after-script')
<script>
    $(document).ready(function(){
        $('#form').submit(function(e){
            let onHand = $('#on_hand').val();
            let stock = onHand - 1;
            console.log(onHand);
            console.log(stock);
            if (stock < 0) {
                e.preventDefault();
                $('#on_hand').addClass('is-invalid');
                $('#error-msg').text('out of stock!');
            } else {
                $('#form').submit();
            }
        });
    });

    $('#on_hand').keypress(function(e){
        e.preventDefault();
    });

    $('#on_hand').keydown(function(e){
        e.preventDefault();
    });

    // document.addEventListener('contextmenu', function(e){
    //     e.preventDefault();
    // });
</script>
@endpush
