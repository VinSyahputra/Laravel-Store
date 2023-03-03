@extends('layouts.admin')
@section('title')
    Edit Product
@endsection
@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Product</h2>
    <p class="dashboard-subtitle">
      Edit Product
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
                    <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="{{ $item->name }}" required>
                                    @error('name')
                                        <small>{{ $error }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Owner</label>
                                    <select name="users_id" id="" class="form-control" value="{{ $item->id }}">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ ($item->user->id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
                                        <small>{{ $error }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="categories_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ ($item->category->id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories_id')
                                        <small>{{ $error }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" name="price" id="" class="form-control" value="{{ $item->price }}" required>
                                    @error('price')
                                        <small>{{ $error }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="editor">{!! $item->description !!}</textarea>
                                    @error('editor')
                                        <small>{{ $error }}</small>
                                    @enderror
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
@push('addon-script')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endpush