@php
use Carbon\Carbon;
@endphp
<x-main>
    <div class="container">
        <div class="row" style="padding:0px 10px;border:1px solid #fff;border-radius:20px;background:#000;color:#fff;box-shadow: rgb(255 255 255 / 16%) 0px 3px 6px, rgb(169 168 168 / 23%) 0px 3px 6px;">
            <div class="grid-item">
            <div class="item">
                    <p>{{$album->name}}</p>
                </div>
                <div class="item text-end">
                    <button id="myBtn" class="btn-add" style="margin:0px">
                        ADD IMAGES
                    </button>
                </div>
               
            </div>
            
        </div>
        <div class="row" style="border-radius: 15px;;background:#fff;box-shadow: rgb(255 255 255 / 16%) 0px 3px 6px, rgb(169 168 168 / 23%) 0px 3px 6px;">
            <div class="grid-item">
              @foreach($album->getMedia("*") as $index=>$value)
                <div class="item" style="width: 38%;margin-bottom:15px">
                    <a class="card">
                        <img src="{{$value->getUrl()}}" style="height:250px" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="item"><button data-id="{{$value->id}}" class="delete-image">DE</button></div>
                        </div>
                      </a>      
                </div>
              @endforeach
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    

    <div class="card-form">
    <div class="card-header">
        <div class="row">
          <div class="grid-item" style="display:flex">
              <div class="item justify-self">
              <span class="close">&times;</span>
              </div>
              <div class="item text-end">
              <p>ADD IMAGE</p>
              </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="post" action="/Album/store" enctype="multipart/form-data">
          @csrf
          <div class="grid-item">
              <div class="item">
                 <!--begin::Dropzone-->
                    <div class="dropzone" id="upload_images">
                        <div class="dz-message needsclick">
                            <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                <span class="fs-7 fw-semibold text-gray-500">Upload up to 10 files</span>
                            </div>
                        </div>
                    </div>
                    <!--end::Dropzone-->
              </div>
          </div>
        </form>
        

      </div>
    </div>
  </div>

</div>

</x-main>
