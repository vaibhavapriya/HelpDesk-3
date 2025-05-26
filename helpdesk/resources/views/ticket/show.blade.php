@extends('components.layouts.app.client')
@section('content')
    <div class="container">
        <h1>Ticket Details</h1>
        <div class="mb-3">
            <strong>Title:</strong> {{ $ticket->title }}
        </div>
        <div class="mb-3">
            <strong>Description:</strong> {{ $ticket->description }}
        </div>
        <div class="mb-3">
            <strong>Priority:</strong> {{ ucfirst($ticket->priority) }}
        </div>
        <div class="mb-3">
            <strong>Status:</strong> {{ ucfirst($ticket->status) }}
        </div>
        <div class="mb-3">
            <strong>Department:</strong> {{ $ticket->department }}
        </div>
        <div class="mb-3">
            <strong>Requester:</strong> {{ $ticket->requester->name }}
        </div>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-12">
                <div class="blog-comment">
                    <h3 class="text-success">Comments</h3>
                    <hr/>
                    <ul class="comments">
                        @foreach($ticket->replies as $reply)
                            <li class="clearfix">
                                <!-- <img src="{{ $reply->user->avatar_url ?? 'https://bootdey.com/img/Content/user_1.jpg' }}" class="avatar" alt="User Avatar"> -->
                                <div class="post-comments">
                                    <p class="meta">
                                        {{ $reply->created_at->format('M d, Y') }}
                                        <a href="#">{{ $reply->user->name ?? 'Anonymous' }}</a> says :
                                        <i class="pull-right"><a href="#"><small>Reply</small></a></i>
                                    </p>
                                    <p>{{ $reply->reply }}</p>
                                </div>

                                {{-- Optional: If you have nested replies, you can recursively show them here --}}
                                @if($reply->children && $reply->children->count() > 0)
                                    <ul class="comments">
                                        @foreach($reply->children as $childReply)
                                            <li class="clearfix">
                                                <img src="{{ $childReply->user->avatar_url ?? 'https://bootdey.com/img/Content/user_2.jpg' }}" class="avatar" alt="User Avatar">
                                                <div class="post-comments">
                                                    <p class="meta">
                                                        {{ $childReply->created_at->format('M d, Y') }}
                                                        <a href="#">{{ $childReply->user->name ?? 'Anonymous' }}</a> says :
                                                        <i class="pull-right"><a href="#"><small>Reply</small></a></i>
                                                    </p>
                                                    <p>{{ $childReply->body }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection