@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">User</h2>
    <p class="dashboard-subtitle">
      Edit User
    </p>
  </div>
  <div class="dashboard-content">
    <div class="row">
        <div class="col-md-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ $item->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" class="form-control" value="{{ $item->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="" class="form-control">
                                    <small>Empty this section if don't want change password</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Roles</label>
                                    <select name="roles" id="" required class="form-control">
                                        <option value="ADMIN" {{ ($item->roles === 'ADMIN') ? 'selected': '' }}>Admin</option>
                                        <option value="USER" {{ ($item->roles === 'USER') ? 'selected': '' }}>User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success px-5">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection