@extends('dashboard.layouts.master')
@section('title', 'Categories')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories Page</h1>
                        <a class="btn btn-outline-primary mt-2" href="{{ route('categories.index') }}">back</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Categories Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <x-alert type="success" />
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">


                                        <input type="text" name="name" class="form-control float-right"
                                            placeholder="Search">
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>name</th>
                                            <th>parent</th>
                                            <th>status</th>
                                            <th>created_at</th>
                                            <th colspan="2">Operatoin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->parent_name }}</td>
                                                <td>{{ $category->status }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('categories.resotre',$category->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" class="btn btn-info">Restore</button>
                                                    </form>

                                                </td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('categories.force-delete', $category->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Category Defined</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
