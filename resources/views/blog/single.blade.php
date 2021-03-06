@extends('blog.layouts.master')

@section('content')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="p-2" style="direction: rtl; margin: 20px;">
            <div class="flex items-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    <a href="{{ route('blog.single',$post->slug) }}" class="underline text-gray-900 dark:text-white">
                        {{$post->title}}
                    </a>
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    {!! $post->content !!}
                </div>
            </div>
        </div>

    </div>
@endsection
