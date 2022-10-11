<div>
    @if($showModal)
        <div class="modal fade show show-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" wire:submit.prevent="submit">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Send Test Message</h5>
                            <button type="button" class="btn-close" wire:click="$emitTo('mail-template.send-mail-template', 'closeCreateModal')"></button>
                        </div>
                        <div class="modal-body">

                            @if (session()->has('success'))

                                <div class="alert alert-success">

                                    {{ session('success') }}

                                </div>

                            @endif

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="variable_value" wire:model.lazy="email" required />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="$emitTo('mail-template.send-mail-template', 'closeCreateModal')">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>