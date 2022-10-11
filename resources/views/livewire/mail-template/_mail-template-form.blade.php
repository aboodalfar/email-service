@if (session()->has('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<form method="post" wire:submit.prevent="submit">

    @csrf

    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control @error('title') is-invalid @endif" name="title" wire:model.lazy="title" />
        @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label>Template Key</label>
        <input type="text" class="form-control @error('templateKey') is-invalid @endif" name="template_key" wire:model.lazy="templateKey" />
        @error('templateKey') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control @error('subject') is-invalid @endif" name="subject" wire:model.lazy="subject" />
        @error('subject') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" wire:ignore>
        <label>Email Content</label>

        @include('partials.mail-variables')

        <textarea class="form-control" name="body" id="editor">{!! $body !!}</textarea>

        @error('body') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>

    <div class="d-grid gap-2 mt-2">
        <input type="submit" class="btn btn-primary" value="{{ isset($itemId) ? 'Update' : 'Create' }}" />
    </div>

</form>
