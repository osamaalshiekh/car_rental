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
                            <li class="breadcrumb-item"><a href="#">FAQS</a></li>
                            <li class="breadcrumb-item active">Add FAQ</li>
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
                                <h3 class="card-title">Add a New FAQ</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.faq.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="question">question</label>
                                    <input type="text" name="question" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="answer">answer</label>
                                    <textarea name="answer" class="form-control" rows="8" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Create FAQ</button>
                            </form>
                        </div>
                    </div>
@endsection
