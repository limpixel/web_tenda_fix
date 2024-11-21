@extends('layouts.dashboard-layout-v2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="box">
                <div class="box-header with-border mb-4">
                    <h3 class="box-title">Add New Contact</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('dashboard.contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_wa">WhatsApp Number</label>
                            <input placeholder="ex : 811223344" type="text" name="nomor_wa" id="nomor_wa" 
                                   class="form-control @error('nomor_wa') is-invalid @enderror" 
                                   value="{{ old('nomor_wa') }}">
                            @error('nomor_wa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gmail">Email</label>
                            <input type="text" name="gmail" id="gmail" 
                                   class="form-control @error('gmail') is-invalid @enderror" 
                                   value="{{ old('gmail') }}">
                            @error('gmail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('dashboard.contact.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
