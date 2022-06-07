<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">

                @if (session()->has('success'))
                    <div class="alert alert-success" style="direction: rtl;">
                      <span>{{ session()->get('success') }}</span>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card shadow-sm sm:rounded-lg">
                            <div class="card-header"  style="direction: rtl; display: flex;">
                                <h5>پست ها</h5>
                                <a style="margin-right: auto;" href="{{route('dashboard.posts.create')}}">
                                    پست  جدید
                                </a>
                            </div>
                            <div class="card-body sm:text-right" style="direction: rtl">
                                @foreach($posts as $post)
                                    <li class="list-group-item">
                                        {{$post->title}}
                                        <a href="{{route('dashboard.posts.edit',$post->id) }}">
                                            <span style="float: left; font-size: 12px;">ویرایش</span>
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
