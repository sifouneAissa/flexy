<div>
    @foreach($activities as $activity)
        <p class="text-secondary">{{$all ? $activity->subject?->name : ""}} {{$activity->description}} in {{translateDate($activity->created_at)}} by {{$activity->causer->id === auth()->user()->id ? 'you' : $activity->causer->name}}.</p>
    @endforeach
</div>
