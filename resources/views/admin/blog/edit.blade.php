@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
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
                                <h3 class="card-title">Edit Blog</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.blog.update',['id'=>$blog->id ])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="bcontent">content</label>
                                        <input type="text" class="form-control" id="bcontent" name="bcontent" value="{{ old('content', $blog->bcontent) }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="m_title">m_title</label>
                                        <input type="text" class="form-control" id="m_title" name="m_title" value="{{ old('m_title', $blog->m_title) }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="m_content">m_content</label>
                                        <input type="text" class="form-control" id="m_content" name="m_content" value="{{ old('m_content', $blog->m_content) }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="keyword">keyword</label>
                                        <input type="text" class="form-control" id="keyword" name="keyword" value="{{ old('keyword', $blog->keyword) }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="image">blog Image</label>
                                        <input type="file" name="image" id="image" value="{{ old('image', $blog->image) }}">
                                    </div>


                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
