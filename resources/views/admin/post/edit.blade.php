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
@endsection

@push('styles')
    <style>
        .custom-file-input:lang(en)~.custom-file-label::after{ content: '...'; }
    </style>
@endpush

@push('scripts')
    <script src="/vendor/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="/vendor/adminlte/plugins/select2/js/select2.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
            bsCustomFileInput.init();
        });
    </script>
    <script src="/vendor/adminlte/dist/js/pages/dashboard.js"></script>
@endpush
