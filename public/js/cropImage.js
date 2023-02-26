var $modal = $('#modal-cropImage');
var image = document.getElementById('imageCrop');
var cropper;

$("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        $modal.removeClass("hidden");
        $modal.addClass("open");
    };

    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
        file = files[0];

        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
        reader.readAsDataURL(file);
        }
    }
});

$("body").on("change", ".image", function () {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
    });
});

function destroyCrop() {
    cropper.destroy();
    cropper = null;
};

function saveCrop(){
    canvas = cropper.getCroppedCanvas({
        width: 160,
        height: 160,
    });
    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        var inputImage = document.querySelector(".image").files[0];
        reader.readAsDataURL(blob);
        reader.onloadend = function() {
                inputImage.name = reader.result;
                $modal.removeClass("open");
                $modal.addClass("hidden");
        }
});
cropper.destroy();
    cropper = null;
}


    // canvas.toBlob(function(blob) {
    //     url = URL.createObjectURL(blob);
    //     var reader = new FileReader();
    //     reader.readAsDataURL(blob);
    //     reader.onloadend = function() {
    //         var base64data = reader.result; 
    //         $.ajax({
    //             type: "POST",
    //             dataType: "json",
    //             url: "http://127.0.0.1:8000/cropImageToko",
    //             data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
    //             success: function(data){
    //                 console.log(data);
    //                 $modal.modal('hide');
    //                 alert("Crop image successfully uploaded");
    //             }
    //         });
    //     }
    // });
// });