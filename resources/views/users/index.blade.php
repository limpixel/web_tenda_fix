@extends('layouts.dashboard-layout-v2')


@section('content')
<div class="row mb-4">
  <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center margin-tb">
    <div class="pull-left">
      <h2>Users Management</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('dashboard.users.create') }}"> Create New User</a>
    </div>
  </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  {{ $message }}
</div>
@endif


<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Roles</th>
    <th width="280px">Action</th>
  </tr>
  @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
      @foreach($user->getRoleNames() as $v)
      <label class="badge bg-success">{{ $v }}</label>
      @endforeach
      @endif
    </td>
    <td>
      <a class="btn btn-info" href="{{ route('dashboard.users.show',$user->id) }}">Show</a>
      <a class="btn btn-primary" href="{{ route('dashboard.users.edit',$user->id) }}">Edit</a>
      {!! Form::open(['method' => 'DELETE','route' => ['dashboard.users.destroy', $user->id],'style'=>'display:inline'])
      !!}
      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection