@extends('admin.layouts.main')

@section('meta')
    <title>Админ - Тэги</title>
@endsection

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
            <h2 class="me-2">Tag</h2>
            <a href="{{ route('admin.tag.create') }}" type="button" class="btn btn-sm btn-success"><i class="bi bi-plus-lg"></i></a>
        </div><!-- /.col -->
        <div class="col-sm-6 d-flex align-items-center">
            <nav aria-label="breadcrumb" style="margin-left: auto;">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
            </nav>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->title }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td>{{ $tag->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.tag.show', $tag->id)  }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.tag.edit', $tag->id)  }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.tag.delete', $tag->id)  }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
