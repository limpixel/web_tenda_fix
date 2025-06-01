@extends('layouts.dashboard-layout-v2')

@section('head')
    Product Dashboard
@endsection

@section('content')
<div id="app">
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row mb-4">
                    <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center margin-tb">
                        <div class="pull-left">
                            <h2>Product Dashboard</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('dashboard.product.create') }}">Create New Product</a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Product Table</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Ukuran</th>
                                        <th>Masa Waktu</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th>Tipe</th>
                                        <th>Image</th>
                                        <th width="180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name_product }}</td>
                                            <td>{{ $product->ukuran }}</td>
                                            <td>{{ $product->masa_waktu }}</td>
                                            <td>{{ $product->harga }}</td>
                                            <td>{{ $product->satuan }}</td>
                                            <td>{{ $product->tipe }}</td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('images/products/' . $product->image) }}" width="100" alt="Product Image">
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('dashboard.product.edit', $product->id) }}">Edit</a>
                                                <form action="{{ route('dashboard.product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection