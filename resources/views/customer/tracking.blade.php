@extends('layouts.customer')

@section('title','Tracking')
@section('page-title','Tracking')
@section('content')
<div class="d-flex justify-content-center align-items-center "style="height: 92vh;" id="dataCreate">
    <div class="card">
        <div class="card-header">
            <span id="color_code" style="
                width: 10px; height: 50%; 
                display: inline-block;
                position: absolute;
                left: 0px;
                top: 0px;">
            </span>
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title text-center">Tracking Dokumen Kendaraan</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('datatracking') }}">
                @csrf
                    <div class="justify-content-center">
                        <div class="form-group form-floating-label">
                            <input  type="text" class="form-control input-border-bottom" name="frame_no">
                            <label for="frame_no" class="placeholder">Input Nomor Frame Kendaraan</label>
                        </div>
                    </div>
            <button class="btn btn-success float-right border mt-2"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
        </form>
        </div>
    </div>
</div>
            