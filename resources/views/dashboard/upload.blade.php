@include('main.header')


<script >
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
            $(".assetImage").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
    }
}
</script>
<script src="{{ asset('js/upload.js') }}"></script>
<div class="container">
    <h2>Добавление объекта </h2>
    <div class="row">
        <div class="col-6">
            <form action="" class="row" onsubmit="return false">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Шаг 1. Загрузка
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <label for="formFile" class="form-label">Загрузите файл</label>
                                <input class="form-control" type="file" id="formFile" onchange="previewFile(this)">
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                                Шаг 2. Основная информация
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading2">
                            <div class="accordion-body">
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Название </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" placeholder="Название объекта">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Автор </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="author" placeholder="Автор">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class=" submitAsset btn btn-primary mt-4 col-6 col-md-4">Подтвердить изменения</button>
            </form>
        </div>
        <div class="col-6">
            <img id="assetImage" class=" assetImage img-fluid mt-5" src="https://digest.com.kz/static/images/placeholder.jpg" alt="">
        </div>
    </div>
</div>
@include('main.footer')
