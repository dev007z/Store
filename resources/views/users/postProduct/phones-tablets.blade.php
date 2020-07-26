@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <strong>Categories</strong>
                </div>
                <div class="card-body card-cat">
                    <ul class="userPgCategories list-group list-group-flush">
                        @if(isset($categories))
                            @if(count($categories)>0)
                                @foreach ($categories as $category)
                                    <li class="list-group-item-action list-group-item hover-danger">
                                        <a class="nav-link text-danger" href="{{ url('/products/'.preg_replace('/\s+/', '-', $category->main_category).'/'.$category->id) }}">{!!html_entity_decode($category->icons)!!}{{$category->main_category}}</a>
                                    </li>
                                @endforeach
                            @else

                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <strong>Top Products</strong>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link text-danger" data-toggle="tab" href="#home">Mobile & Tablets</a>
                        </li>
                    </ul>
                    <div id="mytabContent" class="tab-content">
                        <div id="home">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
