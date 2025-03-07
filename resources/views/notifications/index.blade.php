@extends('layouts.app') <!-- Adjust according to your layout -->

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">All Notifications</h1>

        @if($notifications->isEmpty())
            <p>No notifications found.</p>
        @else
            <div class="bg-white shadow-md rounded-lg">
                <ul class="divide-y divide-gray-200">
                    @foreach($notifications as $notification)
                        <li class="p-4">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="font-semibold">{{ $notification->data['message'] }}</span>
                                    <span class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                    <!-- this for see the time that notifacation has being sended -->
                                </div>
                                <div>
                                    @if(!$notification->read_at)
                                        <span class="text-xs text-red-500">Unread</span>
                                    @else
                                        <span class="text-xs text-green-500">Read</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
