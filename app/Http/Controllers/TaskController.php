<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
public function __construct(){ $this->middleware('auth'); }
public function index(Request $request){
$q = $request->string('q');
$completed = $request->has('completed') && $request->completed !== '' ? (int)$request->completed : null; // null|0|1
$sort = $request->string('sort','latest'); // latest|due_asc|due_desc
$tasks = Task::where('user_id', auth()->id())
->when($q, fn($qr)=>$qr->where(function($w) use ($q){
$w->where('name','like',"%{$q}%")
->orWhere('description','like',"%{$q}%");
}))
->when($completed !== null, fn($qr)=>$qr->where('completed', $completed))
->when($sort==='due_asc', fn($qr)=>$qr->orderBy('due_date','asc'))
->when($sort==='due_desc', fn($qr)=>$qr->orderBy('due_date','desc'))
->when($sort==='latest', fn($qr)=>$qr->latest())
->paginate(10)->withQueryString();
return view('tasks.index', compact('tasks','q','completed','sort'));
}
public function create(){ return view('tasks.create'); }
public function store(Request $request){
$data = $request->validate([
'name' => 'required|max:255',
'description' => 'nullable|string',
'completed' => 'nullable|boolean',
'due_date' => 'nullable|date|after_or_equal:today',
]);
$data['completed'] = $request->boolean('completed');
$data['user_id'] = auth()->id();
Task::create($data);
return redirect()->route('tasks.index')->with('success','Task created.');
}
public function show(Task $task){ $this->authorize('view', $task); return view('tasks.show', compact('task')); }
public function edit(Task $task){ $this->authorize('update', $task); return view('tasks.edit', compact('task')); }
public function update(Request $request, Task $task){
$this->authorize('update', $task);
$data = $request->validate([
'name' => 'required|max:255',
'description' => 'nullable|string',
'completed' => 'nullable|boolean',
'due_date' => 'nullable|date|after_or_equal:today',
]);
$data['completed'] = $request->boolean('completed');
$task->update($data);
return redirect()->route('tasks.index')->with('success','Task updated.');
}
public function destroy(Task $task){
$this->authorize('delete', $task);
$task->delete();
return redirect()->route('tasks.index')->with('success','Task deleted.');
}
}
