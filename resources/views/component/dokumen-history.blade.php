@push('after-css')
<style>
    a.btnAction {
        font-size: 20px;
    }

</style>
@endpush

@section('title','Document History')
@section('page-title','Document History')

@push('link-bread')
<li class="nav-item">
    <a href="{{ route('document.index') }}">Data Document History</a>
</li>
<li class="separator">
    <i class="flaticon-right-arrow"></i>
</li>
<li class="nav-item">
    <a href="#">History</a>
</li>
@endpush

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Document History Data</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Model Name</th>
                            <th>STCK</th>
                            <th>STNK</th>
                            <th>BPKB</th>
                            <th>Frame No.</th>
                            <th>Sale Date</th>
                            <th>Created By</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Model Name</th>
                            <th>STCK</th>
                            <th>STNK</th>
                            <th>BPKB</th>
                            <th>Frame No.</th>
                            <th>Sale Date</th>
                            <th>Created By</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @forelse($data as $o)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $o->sale->customer_name }}</td>
                            <td>{{ $o->sale->unit->model_name }}</td>
                            
                                @if($o->stck < 1)
                                <td style="background-color:#eb343480">
                                -
                                </td>
                                @else
                                <td>
                                {{ $o->stck }}
                                </td>
                                @endif
                            
                                @if($o->stnk < 1)
                                <td style="background-color:#eb343480">
                                -
                                </td>
                                @else
                                <td>
                                {{ $o->stnk }}
                                </td>
                                @endif

                                @if($o->bpkb < 1)
                                <td style="background-color:#eb343480">
                                -
                                </td>
                                @else
                                <td>
                                {{ $o->bpkb }}
                                </td>
                                @endif

                            <td>{{ $o->sale->frame_no }}</td>
                            <td>{{ \Carbon\Carbon::parse($o->sale_date)->format('j M Y') }}</td>
                            <td>{{ $o->createdBy->name }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" style="text-align: center;">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
