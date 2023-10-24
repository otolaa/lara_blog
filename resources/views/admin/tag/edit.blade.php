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
                    <form method="POST" action="{{ route('admin.tag.update', $tag->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputTitle1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputTitle1"
                                       value="{{ $tag->title  }}"
                                       placeholder="title">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
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
