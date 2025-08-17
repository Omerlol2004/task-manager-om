<x-app-layout>
<x-slot name='header'><h2 class='font-semibold text-xl'>{{ $task->name }}</h2></x-slot>
<div class='p-4'>
<p class='mb-2'>{{ $task->description }}</p>
<p>Status: {{ $task->completed ? 'Completed' : 'Pending' }} | Due: {{ optional($task->due_date)->format('Y-m-d') }}</p>
<a class='underline' href='{{ route('tasks.edit',$task) }}'>Edit</a>
</div>
</x-app-layout>