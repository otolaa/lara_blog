@extends('admin.layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
            <h2 class="me-2">Category</h2>
            <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-success"><i class="bi bi-plus-lg"></i></a>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.show', $category->id)  }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.edit', $category->id)  }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.categories.delete', $category->id)  }}" method="POST" class="d-inline-block">
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
