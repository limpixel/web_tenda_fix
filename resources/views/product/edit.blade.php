{{-- resources/views/dashboard/products/edit.blade.php --}}
@extends('layouts.dashboard-layout-v2')

@section('head')
    Edit Product
@endsection

@section('content')
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_product" class="form-label">Product Name</label>
            <input type="text" name="name_product" class="form-control" value="{{ $product->name_product }}" required>
        </div>

        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <input type="text" name="ukuran" class="form-control" value="{{ $product->ukuran }}" required>
        </div>

        <div class="mb-3">
            <label for="masa_waktu" class="form-label">Masa Waktu</label>
            <input type="text" name="masa_waktu" class="form-control" value="{{ $product->masa_waktu }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $product->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="number" name="satuan" class="form-control" value="{{ $product->satuan }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" name="tipe" class="form-control" value="{{ $product->tipe }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image)
                <div class="mt-2">
                    <img src="{{ asset('images/products/' . $product->image) }}" width="150" alt="Current Image">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
