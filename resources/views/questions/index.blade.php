@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>
                                All Questions
                            </h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @include('layouts._messages')

                       @foreach($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes  }} </strong>{{Str::plural('vote',$question->votes)}}
                                </div>
                                <div class="status {{$question->status}}">
                                    <strong>{{ $question->answers_count  }} </strong>{{Str::plural('answer',$question->votes)}}
                                </div>
                                <div class="view">
                                    {{ $question->views  . " " .Str::plural('view',$question->votes)}}
                                </div>
                            </div>
                            <div class="media-body">

                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a> </h3>
                                    <div class="ml-auto">

                                    {{-- @if(Auth::user()) --}}

                                        @can('update',$question)
                                            <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan

                                        @can('delete',$question)
                                            <form class="form-delete" method="post" action="{{route('questions.destroy',$question->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>

                                            </form>

                                        @endcan

                                    {{-- @endif --}}
{{--                                        <form method="post" action="{{route('questions.destroy',$question->id)}}">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')>Delete</button>--}}
{{--                                        </form>--}}
                                    </div>

                                </div>
                                <p class="lead">
                                    Asked by
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{  Str::limit($question->body,50)  }}
                            </div>
                        </div>
                           <hr/>
                       @endforeach
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
