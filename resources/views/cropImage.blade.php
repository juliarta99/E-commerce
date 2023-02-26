<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crop Image</title>
    @vite("resource/css/app.css")
</head>
<body>
    <div class="pb-10 px-9 pt-36 lg:pt-24">
        <input type="file" name="image" >
        <div class="w-full">
            <h1 class="text-md md:text-lg lg:text-xl xl:text-2xl">Crop Image</h1>
            <div class="w-full">
                <div class="w-2/3">
                    <img src="" class="" alt="">
                </div>
                <div class="w-1/3">
                    <div id="preview"></div>
                </div>
                <button id="crop">Crop</button>
            </div>
        </div>
    </div>
</body>
</html>