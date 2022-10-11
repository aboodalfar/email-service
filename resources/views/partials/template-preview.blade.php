@if($body)
    <h3 class="text-center">Preview</h3>
    <iframe srcdoc="{{$body}}" style="border: 3px solid #ccc; border-radius: 5px;padding: 5px; width:400px; height: 500px; overflow: scroll">

    </iframe>
@endif
