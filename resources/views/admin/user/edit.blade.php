@extends('admin.layouts.app')

@section('content')

    @include('admin.parts.content-header', ['page_title' => 'Редактирование'])

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputTitle1"
                                           value="{{ $user->name  }}"
                                           placeholder="">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           value="{{ $user->email }}"
                                           placeholder="Email">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPass">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPass"
                                           placeholder="Password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        @foreach($roles as $k=>$role)
                                            <option value="{{ $k }}"
                                                {{ $k == (int) $user->role ? ' selected':'' }}
                                            >{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
