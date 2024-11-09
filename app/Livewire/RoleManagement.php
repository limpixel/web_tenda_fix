<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManagement extends Component
{
    use WithPagination;

    public $name, $permissions = [], $role_id;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|unique:roles,name',
        'permissions' => 'required',
    ];

    public function render()
    {
        return view('livewire.role-management', [
            'roles' => Role::orderBy('id', 'DESC')->paginate(5),
            'allPermissions' => Permission::all(),
        ]);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->permissions = [];
        $this->role_id = null;
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate();

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permissions);

        session()->flash('success', 'Role created successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->permissions = $role->permissions->pluck('id')->toArray();
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->role_id,
            'permissions' => 'required',
        ]);

        $role = Role::find($this->role_id);
        $role->name = $this->name;
        $role->save();
        $role->syncPermissions($this->permissions);

        session()->flash('success', 'Role updated successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('success', 'Role deleted successfully.');
    }
}
