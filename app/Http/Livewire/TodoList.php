<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public $name;
    public $search;
    public $user_id;

    public $editTodoID;
    public $editTodoName;

    // for todo suggestion
    public $currentIndex = 0;

    public function mount()
    {
        $this->user_id = Auth::id();

        $this->showCurrentSuggestion();
    }

    public function create()
    {
        $validated = $this->validate([
            'name' => 'required|min:3|max:50',
            'user_id' => 'required',
        ]);

        Todo::create($validated);

        $this->reset('name');

        session()->flash('success', 'Created');

        $this->resetPage();
    }

    public function edit($todoID)
    {
        try {
            $this->editTodoID = $todoID;
            $this->editTodoName = Todo::findOrfail($todoID)->name;
        } catch (Exception $e) {
            session()->flash('error', 'Failed to edit todo!');
            return;
        }
    }

    public function delete($todoID)
    {
        try {
            Todo::findOrfail($todoID)->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Failed to delete todo!');
            return;
        }
    }

    public function toggle(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function cancelEdit()
    {
        $this->reset('editTodoID', 'editTodoName');
    }

    public function update()
    {
        $this->validate([
            'editTodoName' => 'required|min:3|max:50',
        ]);

        Todo::find($this->editTodoID)->update([
            'name' => $this->editTodoName
        ]);

        $this->cancelEdit();
    }

    //todo suggestion part

    public $todoSuggestions = [
        'do laundry',
        'finish report',
        'study for test',
        'pick up items',
        'finish tutorial',
    ];

    public function showCurrentSuggestion()
    {
        $this->emit('displayOption', $this->todoSuggestions[$this->currentIndex]);

        $this->currentIndex = ($this->currentIndex + 1) % count($this->todoSuggestions);

        $this->dispatchBrowserEvent('setTimeout', ['callback' => 'displayNextOption', 'delay' => 60 * 60 * 1000,]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
    }

    public function render()
    {
        $auth = Auth::id();
        $todo_list = Todo::latest()->where('user_id', 'like', "%{$auth}%");
        $todos = $todo_list->latest()->where('name', 'like', "%{$this->search}%")->paginate(5);

        return view('livewire.todo-list', compact('todos'));
    }
}
