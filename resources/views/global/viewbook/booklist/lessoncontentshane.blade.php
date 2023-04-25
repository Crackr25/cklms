@foreach ($lessoncontent as $item)
      <div class="embed-video" style="height:100% !important"  style="pointer-events: none; overflow: hidden">
            <iframe src="{{asset($item->filepath)}}#view=fit&toolbar=0" frameborder="0" allowfullscreen="" uk-responsive="" id="myFrame" s>
              
            </iframe>
      </div>
      {{-- <div id="pdf">
    <object width="100%" height="650" type="application/pdf" data="[ImageURLHere]#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content" style="pointer-events: none;">
        <p>Insert your error message here, if the PDF cannot be displayed.</p>
    </object>
</div> --}}

@endforeach


            