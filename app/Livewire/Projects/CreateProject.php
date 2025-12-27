<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class CreateProject extends Component
{
    public string $title = '';

    public string $description = '';

    public string $status = '';

    public array $statuses = [];

    public function mount(): void
    {
        $this->statuses = Project::statusOptions();
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', Rule::in(Project::statuses())],
        ];
    }

    public function store(): void
    {
        $validated = $this->validate();

        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        session()->flash('message', 'Project created successfully');

        $this->redirectRoute('projects.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.projects.create-project');
    }
}
