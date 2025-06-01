{{-- resources/views/dashboard/products/create.blade.php --}}
@extends('layouts.dashboard-layout-v2')

@section('head')
    Create Product
@endsection

@section('content')
<div class="container mt-5">
    <h2>Create New Product</h2>
    <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name_product" class="form-label">Product Name</label>
            <input type="text" name="name_product" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <input type="text" name="ukuran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="masa_waktu" class="form-label">Masa Waktu</label>
            <input type="text" name="masa_waktu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="number" name="satuan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" name="tipe" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection