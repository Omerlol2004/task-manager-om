<x-app-layout>
<x-slot name='header'>
<h2 class='font-semibold text-xl'>My Tasks</h2>
<a href='{{ route('tasks.create') }}' class='underline'>New Task</a>
</x-slot>
@if(session('success')) <div class='p-3 bg-green-100'>{{ session('success') }}</div> @endif
<form method='GET' class='p-4 flex gap-2 items-center'>
<input name='q' value='{{ $q }}' placeholder='Search...' class='border p-1' />
<select name='completed' class='border p-1'>
<option value='' @selected($completed===null)>All</option>
<option value='0' @selected($completed===0)>Pending</option>
<option value='1' @selected($completed===1)>Completed</option>
</select>
<select name='sort' class='border p-1'>
<option value='latest' @selected(($sort ?? '')==='latest')">Latest</option>
<option value='due_asc' @selected(($sort ?? '')==='due_asc')">Due ↑</option>
<option value='due_desc' @selected(($sort ?? '')==='due_desc')">Due ↓</option>
</select>
<button class='underline'>Apply</button>
</form>
<div class='p-4'>
@if($tasks->count() === 0)
<div class='p-3 bg-blue-100'>No tasks found.</div>
@else
<table class='w-full'>
<thead><tr><th>Name</th><th>Status</th><th>Due</th><th></th></tr></thead>
<tbody>
@foreach($tasks as $task)
<tr class='border-b'>
<td><a class='underline' href='{{ route('tasks.show',$task) }}'>{{ $task->name }}</a></td>
<td>{{ $task->completed ? 'Completed' : 'Pending' }}</td>
<td>{{ optional($task->due_date)->format('Y-m-d') }}</td>
<td>
<a class='underline mr-2' href='{{ route('tasks.edit',$task) }}'>Edit</a>
<form action='{{ route('tasks.destroy',$task) }}' method='POST' class='inline'>
@csrf @method('DELETE')
<button class='underline' onclick='return confirm("Delete?")'>Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
<div class='mt-4'>{{ $tasks->links() }}</div>
@endif
</div>
</x-app-layout>