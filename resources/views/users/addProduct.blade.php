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
                    <strong>Add Product</strong>
                </div>
                <div class="card-body">
                    <!--<div id="mytabContent" class="tab-content">
                        <div id="home">
                            {{-- <h1 style="padding: 10px;" class="text-center">SELECT CATEGORY</h1> --}}
                            <form style="padding: 20px">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="form-control dropdown" id="new_Category">
                                            <option class="disabled">Select Category</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="form-control dropdown" id="new_SubCategory">
                                            <option class="disabled">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->

                    {{-- <div id="mytabContent" class="tab-content">
                        <div id="home">
                            <h1 id="selcatmsg" style="padding: 10px 10px;"></h1>
                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('/postVehicle') }}" style="padding-left: 20px;">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Select Category</strong></label>
                                                <select class="form-control dropdown" id="new_Category" required name="mainCategory_id">
                                                    <option class="disabled">Select Category</option>
                                                </select>
                                                <input type="hidden" name="mainCategory_id" value={{ Request::segment(3) }}>
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Select Subcategory</strong></label>
                                                <select class="form-control" name="subCategory_id" required>
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">

                                                <label><strong>Product Name</strong></label>
                                                <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">

                                                <label><strong>Condition</strong></label>
                                                <select class="form-control" name="condition" required>
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
                                                <input type="number" class="form-control" name="price" placeholder="Price" required>
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Name</strong></label>
                                                <input type="text" class="form-control" name="seller_name" placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Phone</strong></label>
                                                <input type="tel" class="form-control" name="seller_phone" placeholder="Phone Number" required>
                                            </div>
                                        </div>

                                        <label></label>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Email</strong></label>
                                                <input type="email" class="form-control" name="seller_email" placeholder="E-Mail" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>State</strong></label>
                                                <select class="form-control" name="state" required>
                                                    <option value="">Select</option>
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
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Year of Purchase</strong></label>
                                                <input class="form-control">
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
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('mainCategories.fetch') }}",
            method: "POST",
            data: {_token: _token},
            success: function(data){
                $('#new_Category').fadeIn();
                $('#new_Category').html(data);
                // alert(data);
            }
        });
    });
</script>

@endsection
