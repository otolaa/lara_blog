@extends('admin.layouts.main')

@section('meta')
    <title>Админ - Категории</title>
@endsection

@section('content')

    <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
            <h2 class="me-2">Users</h2>
            <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-sm btn-success"><i class="bi bi-plus-lg"></i></a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ App\Models\User::getRole()[$user->role]  }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.user.show', $user->id)  }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.user.edit', $user->id)  }}"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.user.delete', $user->id)  }}" method="POST" class="d-inline-block">
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
            {{ $users->links()  }}
        </div>
        <!-- ./col -->
    </div>

@endsection
