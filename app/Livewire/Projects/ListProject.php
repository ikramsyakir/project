<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListProject extends Component
{
    use WithPagination;

    public function destroy(string $id): void
    {
        $project = Project::findOrFail($id);

        $project->delete();

        session()->flash('message', 'Project deleted successfully');
    }

    public function render(): View
    {
        $projects = Project::latest()->paginate(10);

        return view('livewire.projects.list-project', [
            'projects' => $projects,
        ]);
    }
}
