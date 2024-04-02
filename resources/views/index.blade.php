@php
use Carbon\Carbon;
@endphp
<x-main>
    <div class="container">
    <div class="row" style="margin-bottom:15px;padding:0px 10px;border:1px solid #fff;border-radius:20px;background:#000;color:#fff;box-shadow: rgb(255 255 255 / 16%) 0px 3px 6px, rgb(169 168 168 / 23%) 0px 3px 6px;
            <div class="grid-item">
                <div class="item text-end">
                    <button id="myBtn" class="btn-add" style="margin:10px 0px">
                        ADD GALLERY
                    </button>
                </div>
               
            </div>
            
        </div>
        <div class="row">
            <div class="grid-item">
              @foreach($albums as $index=>$album)
                <div class="item">
                    <div class="card">
                        <img src="{{count($album->getMedia('*')) > 0 ? $album->getMedia('*')[0]->getUrl():'/asset/image/oYiTqum_d.webp'}}" style="height:300px" class="card__image" alt="" />
                        <div class="card__overlay">
                          <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                            <a href="/Album/show/{{$album->id}}"><img class="card__thumb" src="{{asset('asset/image/7D7I6dI_d.webp')}}" alt="" /></a>
                            <div class="card__header-text">
                            <a href="/Album/show/{{$album->id}}">
                              <h3 class="card__title">{{$album->name}}</h3>            
                              <span class="card__status">{{Carbon::now()->diffForHumans(Carbon::parse($album->created_at))}}</span>
                              </a>
                              <div class="grid-item" style="display:flex;margin-top:15px">
                                    <div class="item"><button data-id="{{$album->id}}" class="delete-album">DE</button></div>
                                    <div class="item"><button data-id="{{$album->id}}" data-name="{{$album->name}}" class="edit-album">ED</button></div>
                              </div>
                            </div>

                          </div>
                        </div>
                    </div>      
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
              <p>Make Album</p>
              </div>
          </div>
        </div>
      </div>
      <div class="card-body" style="margin-top:20px ">
        <form method="post" action="/Album/store" enctype="multipart/form-data">
          @csrf
          <div class="grid-item">
              <div class="item">
                <label for="name"></label>
                <input type="text" id="name" name="name" class="" style="width: 100%;" />
              </div>
          </div>
          <div class="grid-item">
              <div class="item" style="text-align: center;margin-top:20px">
                  <input type="submit" value="save"/>
              </div>
          </div>
        </form>
        

      </div>
    </div>
  </div>

</div>



<div id="myModalEdit" class="modal">

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
            <p>Edit Album</p>
            </div>
        </div>
      </div>
    </div>
    <div class="card-body" style="margin-top:20px ">
      <form method="post" action="/Album/update" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id"/>

        <div class="grid-item">
            <div class="item">
              <label for="name"></label>
              <input type="text" id="edit_name" name="name" class="" style="width: 100%;" />
            </div>
        </div>
        <div class="grid-item">
            <div class="item" style="text-align: center;margin-top:20px">
                <input type="submit" value="save"/>
            </div>
        </div>
      </form>
      

    </div>
  </div>
</div>

</div>

</x-main>
