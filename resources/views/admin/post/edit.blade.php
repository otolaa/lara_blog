@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputTitle1"
                                           value="{{ $post->title  }}"
                                           placeholder="title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Content</label>
                                    <textarea class="form-control" name="content" rows="3">{{ $post->content  }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile0">Добавление превью</label>
                                    @if($post->preview_image)
                                    <div class="w-25 mb-2">
                                        <img src="{{ url('storage/'.$post->preview_image)  }}" class="img-fluid">
                                    </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile0">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузите</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile1">Добавление изображения</label>
                                    @if($post->main_image)
                                        <div class="w-25 mb-2">
                                            <img src="{{ url('storage/'.$post->main_image)  }}" class="img-fluid">
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile1">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузите</span>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $post->category_id ? ' selected':'' }}
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Тэги</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Тэги" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected':'' }}
                                            >{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
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
</div>
<!-- /.content-wrapper -->
@endsection
