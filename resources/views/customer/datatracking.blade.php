@extends('layouts.customer')

@section('title','Data Tracking')
@section('page-title','Data Tracking')
<div class="col-md-12 d-flex justify-content-center">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Document Data</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sale Date</th>
                            <th>Customer Name</th>
                            <th>Model Name</th>
                            <th>STCK</th>
                            <th>STNK</th>
                            <th>BPKB</th>
                            <th>Frame No.</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Sale Date</th>
                            <th>Customer Name</th>
                            <th>Model Name</th>
                            <th>STCK</th>
                            <th>STNK</th>
                            <th>BPKB</th>
                            <th>Frame No.</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @forelse($data as $o)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ \Carbon\Carbon::parse($o->sale_date)->format('j M Y') }}</td>
                            <td>{{ $o->customer_name }}</td>
                            <td>{{ $o->model_name }}</td>
                            
                                @if($o->stck_status == "finished")
                                <td>
                                {{ $o->stck_status }}
                                </td>
                                @else
                                <td style="background-color:#eb343480">
                                {{ $o->stck_status }}
                                </td>
                                @endif
                            
                                @if($o->stnk_status == "finished")
                                <td>
                                {{ $o->stnk_status }}
                                </td>
                                @else
                                <td style="background-color:#eb343480">
                                {{ $o->stnk_status }}
                                </td>
                                @endif

                                @if($o->bpkb_status == "finished")
                                <td>
                                {{ $o->bpkb_status }}
                                </td>
                                @else
                                <td style="background-color:#eb343480">
                                {{ $o->bpkb_status }}
                                </td>
                                @endif

                            <td>{{ $o->frame_no }}</td>
                            {{-- <td>
                                <div class="form-button-action">
                                    <a href="{{ route('document.edit', $o->id) }}" class="btnAction"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fas fa-edit"></i></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </div>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" style="text-align: center;">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <form action="{{ url('/tracking') }}">
                    @csrf
                <button class="btn btn-success float-right border mt-2">Kembali</button>
            </div>
        </div>
    </div>
</div>