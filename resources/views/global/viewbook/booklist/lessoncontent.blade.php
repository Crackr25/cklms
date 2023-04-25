@foreach ($lessoncontent as $item)
    @if($item->type == 1)
        <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" style="font-size: 20px;">{{$item->content}}</textarea>
            </div>
        </div>
    @elseif($item->type == 3)
      <div class="embed-video" style="height:100% !important"  style="pointer-events: none;">
            <iframe src="{{asset($item->filepath)}}#view=fit&toolbar=0" frameborder="0" allowfullscreen="" uk-responsive="" id="myFrame"  >
              
            </iframe>
      </div>
    @endif
      {{-- <div id="pdf">
    <object width="100%" height="650" type="application/pdf" data="[ImageURLHere]#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content" style="pointer-events: none;">
        <p>Insert your error message here, if the PDF cannot be displayed.</p>
    </object>
</div> --}}

@endforeach


            