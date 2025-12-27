<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class EditProject extends Component
{
    public Project $project;

    public string $title = '';

    public string $description = '';

    public string $status = '';

    public array $statuses = [];

    public function mount($id): void
    {
        $this->project = Project::findOrFail($id);
        $this->title = $this->project->title;
        $this->description = $this->project->description;
        $this->status = $this->project->status;

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

    public function update(): void
    {
        $this->validate();

        $this->project->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Project updated successfully');

        $this->redirectRoute('projects.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.projects.edit-project');
    }
}
