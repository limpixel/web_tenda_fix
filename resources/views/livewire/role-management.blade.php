@extends('layouts.dashboard-layout-v2')

@section('content')
<div>
    <h2>Role Management</h2>

    <!-- Display Success Message -->
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Role Form -->
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <input type="text" wire:model="name" placeholder="Role Name">
        @error('name') <span>{{ $message }}</span> @enderror

        <label for="permissions">Permissions</label>
        @foreach($allPermissions as $permission)
            <div>
                <input type="checkbox" wire:model="permissions" value="{{ $permission->id }}">
                <span>{{ $permission->name }}</span>
            </div>
        @endforeach
        @error('permissions') <span>{{ $message }}</span> @enderror

        <button type="submit">{{ $updateMode ? 'Update Role' : 'Create Role' }}</button>
        @if ($updateMode)
            <button type="button" wire:click="resetInputFields">Cancel</button>
        @endif
    </form>

    <!-- Role List Table -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                    <td>
                        <button wire:click="edit({{ $role->id }})">Edit</button>
                        <button wire:click="delete({{ $role->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $roles->links() }}
</div>

@endsection