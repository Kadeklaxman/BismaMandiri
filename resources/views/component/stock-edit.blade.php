@section('title','Edit Stock')
@section('page-title','Unit')

@push('link-bread')
<li class="nav-item">
    <a href="{{ route('stock.index') }}">Data Stock</a>
</li>
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">Edit</a>
</li>
@endpush

<div class="col-md-12" id="dataCreate">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Edit Stock {{ $unit->model_name }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('stock.update', $unit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-floating-label">
                            <input id="qty" type="text" class="form-control input-border-bottom" name="qty"
                                    value="{{ $unit->qty }}" placeholder="Stock*" style="text-transform: uppercase;" readonly>
                                <label for="qty" class="placeholder"></label>
                            </div>
    
                            <div class="form-group form-floating-label" style="display: none;" id="formImage">
                                <input id="image" type="file" class="form-control input-border-bottom" name="image">
                                <label for="image" class="placeholder">Image (optional)</label>
                                
                                <span class="badge badge-warning">
                                    <strong style="color: black;">format required: jpg | jpeg | png</strong>
                                </span>
                            </div>
    
                            <div class="row" style="margin: 10px 10px;">
                                <button class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
                                <button type="reset" class="btn btn-default" style="margin-left: 2px;"><i
                                        class="fas fa-undo"></i>&nbsp;&nbsp;Reset</button>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('after-script')
<script>
    $('#btnImage').on('click', function () {
        $('#formImage').css('display', 'block');
        $('#formImage').addClass('fadeInBawah');
    });
</script>
@endpush
