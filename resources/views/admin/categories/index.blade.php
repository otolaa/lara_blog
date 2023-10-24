@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Category', 'url_create'=>route('admin.categories.create')])
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
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
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.show', $category->id)  }}"><i class="far fa-eye"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.edit', $category->id)  }}"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.categories.delete', $category->id)  }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    </div>
</section>
@endsection
