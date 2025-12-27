<div>
    @if (session()->has('message'))
        <flux:callout class="mb-6" variant="success" icon="check-circle" heading="{{ session('message') }}" />
    @endif

    <flux:heading size="xl" level="1">Projects</flux:heading>
    <flux:subheading size="lg" class="mb-6">Manage your projects information</flux:subheading>
    <flux:separator variant="subtle" class="mb-6" />

    <flux:button href="{{ route('projects.create') }}" variant="primary" icon="plus" wire:navigate>
        Add Project
    </flux:button>

    <div class="overflow-x-auto mt-6">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden border border-zinc-200 dark:border-zinc-600 rounded-lg">
                <table class="min-w-full table-fixed text-zinc-800 dark:text-white whitespace-nowrap">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-3 text-start text-sm font-medium text-zinc-900 dark:text-white bg-zinc-50 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-600">
                                No
                            </th>
                            <th
                                class="py-3 px-3 text-start text-sm font-medium text-zinc-900 dark:text-white bg-zinc-50 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-600">
                                Title
                            </th>
                            <th
                                class="py-3 px-3 text-start text-sm font-medium text-zinc-900 dark:text-white bg-zinc-50 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-600">
                                Status
                            </th>
                            <th
                                class="py-3 px-3 text-start text-sm font-medium text-zinc-900 dark:text-white bg-zinc-50 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-600">
                                Created At
                            </th>
                            <th
                                class="py-3 px-3 text-start text-sm font-medium text-zinc-900 dark:text-white bg-zinc-50 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-600">
                                Updated At
                            </th>
                            <th
                                class="py-3 px-3 text-center text-sm font-medium text-zinc-900 dark:text-white bg-zinc-50 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-600">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/10 dark:divide-white/10">
                        @forelse($projects as $project)
                            <tr wire:key="project-{{ $project->id }}">
                                <td class="py-3 px-3 text-sm">
                                    {{ $loop->iteration + ($projects->currentPage() - 1) * $projects->perPage() }}
                                </td>
                                <td class="py-3 px-3 text-sm">
                                    {{ $project->title }}
                                </td>
                                <td class="py-3 px-3 text-sm">
                                    {{ $project->statusLabel() }}
                                </td>
                                <td class="py-3 px-3 text-sm">
                                    {{ $project->created_at?->format('d/m/Y h:i A') }}
                                </td>
                                <td class="py-3 px-3 text-sm">
                                    {{ $project->updated_at?->diffForHumans() }}
                                </td>
                                <td class="py-3 px-3 text-sm text-center">
                                    <flux:dropdown>
                                        <flux:button size="sm" icon="ellipsis-horizontal" />

                                        <flux:menu>
                                            <flux:menu.item href="{{ route('projects.show', $project->id) }}"
                                                icon="eye" wire:navigate>
                                                View
                                            </flux:menu.item>
                                            <flux:menu.item href="{{ route('projects.edit', $project->id) }}"
                                                icon="pencil" wire:navigate>
                                                Edit
                                            </flux:menu.item>
                                            <flux:menu.separator />
                                            <flux:menu.item icon="trash" variant="danger"
                                                wire:click="destroy({{ $project->id }})"
                                                wire:confirm="Are you sure you want to delete this project?">
                                                Delete
                                            </flux:menu.item>
                                        </flux:menu>
                                    </flux:dropdown>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"
                                    class="py-4 px-3 text-sm text-center text-zinc-500 dark:text-zinc-300">
                                    No projects found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
