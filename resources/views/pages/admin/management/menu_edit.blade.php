@extends('layouts.panel')

@section('title', 'Admin - Perbarui Menu')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-button url="{{ route('admin.menu.index') }}" type="success" text="kembali" />
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Menu</h6>
            </div>
            <div class="card-body">
                <x-form.edit-menu id="{{$id}}"/>
            </div>
        </div>
    </div>
</div>
@endsection