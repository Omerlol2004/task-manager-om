<x-app-layout>
<x-slot name='header'><h2 class='font-semibold text-xl'>New Task</h2></x-slot>
<div class='p-4'>
<form method='POST' action='{{ route('tasks.store') }}'>
@csrf
<div class='mb-3'>
<label>Name</label>
<input name='name' class='border w-full' required />
@error('name') <div class='text-red-600'>{{ $message }}</div> @enderror
</div>
<div class='mb-3'><label>Description</label><textarea name='description' class='border w-full'></textarea></div>
<div class='mb-3'>
<label><input type='checkbox' name='completed' value='1'> Mark as completed</label>
</div>
<div class='mb-3'><label>Due date</label><input type='date' name='due_date' class='border' /></div>
<button class='underline'>Create</button>
</form>
</div>
</x-app-layout>