@extends('layouts.panel')

@section('title', 'Admin - Kategori')

@push('styles')
<link href="/panel/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <x-button url="{{ route('admin.kategori.create') }}" type="primary" text="tambah data" />
        <x-table.category-list /> 
    </div>
</div>
@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="/panel/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/panel/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
  });
</script>
@endpush
