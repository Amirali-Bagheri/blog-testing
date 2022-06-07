@extends('blog.layouts.master')

@section('content')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        @foreach($posts as $post)
            <div class="p-6" style="direction: rtl;">
                <div class="flex items-center">
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <a href="{{ route('blog.single',$post->slug) }}" class="underline text-gray-900 dark:text-white">
                            {{$post->title}}
                        </a>
                    </div>
                    <div style="margin-right: auto; color: #fff; font-size: 12px;">
                        توسط: {{$post->user->name}}
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
