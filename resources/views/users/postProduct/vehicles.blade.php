@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Adverts</strong>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link text-danger" data-toggle="tab" href="#home">Vehicles</a>
                        </li>
                    </ul>

                    <div id="mytabContent" class="tab-content">
                        <div id="home">
                            <h1 id="selcatmsg" style="padding: 10px 10px;"></h1>
                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('/postVehicle') }}" style="padding-left: 20px;">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg">
                                        @if (count($errors)>0)
                                            <div class="alert alert-warning alert-dismissible"><a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>Fill out required fields!</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Select Subcategory</strong></label>
                                                <select class="form-control" name="subCategory_id" >
                                                    <option value="">Select</option>
                                                    @if (count($subcategories)>0)
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value={{$subcategory->id}}>{{$subcategory->sub_category}}</option>Select</option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <label></label>
                                        @if ($errors->has('subCategory_id'))
                                            <div class="alert alert-danger alert-dismissible"><a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>{{$errors->first('subCategory_id')}}<i class="fa fa-cancel"></i></div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Vehicle Name</strong></label>
                                                <input type="text" class="form-control" name="product_name" placeholder="Vehicle Name" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Year of Purchase</strong></label>
                                                <input type="text" class="form-control" name="year_of_purchase" placeholder="Year of Purchase" >
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Condition</strong></label>
                                                <select class="form-control" name="condition" >
                                                    <option value="new">New</option>
                                                    <option value="used">Used</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Price</strong></label>
                                                <input type="number" class="form-control" name="price" placeholder="Price" >
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Name</strong></label>
                                                <input type="text" class="form-control" name="seller_name" placeholder="Name" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Phone</strong></label>
                                                <input type="tel" class="form-control" name="seller_phone" placeholder="Phone Number" >
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Email</strong></label>
                                                <input type="email" class="form-control disable" name="seller_email" placeholder="E-Mail" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>State</strong></label>
                                                <select class="form-control" name="state" >
                                                    <option value="">Select</option>
                                                    @if (count($states)>0)
                                                        @foreach ($states as $state)
                                                            <option value={{$state->id}}>{{$state->State_name}}</option>Select</option>
                                                        @endforeach

                                                    @endif
                                                </select>

                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>City</strong></label>
                                                <input type="tel" name="city" class="form-control" placeholder="Enter Your City">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text-center center">
                                            <label><strong>Pictures of Vehicle (Max 4)</strong></label>
                                            <input type="file" max="4" multiple name="photos[]">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-lg btn-primary" id="postad">Post Product</button>
                                            <button class="btn btn-lg btn-default" id="resetbtn" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
