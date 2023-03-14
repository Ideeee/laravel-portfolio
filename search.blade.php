@extends('layouts.app')

@section('style')
    <style>
        .results .desc {
            margin-top: -13px;
        }
        #category-description {
            font-size: 1.1rem;
        }
        .cars .card {
            border: 0;
        }
        .cars .card:hover {
            border: 1px solid #bdbdbd;
            box-sizing: border-box;
            box-shadow: 0px 3px 20px rgba(0, 0, 0, 0.07);
        }

        .car-type .card {
            border: 0;
            background-color: white;
        }
        .car-type .card:hover {
            border: 1px solid red;
            background-color: #F2F2F2;
        }
        .car-type .active {
            border: 1px solid red !important;
            background-color: #F2F2F2;
        }
        .specification {
            font-size: 16px;
        }
        .specification h4 {
            font-family: Bebas Neue;
            font-size: 24px;
        }
        @media (min-width: 768px) {
            .car-desc {
                width: 75%;
            }
        }
        @media (max-width: 767.98px) {
            .specification {
                font-size: 14px;
            }
        }
    </style>
@endsection

@section("title", $title)

@section('nav2')

@endsection
@section('content')
    <div class="container py-3">
      <x-search/>
      <div class="selected">
        @isset(request()->year)
          <span class="badge badge-light px-3 py-2 ml-auto mr-auto">{{request('year') ?? ""}}<i class="fa fa-times ml-2"></i></span>
        @endisset
        @isset(request()->brand)
          <span class="badge badge-light px-3 py-2 ml-auto mr-auto">{{request('brand') ?? ""}}<i class="fa fa-times ml-2"></i></span>
        @endisset
      </div>
    </div>

    <main class="container px-0">
        <div class="row px-0 mx-0">
            <div class="col-md-3 px-0 px-md-3 mb-3">
                <div class="car-type card w-100 mx-0 px-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pt-4">
                            <h5 class="font-weight-bold">Filters</h5>
                        </li>
                        <li class="list-group-item">
                            <p class="font-weight-bold text-muted">Type</p>
                            <div class="row flex-wrap justify-content-around">

                              @isset(request()->category)
                              @php

                              $category_name = App\Category::where("name","like","%".request()->category."%")->first('name')->name;

                              @endphp
                              @endisset
                              @foreach ($categories as $category)
                                <div class="card text-dark pt-1 pb-4 w-100 px-2 @if(request()->category && $category_name == $category->name) active @endif">
                                  <a href="{{route("public.category.cars", $category->slug)}}?brand={{request()->brand ?? ""}}&year={{request()->year ?? ""}}">
                                    <img src="{{Str::replaceArray('thumbnail/',[''], Str::replaceArray('_medium_', ['_'], $category->media->first()->path))}}" class="card-img w-100 mb-4" alt="{{$category->name}}">
                                    <div class="card-img-overlay d-flex align-items-end justify-content-around">
                                        <p class="card-text font-weight-bold">{{$category->name}}</p>
                                    </div>
                                  </a>
                                </div>
                              @endforeach
                            </div>
                            <div class="d-flex justify-content-around py-5">
                                <button class="btn btn-danger px-4">Show more</button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h5 class="font-weight-bold text-muted my-2 pt-2">Brands</h5>
                            <label for="">Make</label>
                            <div class="btn-group w-100 my-1">

                                <button type="button" class="btn btn-outline-secondary d-flex justify-content-between align-items-center px-3 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-black-50">Select </span>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>

                            <label for="">Type</label>
                            <div class="btn-group w-100 my-1 border-secondary">

                                <button type="button" class="btn btn-outline-secondary d-flex justify-content-between align-items-center px-3 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-black-50">Select </span>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button">Actin</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>

                            <h5 class="font-weight-bold text-muted my-2 pt-2">Year</h5>
                            <div class="d-flex mb-3">
                                <div class="btn-group w-50 my-1 pr-2">

                                    <button type="button" class="btn btn-outline-secondary d-flex justify-content-between align-items-center px-3 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-black-50">2010 </span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                                </div>
                                <div class="btn-group w-50 my-1">

                                    <button type="button" class="btn btn-outline-secondary border-muted d-flex justify-content-between align-items-center px-3 rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-black-50">2019 </span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Search Results -->
            <div class="col-md-9 results px-4 md-px-6">
                <div class="row border border-muted rounded py-2 py-md-4 px-2 px-md-4 font-weight-bold text-secondary">Search Result ({{count($api_cars)}})</div>   
                 @foreach ($search as $car)

                  <div class="row border border-muted rounded py-3 px-3 mt-3 font-weight-bold text-secondary">
                    <div class="col-md-5 card bg-light text-dark">
                        <a href="{{url('car/'.$car->slug)}}"><img src="{{$car->media->first()->path ?? ''}}" class="card-img" alt="{{$car->full_name()}}"></a>
                        <div class="card-img-overlay">
                            <p class="card-text badge badge-secondary align-self-end"><i class="fa fa-fw mr-1 fa-images"></i> {{$car->media->count()}}</p>
                        </div>
                    </div>

                    <div class="row col-md-7 px-0 pt-2 px-md-3 card ml-1 d-flex flex-column border-0">
                        <div class="row w-100 d-flex justify-content-between font-weight-bold px-3">
                            <a href="{{route('brand.model.year', [$car->model->brand->slug, $car->model->slug, $car->year])}}"><p class="">{{$car->full_name()}}</p></a>
                            <span class=" text-danger">
                            <i class="fas fa-star mr-1"></i> {{$car->getAverageRating()}}
                        </span>
                        </div>
                        <div class="row desc d-flex justify-content-between px-3">
                            <span class="">
                                <span class="badge badge-light px-3 py-2 ml-auto mr-auto">{{$car->year}}</span>
                                <span class="badge badge-light px-3 py-2 ml-auto mr-auto">{{$car->model->category->name}}</span>
                            </span>
                            <span class="badge badge-white">{{$car->get_reviews_count()}}</span>
                        </div>
                        <div class="row d-flex justify-content-between px-md-0 px-3 py-3 flex-wrap short-spec">
                            <div class="col-4 co-6 my-0 py-0">
                                <p class="desc-head">ENGINE</p>
                                <p class="desc-body">{{$car->specs->engine ?? "Not Available"}}</p>
                            </div>
                            <div class="col-4 co-6 my-0 py-0">
                                <p class="desc-head">0-60mph</p>
                                <p class="desc-body">{{$car->specs->_0_60MPH ?? "Not Available"}}</p>
                            </div>
                            <div class="col-4 co-6 my-0 py-0">
                                <p class="desc-head">Power</p>
                                <p class="desc-body">{{$car->specs->power ?? "Not Available"}}</p>
                            </div>
                            <div class="col-4 co-6 my-0 py-0">
                                <p class="desc-head">Price</p>
                                <p class="desc-body">{{$car->getPrice()}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $search->appends(request()->all())->links() }}
                    </div>
              </div>
            </div>
            <!-- End Search Results -->
        </div>
    </main>
@endsection
