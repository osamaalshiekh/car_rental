@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                            <li class="breadcrumb-item active">Add Blog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add a New Blog</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control" rows="8" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="m_title">Meta Title</label>
                                    <input type="text" name="m_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="m_content">Meta Content</label>
                                    <input type="text" name="m_content" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keyword">Keywords</label>
                                    <input type="text" name="keyword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image">Featured Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <button type="submit" class="btn btn-primary">Create Blog</button>
                            </form>
                        </div>
                    </div>
@endsection
