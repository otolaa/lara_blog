@extends('admin.layouts.app')

@section('content')

@include('admin.parts.content-header', ['page_title' => $post->title])

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $post->id  }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $post->title  }}</td>
                            </tr>
                            <tr>
                                <th>Content</th>
                                <td>{{ $post->content  }}</td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>{{ $post->created_at  }}</td>
                            </tr>
                            <tr>
                                <th>Updated</th>
                                <td>{{ $post->updated_at  }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
