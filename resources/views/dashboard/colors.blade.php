@include('main.header')
<script src="{{ asset('js/edit.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<div class="container">
    @if ($data)
        <h2>Узнать информацию (тест) </h2>
        <div class="row">
            <div class="col-6">
                <form action="" class="row">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                                    Шаг 1. Параметры
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading1">
                                <div class="accordion-body">
                                    <div class="row mb-1">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Id </label>
                                        <div class="col-sm-8">
                                            <input  readonly type="text" class="form-control" id="id" value="{{$data['asset']['id']}}" placeholder="Колличество кластеров">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label for="colFormLabel" class="col-sm-3 col-form-label">Количество кластеров </label>
                                        <div class="col-sm-8">
                                            <input   type="text" class="form-control" id="kClusters" value="1" placeholder="Колличество кластеров">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </form>
                <button  class=" submitAssetСolors btn btn-primary mt-4 col-6 col-md-4">Отправить</button>

                <div>
                    <canvas id="dominantColorsPie" width="400" height="400"></canvas>

                </div>



            </div>
            <div class="col-6">
                <img class=" assetImage img-fluid mt-5" src="{{url('storage/'.$data['image'][0]['path'])}}"  alt="{{$data['asset']['name']}}">
            </div>

        </div>
        <div>
            <canvas id="dominantColorsHistRed" width="1000" height="200"></canvas>
            <canvas id="dominantColorsHistGreen" width="1000" height="200"></canvas>
            <canvas id="dominantColorsHistBlue" width="1000" height="200"></canvas>

        </div>
    @else
        <h1>Data not found</h1>

    @endif
</div>
@include('main.footer')
