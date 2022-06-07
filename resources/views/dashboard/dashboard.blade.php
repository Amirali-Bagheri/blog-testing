<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card shadow-sm sm:rounded-lg">
                            <div class="card-header">
                                <h5>Users</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @foreach(\App\Models\User::latest()->get() as $user)
                                        <li class="list-group-item">
                                            {{$user->name}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="card shadow-sm sm:rounded-lg">
                            <div class="card-header">
                                <h5>Posts</h5>
                            </div>
                            <div class="card-body">
                                @foreach(\App\Models\Post::latest()->get() as $post)
                                    <li class="list-group-item">
                                        {{$post->title}}
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
