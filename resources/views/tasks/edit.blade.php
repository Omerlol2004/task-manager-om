<x-app-layout>
<x-slot name='header'><h2 class='font-semibold text-xl'>Edit Task</h2></x-slot>
<div class='p-4'>
<form method='POST' action='{{ route('tasks.update',$task) }}'>
@csrf @method('PUT')
<div class='mb-3'><label>Name</label><input name='name' class='border w-full' value='{{ old('name',$task->name) }}' required /></div>
<div class='mb-3'><label>Description</label><textarea name='description' class='border w-full'>{{ old('description',$task->description) }}</textarea></div>
<div class='mb-3'>
<label><input type='checkbox' name='completed' value='1' @checked($task->completed)> Mark as completed</label>
</div>
<div class='mb-3'><label>Due date</label><input type='date' name='due_date' class='border' value='{{ optional($task->due_date)->format('Y-m-d') }}' /></div>
<button class='underline'>Save</button>
</form>
</div>
</x-app-layout>