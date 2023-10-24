@extends('admin.layouts.app')

@section('content')

    @include('admin.parts.content-header', ['page_title' => $user->name])

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
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
        </div>
    </div>
</section>

@endsection
