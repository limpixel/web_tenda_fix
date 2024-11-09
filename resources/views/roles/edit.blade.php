@extends('layouts.dashboard-layout-v2')

@section('head')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Include Select2 and custom dark mode CSS -->
<style>
    /* General dark mode for Select2 dropdowns */
    .select2-dark .select2-selection {
        background-color: #333 !important;
        /* Dark background */
        color: #ddd !important;
        /* Light text */
        border: 1px solid #555 !important;
    }

    .select2-dark .select2-dropdown {
        background-color: #333 !important;
        color: #ddd !important;
    }

    .select2-dark .select2-results__option--highlighted[aria-selected] {
        background-color: #555 !important;
        /* Highlight color */
        color: #fff !important;
    }
</style>

@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
        <div class="card-tools">
            <a class="btn btn-primary" href="{{ route('dashboard.roles.index') }}"> Back</a>
        </div>
    </div>

    <div class="card-body">
        <!-- Display validation errors -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::model($role, ['method' => 'PATCH','route' => ['dashboard.roles.update', $role->id]]) !!}
        <div class="column">
            <!-- Role Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>Role Name:</strong></label>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>

            <!-- Permissions -->
            <div id="permissions-container" class="checkbox-container d-flex flex-column">
                @foreach($permission as $value)
                    <label>
                        <input
                            type="checkbox"
                            name="permission[]"
                            value="{{ $value->id }}"
                            {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}
                            onclick="toggleCheckbox(this)"
                        >
                        {{ $value->name }}
                    </label>
                @endforeach
            </div>

            <div class="column">
                <div class="col-md-12 text-start">
                    <button type="submit" class="btn col-6 h-4  btn-primary">Submit</button>
                </div>
            </div>
        </div>

       
        {!! Form::close() !!}
    </div>

    <div class="card-footer">
        <small>Manage role permissions carefully to control access rights within the application.</small>
    </div>
</div>
@endsection

@section('script')

<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2 with dark mode theme
        $('.select2').select2({
            theme: 'default'
        });

        // Event listener for selection (disables selected items)
        $('#permissions').on('select2:select', function (e) {
            var selectedId = e.params.data.id;
            // Disable selected option in dropdown
            $('#permissions option[value="' + selectedId + '"]').prop('disabled', true);
            $('#permissions').select2(); // Refresh Select2 to show changes
        });

        // Event listener for deselection (enables unselected items)
        $('#permissions').on('select2:unselect', function (e) {
            var unselectedId = e.params.data.id;
            // Enable unselected option in dropdown
            $('#permissions option[value="' + unselectedId + '"]').prop('disabled', false);
            $('#permissions').select2(); // Refresh Select2 to show changes
        });
    });
</script>
@endsection