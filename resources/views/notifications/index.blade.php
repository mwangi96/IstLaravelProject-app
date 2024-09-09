@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notifications</h1>

    @if($notifications->isEmpty())
        <p>You have no notifications.</p>
    @else
        <ul>
            @foreach ($notifications as $notification)
                {{-- Display for Super-Admin/Admin --}}
                @if (auth()->user()->hasRole(['super-admin', 'admin']) && !isset($notification->data['user_role']))
                    <li>
                        {{ $notification->data['message'] }}
                        <a href="{{ url('/applications/' . $notification->data['job_id']) }}">View Application</a>
                        <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}">
                            @csrf
                            <button type="submit">Mark as Read</button>
                        </form>
                    </li>
                @endif

                {{-- Display for Alumni --}}
                @if (auth()->user()->hasRole('alumni') && isset($notification->data['user_role']) && $notification->data['user_role'] == 'alumni')
                    <li>
                        {{ $notification->data['message'] }}
                        <a href="{{ url('/jobs/' . $notification->data['job_id']) }}">View Job</a>
                        <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}">
                            @csrf
                            <button type="submit">Mark as Read</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
</div>
@endsection
