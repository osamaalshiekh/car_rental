@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fixed Layout</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Layout</a></li>
                            <li class="breadcrumb-item active">Fixed Layout</li>
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
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>content</th>
                                    <th>m_title</th>
                                    <th>m_content</th>
                                    <th>keyword</th>
                                    <th>image</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($blog as $rs)
                                    <tr>
                                        <td>{{ $rs->id }}</td>
                                        <td>{{ $rs->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($rs->content, 20) }}</td>
                                        <td>{{ $rs->m_title }}</td>
                                        <td>{{ $rs->m_content }}</td>
                                        <td>{{ $rs->keyword }}</td>
                                        <td>     @if ($rs->image)
                                                <img src="{{ Storage::url($rs->image) }}" style="height: 40px">
                                            @endif                                       </td>
                                        <td>
                                            <a href={{route('admin.blog.edit',['id'=>$rs->id ])}} class="btn btn-success"
                                            >Edit</a>
                                            <a href={{route('admin.blog.destroy',['id'=>$rs->id ])}} class="btn
                                               btn-danger" >Delete </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="col-3 align-items-center">
                                <a href="{{ route('admin.blog.create') }}"
                                   class="btn btn-block btn-outline-danger btn-sm">Add Blog</a>
                            </div>

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
