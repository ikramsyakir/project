<div>
    <flux:heading size="xl" level="1">Projects</flux:heading>
    <flux:subheading size="lg" class="mb-6">Create a new project</flux:subheading>
    <flux:separator variant="subtle" class="mb-6" />

    <form wire:submit.prevent="store" class="space-y-6" autocomplete="off">
        <flux:input id="title" wire:model="title" label="Title" type="text" />

        <flux:textarea id="description" wire:model="description" label="Description" />

        <flux:select id="status" wire:model="status" placeholder="Choose status..." label="Status">
            @foreach ($statuses as $value => $label)
                <flux:select.option value="{{ $value }}">{{ $label }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
