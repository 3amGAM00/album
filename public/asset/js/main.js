// When the user clicks on the button, open the modal

$(document).on("click","#myBtn",function(){
    $("#myModal").css('display',"block");
});

$(document).on("click",".edit-album",function(){
    var id=$(this).attr('data-id');
    var name=$(this).attr('data-name');
    $("#id").val(id);
    $("#edit_name").val(name);
    $("#myModalEdit").css('display',"block");
});

// When the user clicks anywhere outside of the modal, close it
$(document).on('click',function(event){
    if ($(event.target).attr('id') == modal.attr('id')) {
        $("#myModal").css('display',"none");
        $("#myModalEdit").css('display',"none");
      }
});
// When the user clicks on <span> (x), close the modal
$(".close").on("click",function(){
    $("#myModal").css('display',"none");
    $("#myModalEdit").css('display',"none");

})

// When the user clicks on the button, open the modal


// DELETE Album

$(document).on('click','.delete-album',function(){
    var id=$(this).attr('data-id');
   $.get('/Album/delete/'+id).then(res=>{
        window.location.reload(true);
    }).catch(res=>{

   }); 
});

// DELETE IMAGE IN ALBUM

$(document).on('click','.delete-image',function(){
    var id=$(this).attr('data-id');
   $.get('/image/delete/'+id).then(res=>{
        window.location.reload(true);
   }).catch(res=>{

   }); 
});

// Upload IMages 

var token = $('meta[name=csrf-token]').attr('content');
var myDropzone = new Dropzone("#upload_images", {
    url: "/image/store", // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    params: {'_token':token,'id':12},
    maxFiles: 10,
    maxFilesize: 10, // MB
    uploadMultiple: true,
    addRemoveLinks: true,
    accept: function(file, done) {
        if (file.name == "wow.jpg") {
            done("Naha, you don't.");
        } else {
            done();
        }
    },
    init:function(){
        this.on("complete",function(file){
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                console.log(this);
                window.location.reload(true);
              }
        })
    }
});
