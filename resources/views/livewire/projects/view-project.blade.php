<div>
    <flux:heading size="xl" level="1">Projects</flux:heading>
    <flux:subheading size="lg" class="mb-6">View project details</flux:subheading>
    <flux:separator variant="subtle" class="mb-6" />

    <div class="mb-5">
        <flux:heading>ID</flux:heading>
        <flux:text class="mt-2">{{ $project->id }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Title</flux:heading>
        <flux:text class="mt-2">{{ $project->title }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Description</flux:heading>
        <flux:text class="mt-2">{{ $project->description }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Status</flux:heading>
        <flux:text class="mt-2">{{ $project->statusLabel() }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Created At</flux:heading>
        <flux:text class="mt-2">{{ $project->created_at?->format('d/m/Y h:i A') }}</flux:text>
    </div>

    <div class="mb-5">
        <flux:heading>Updated At</flux:heading>
        <flux:text class="mt-2">{{ $project->updated_at?->diffForHumans() }}</flux:text>
    </div>
</div>
