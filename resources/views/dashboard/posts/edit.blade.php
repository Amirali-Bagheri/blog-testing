<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container" style="direction: rtl;">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card shadow-sm sm:rounded-lg">
                            <div class="card-header">
                                <h5>
                                    ویرایش پست {{$post->title}}
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('dashboard.posts.update',$post->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">عنوان</label>
                                                <input type="text" class="form-control" name="title"
                                                       value="{{ old('title',$post->title) }}" id="title" placeholder="عنوان">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">عنوان نمایشی</label>
                                                <input type="text" class="form-control" value="{{ old('slug',$post->slug) }}"
                                                       name="slug" id="slug" placeholder="عنوان نمایشی">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">
                                            متن
                                        </label>
                                        <textarea class="form-control" name="content" id="content"
                                                  rows="4">{{ old('content',$post->content) }}</textarea>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <a href="{{route('dashboard.posts.destroy',$post->id)}}" class="btn btn-danger btn-lg p-2">
                                        حذف
                                    </a>
                                    <button type="submit" class="btn btn-success btn-lg p-2">
                                        ذخیره
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
