<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Illuminate\View\View;
use Livewire\Component;

class ViewProject extends Component
{
    public Project $project;

    public function mount($id): void
    {
        $this->project = Project::findOrFail($id);
    }

    public function render(): View
    {
        return view('livewire.projects.view-project');
    }
}
