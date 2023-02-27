@include('main.header')
<script src="{{ asset('js/edit.js') }}"></script>
<div class="container">
    @if ($data)
    <h2>Добавление объекта </h2>
    <div class="row">
        <div class="col-6">
            <form action="" class="row">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                                Шаг 1. Основная информация
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading1">
                            <div class="accordion-body">
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Id </label>
                                    <div class="col-sm-8">
                                        <input  readonly type="text" class="form-control" id="id" value="{{$data['asset']['id']}}" placeholder="Название объекта">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Название </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" value="{{$data['asset']['name']}}" placeholder="Название объекта">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Автор </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="author" value="{{$data['asset']['author']}}" placeholder="Автор">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                                Шаг 2. AI Data
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading2">
                            <div class="accordion-body">
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Схема </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$data['aidata'][0]['scheme']}}" id="scheme" placeholder="Схема">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">a_color </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$data['aidata'][0]['a_color']}}" id="a_color" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">b_color </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$data['aidata'][0]['b_color']}}" id="b_color" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">c_color </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$data['aidata'][0]['c_color']}}" id="c_color" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">d_color </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$data['aidata'][0]['d_color']}}" id="d_color" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">e_color </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$data['aidata'][0]['e_color']}}" id="e_color" placeholder="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class=" submitAssetEdit btn btn-primary mt-4 col-6 col-md-4">Подтвердить изменения</button>
            </form>
        </div>
        <div class="col-6">
            <img class=" assetImage img-fluid mt-5" src="{{url('storage/'.$data['image'][0]['path'])}}"  alt="{{$data['asset']['name']}}">
        </div>
    </div>
    @else
        <h1>Data not found</h1>

    @endif
</div>
@include('main.footer')
