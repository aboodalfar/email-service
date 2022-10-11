<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Mail Templates</div>


                <div class="card-body">

                    @if (session()->has('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    <a class="btn btn-secondary create-btn" style="float: right" href="{{url('mail-template/create')}}"><i class="fa fa-plus"></i> Create</a>
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Template Key</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($allTemplates as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->subject}}</td>
                                <td>{{$item->template_key}}</td>
                                <td>
                                    <a href="{{url('mail-template/edit/' . $item->id)}}" class="btn btn-sm btn-outline-info btn-edit"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('mail-template/preview/' . $item->id)}}" target="_blank" class="btn btn-sm btn-outline-success"><i class="fa fa-camera"></i> Preview</a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-dark" wire:click="$emitTo('mail-template.send-mail-template','showSendModal', {{$item->id}})"><i class="fa fa-envelope"></i> Test Send</button>
                                </td>
                                <td>
                                    <form method="post" action="#" wire:submit.prevent="deleteTemplate({{$item->id}})">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('are you sure?')"><i class="fa fa-remove"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No mail templates</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $allTemplates->links() }}

                </div>
            </div>
        </div>
    </div>

    @livewire('mail-template.send-mail-template')
</div>