@extends('admin.layouts.app')

@section('content')

    <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
            <h2 class="me-2">{{ $user->name  }}</h2>
            <a href="{{ route('admin.user.edit', $user->id)  }}" type="button" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
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
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id  }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name  }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email  }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ App\Models\User::getRole()[$user->role]  }}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{ $user->created_at  }}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{ $user->updated_at  }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
