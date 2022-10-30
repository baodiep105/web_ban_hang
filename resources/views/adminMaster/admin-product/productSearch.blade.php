@extends('adminMaster.master')
@section('content')
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>PRODUCT</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.admin') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Product
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Post products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- start Validation row -->
        <div class="row ">
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Post products</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('product.admin.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product name</label>
                                        <div class="mb-2">
                                            <input type="text" id="namecategory" class="form-control" value="{{old('name')}}" name="name" placeholder="Enter product name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product price</label>
                                        <div class="mb-2">
                                            <input type="text" id="namecategory" class="form-control" value="{{old('price')}}"  name="price" placeholder="Enter product price">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product price sale </label>
                                        <div class="mb-2">
                                            <input type="text" id="namecategory" class="form-control" value="{{old('price_sale')}}" name="price_sale" placeholder="Enter promotional price">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product pictures</label>
                                            <div class="mb-2">
                                                <div class="input-group mb-3">
                                                    <div class="mb-2">
                                                        <div class="input-group mb-3">
                                                            <div class="custom-file">
                                                                <input type="file" value="{{ old('image') }}" name="image" id="inputGroupFile01" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="control-label" for="fname">Product information</label>
                                        <div class="mb-2">
                                            <textarea class="form-control" name="infomation" id="exampleFormControlTextarea1" rows="5">{{ old('infomation') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Select a category</label>
                                        <div >
                                            <select class="custom-select custom-select-sm" name="product_type_id" required>
                                                @foreach ($data as $valDataCategory)
                                                <option value="{{$valDataCategory->id}}" @if (old('product_type_id') == $valDataCategory->id) selected  @endif>{{$valDataCategory->namecategory}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Select status</label>
                                        <div style="display: flex;">
                                            <div class="form-check" style="padding: 4px 30px !important;">
                                                <input class="form-check-input" type="radio" name="is_open" {{ (old('is_open') == '1') ? 'checked' : ''}} id="gridRadios1" value="1" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    Rest
                                                </label>
                                            </div>
                                            <div class="form-check" style="padding: 4px 30px !important;">
                                                <input class="form-check-input" type="radio" name="is_open" {{ (old('is_open') == '2') ? 'checked' : ''}} id="gridRadios2" value="2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Over
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit_category" class="btn btn-outline-success">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 m-b-30">
                <div class="card card-statistics h-100 m-b-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-heading">
                            <h4 class="card-title">Posted product list</h4>
                        </div>
                        <form action="{{ route('admin.search') }}" method="GET">
                            <div class="dropdown">
                                <input type="text" name="keyWord" class="form-control form-control-sm" value ="{{ request('keyWord') }}" placeholder="Search Invoice">
                            </div>
                        </form>
                    </div>
                    @if(isset($dataSearch))
                        @if ($dataSearch->isEmpty())
                            <div class="error-contant">
                                <div class="error-innr">
                                    <div class="container">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-8 text-center">
                                                <div class="error-text">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 398.1 226.6" style="enable-background:new 0 0 398.1 226.6;" xml:space="preserve">
                                                        <g id="OBJECTS">
                                                            <g>
                                                                <path class="st0" d="M45.6,67.8C28,73.5,7.6,82.4,4.3,100.6c-2.1,11.9,4.8,24.3,15.2,30.4c5.1,3,11.3,5.1,14,10.4
                                                            c4.1,8.2-3.3,17.5-11.1,22.3c-7.8,4.8-17.4,8.5-20.9,17c-2.3,5.6-1.4,12,0.9,17.6c8.5,20.4,33.4,29.4,55.5,28.3
                                                            c22.1-1.1,43.1-9.7,64.7-14.1c74.4-15.2,152.5,19.3,226.8,3.5c11.6-2.5,23.2-6.3,32.1-14.1c10.1-8.7,15.8-21.9,16.6-35.2
                                                            c0.8-12.7-3.7-27-15-32.7c-6.6-3.3-14.6-3.2-21.8-1.4c-4.6,1.2-9.1,3-13.9,3c-4.7,0-10-2.3-11.3-6.9c-1.4-4.8,1.8-9.7,5.6-13
                                                            c7.7-6.6,18-9.9,24.9-17.3c6.7-7.1,9.5-17.7,7.3-27.1c-2.3-9.5-9.6-17.6-18.8-20.9c-23.5-8.3-49,14.4-73,7.7
                                                            c-1.8-0.5-3.7-1.3-4.6-2.8c-0.9-1.6-0.7-3.5-0.2-5.3c2.9-9.7,14.3-15.8,14.8-25.9c0.3-5.5-3-10.6-7.1-14.3
                                                            c-28.1-25.2-68.7,4.8-97.3,14.2C140.7,39.6,92.8,52.6,45.6,67.8z"></path>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st1" d="M154.3,145.1c-4.6-7.7-11.6-10.6-18-10.5c-5.1,0-10.4,1.7-15.1,4.5c-2.3,1.3-4.8,3.3-4.8,3.3c0,0,0,0,0,0
                                                                        l-6.9-17.1c0,0,0,0,0,0l23.3-13.8c0,0,0,0,0,0l-4.1-6.9c0,0,0,0,0,0l-29.2,17.3c0,0,0,0,0,0l13.4,31.7c0,0,0,0,0,0
                                                                        c0,0,4.6-3.6,8.1-5.7c12.2-7.2,20.8-4.7,25.6,3.1c4.8,8.2,1.2,17.2-6.6,21.8c-5.5,3.3-15.1,4.3-15.1,4.3c0,0,0,0,0,0l1.7,7.5
                                                                        c0,0,0,0,0,0c0,0,10.8-1.3,17.5-5.2C157.1,171.6,161.4,157,154.3,145.1z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                        <g>
                                                                            <path class="st1" d="M290.2,105.5c-12.3-7.5-27.9-1.8-40.4,18.5c-12.1,20.1-10.9,36.1,0.9,43.4c13.4,8.2,28,1.6,40.7-19
                                                                        C303.3,129.1,303,113.3,290.2,105.5z M283,143.7c-9.5,15.5-19.5,22.8-27.9,17.6c-7.4-4.6-6.8-16.5,2.9-32.2
                                                                        c10.1-16.5,20.7-22,27.9-17.6C294.4,116.7,292.2,128.8,283,143.7z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <circle class="st2" cx="199.1" cy="126.6" r="34.5"></circle>
                                                                    <path class="st3" d="M164.9,122.3c10.2,1.5,27.4-5.8,32.9-6.9c11.2-2.2,22.7,0.4,34.1,0.8c-0.8-2.5-1.9-4.9-3.2-7.1
                                                                c-4.2,0.2-8.6-0.6-12.9-0.7c-8-0.2-16,1.9-24.1,1.4c-3.7-0.2-12.1-3.5-19.7-4.8C168.3,109.9,165.7,115.8,164.9,122.3z"></path>
                                                                    <path class="st3" d="M199.1,92.1c-3.5,0-6.9,0.5-10.1,1.5c4.3,2.5,13,3.3,15,3.6c3.6,0.5,7.5,0.7,10.6-1.3c0,0,0.1-0.1,0.1-0.1
                                                                C210,93.5,204.7,92.1,199.1,92.1z"></path>
                                                                    <path class="st3" d="M233.5,127.1c-9.9-2.5-20.4-2.7-30.5-0.5c-5.4,1.2-10.7,3.1-16.1,4.4c-6.8,1.7-13.8,2.5-20.8,2.4
                                                                c-0.3,0-0.6,0-0.9,0c1.4,6.9,4.8,13,9.6,17.8c8.3-2.9,16.2-6.8,23.6-11.4c6.5-4.1,13-8.9,20.6-9.6c4.7-0.4,9.4,0.8,14.1,1.8
                                                                C233.4,130.3,233.5,128.7,233.5,127.1z"></path>
                                                                    <path class="st3" d="M231.7,137.7c-4.7-0.7-13,3.4-15.1,5.2c-1.8,1.5-3.4,3.4-5.3,4.8c-2.5,1.7-5.5,2.5-8.5,3.2
                                                                c-5.9,1.5-11.8,3.2-17.7,5.1c-0.7,0.2-1.5,0.6-1.9,1.2c4.7,2.5,10.1,3.9,15.8,3.9c4,0,7.8-0.7,11.4-1.9
                                                                c3.6-5.1,5.7-11.7,11.4-14.1c1-0.4,4.3-0.9,7.4-1.7C230.2,141.5,231,139.7,231.7,137.7z"></path>
                                                                </g>
                                                                <path class="st4" d="M302,229.1c-8.6-45.8-48.8-80.5-97.1-80.5c-48.3,0-88.5,34.7-97.1,80.5H302z"></path>

                                                                <ellipse transform="matrix(0.9914 0.1307 -0.1307 0.9914 28.4406 -25.947)" class="st5" cx="211.9" cy="203.7" rx="11.2" ry="6.3"></ellipse>
                                                                <g>
                                                                    <circle class="st6" cx="132.9" cy="67.9" r="12.8"></circle>
                                                                    <path class="st7" d="M132.9,55.1c-2.3,0-4.4,0.6-6.2,1.6c0.1,0.2,0.2,0.3,0.3,0.4c1.3,1.3,4.4,1.4,6.1,1.4c2.5,0.1,5-0.2,7.4-1
                                                                C138.4,56,135.8,55.1,132.9,55.1z"></path>
                                                                    <path class="st7" d="M142.7,61.9c0.4-0.1,0.8-0.3,1.2-0.5c-0.3-0.6-0.7-1.1-1.1-1.6c-1.3,0.6-2.5,1.1-3.8,1.7c-1,0.4-2,0.9-3,1.2
                                                                c-1.5,0.4-3.2,0.4-4.7,0.4c-3.3,0-6.5-0.3-9.8-0.7c-0.8,1.7-1.2,3.5-1.2,5.5c0,0.9,0.1,1.8,0.3,2.7c0.7-0.3,1.3-0.7,1.9-1.1
                                                                c1.6-1,3.5-1.7,5.3-2.3C132.6,65.4,137.7,63.7,142.7,61.9z"></path>
                                                                    <path class="st7" d="M144.6,62.8c-1,0.9-1.7,2.1-2.8,2.9c-1.1,0.9-2.4,1.6-3.7,2.1c-0.9,0.4-1.9,0.6-2.8,1.1
                                                                c-0.3,0.2-0.7,0.4-0.8,0.8c-0.1,0.7,0.6,1.1,1.3,1.3c1.3,0.3,2.6,0.2,4,0.2c1.6-0.1,3.1-0.1,4.7-0.2c0.3,0,0.6,0,0.8-0.1
                                                                c0.2-1,0.4-2,0.4-3.1C145.7,66.1,145.3,64.4,144.6,62.8z"></path>
                                                                    <path class="st7" d="M133.3,67.5c-2.3,0.5-4.5,1.2-6.6,2.1c-1.4,0.6-2.8,1.4-4.2,1.9c-0.4,0.1-1,0.2-1.7,0.2c0.8,2.4,2.2,4.4,4,6
                                                                c0.1-0.2,0.3-0.3,0.4-0.5c1.9-2.5,3.2-5.7,6-7.3c0.5-0.3,1-0.5,1.5-0.9C133.1,68.7,133.4,68.1,133.3,67.5z"></path>
                                                                    <path class="st7" d="M144.4,73.3c-0.1,0-0.3,0-0.4,0c-2.7,0.2-5.4,0.3-8.2,0.5c-1.7,0.1-3.5,0.2-4.9,1.2c-1.1,0.7-1.8,1.9-2.5,3
                                                                c-0.2,0.4-0.7,0.9-1,1.5c1.6,0.8,3.3,1.2,5.2,1.2c0.3-0.4,0.6-0.9,1-1.3c1.8-2.4,4.7-4,7.7-4.3c0.8-0.1,1.6-0.1,2.4-0.2
                                                                C143.9,74.3,144.2,73.8,144.4,73.3z"></path>
                                                                    <path class="st8" d="M144.6,72.9c0.3-0.8,0.6-1.6,0.8-2.4c-3.3,1.2-7.2,2.2-11.3,3c-4.2,0.8-8.2,1.3-11.7,1.4
                                                                c0.5,0.7,1,1.3,1.6,1.9c3.2-0.2,6.8-0.7,10.5-1.4C138.1,74.8,141.6,73.9,144.6,72.9z"></path>
                                                                    <g>
                                                                        <path class="st1" d="M120.4,76c-4.6,0-8.3-0.7-8.7-2.9c-0.4-2.1,2.3-4.2,8-6.4c0.5-0.2,1.1,0.1,1.3,0.6c0.2,0.5-0.1,1.1-0.6,1.3
                                                                    c-5.8,2.2-6.8,3.8-6.8,4.1c0.2,1.1,7.4,2.4,20.4-0.2c5.5-1.1,10.5-2.5,14.2-4.1c4.2-1.8,4.9-3.1,4.8-3.3
                                                                    c-0.1-0.3-1.7-1.5-8.2-1.3c-0.5,0-1-0.4-1-1c0-0.6,0.4-1,1-1c6.4-0.2,9.9,0.8,10.3,2.9c0.4,1.8-1.6,3.6-6,5.6
                                                                    c-3.8,1.7-9,3.2-14.6,4.3C130.7,75.2,125.1,76,120.4,76z"></path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <circle class="st9" cx="330.2" cy="91.6" r="10.3"></circle>
                                                                    <path class="st10" d="M335.1,82.6c-1.6-0.9-3.3-1.3-5-1.2c0,0.1,0,0.3,0.1,0.4c0.4,1.4,2.6,2.6,3.7,3.3c1.7,1,3.6,1.8,5.6,2.1
                                                                C338.6,85.3,337.1,83.7,335.1,82.6z"></path>
                                                                    <path class="st10" d="M339.4,91.1c0.4,0.1,0.7,0.1,1.1,0.1c0-0.5-0.1-1-0.2-1.6c-1.1-0.1-2.2-0.2-3.4-0.3
                                                                c-0.9-0.1-1.7-0.1-2.6-0.3c-1.2-0.3-2.4-0.9-3.5-1.5c-2.3-1.3-4.5-2.7-6.7-4.3c-1.2,0.9-2.2,2-3,3.4c-0.4,0.7-0.6,1.3-0.8,2
                                                                c0.6,0.1,1.2,0,1.7-0.1c1.5-0.1,3.1,0.1,4.6,0.4C331,89.8,335.2,90.5,339.4,91.1z"></path>
                                                                    <path class="st10" d="M340.4,92.5c-1,0.2-2,0.8-3.1,1c-1.1,0.2-2.3,0.2-3.5,0.1c-0.8-0.1-1.6-0.3-2.4-0.3c-0.3,0-0.6,0-0.8,0.3
                                                                c-0.4,0.4,0,1,0.4,1.4c0.8,0.7,1.8,1.2,2.7,1.7c1.1,0.6,2.3,1.1,3.4,1.7c0.2,0.1,0.4,0.2,0.6,0.3c0.6-0.6,1-1.3,1.5-2
                                                                C339.9,95.2,340.3,93.9,340.4,92.5z"></path>
                                                                    <path class="st10" d="M330.6,91.5c-1.8-0.5-3.6-0.9-5.5-1c-1.2-0.1-2.5-0.1-3.7-0.3c-0.3-0.1-0.8-0.3-1.3-0.5
                                                                c-0.4,2-0.2,4,0.6,5.8c0.2-0.1,0.3-0.1,0.5-0.2c2.3-1.1,4.5-2.8,7-2.9c0.5,0,0.9,0,1.4-0.1S330.5,91.9,330.6,91.5z"></path>
                                                                    <path class="st10" d="M336.3,99.9c-0.1-0.1-0.2-0.1-0.3-0.2c-2-0.9-4-1.9-6-2.8c-1.2-0.6-2.5-1.2-3.9-1c-1,0.1-2,0.6-2.9,1.2
                                                                c-0.3,0.2-0.8,0.4-1.3,0.6c0.8,1.1,1.9,2.1,3.2,2.9c0.4-0.2,0.8-0.4,1.2-0.6c2.2-1,4.8-1.1,7.1-0.1c0.6,0.2,1.2,0.6,1.8,0.8
                                                                C335.5,100.4,335.9,100.1,336.3,99.9z"></path>
                                                                </g>
                                                                <path class="st4" d="M129.3,187.6l-13.1,24.8l-3.6-1.9c-1.9-1-2.7-3.4-1.6-5.3l9.4-17.8c1-1.9,3.4-2.7,5.3-1.6L129.3,187.6z"></path>
                                                                <path class="st4" d="M292.9,211.8l-7.8-19.5l3.8-1.5c2-0.8,4.3,0.2,5.1,2.2l4.9,12.2c0.8,2-0.2,4.3-2.2,5.1L292.9,211.8z"></path>
                                                                <path class="st4" d="M171.9,157.2l-22.7,16.3l-2.4-3.3c-1.3-1.8-0.9-4.2,0.9-5.5L164,153c1.8-1.3,4.2-0.9,5.5,0.9L171.9,157.2z"></path>
                                                                <path class="st4" d="M274.9,184.2l-22.3-16.9l2.5-3.2c1.3-1.7,3.8-2.1,5.5-0.8l16.1,12.1c1.7,1.3,2.1,3.8,0.8,5.5L274.9,184.2z"></path>
                                                                <g>

                                                                    <ellipse transform="matrix(0.8917 -0.4527 0.4527 0.8917 -64.7638 91.5674)" class="st5" cx="158.9" cy="181.1" rx="15.7" ry="7"></ellipse>
                                                                    <path class="st11" d="M156.8,177.9c7-3.6,14-4.2,16.5-1.8c0.1-0.8,0-1.5-0.3-2.1c-1.8-3.4-9.5-3-17.2,0.9
                                                                c-7.8,3.9-12.6,9.9-10.9,13.4c0.2,0.3,0.4,0.6,0.7,0.9C146,185.7,150.4,181.1,156.8,177.9z"></path>
                                                                </g>
                                                                <g>

                                                                    <ellipse transform="matrix(0.8479 0.5301 -0.5301 0.8479 134.9254 -109.8333)" class="st5" cx="258.9" cy="180.2" rx="10.6" ry="4.7"></ellipse>
                                                                    <path class="st11" d="M260,177.9c4.5,2.8,7.3,6.6,6.7,8.9c0.5-0.2,0.9-0.5,1.1-0.9c1.4-2.2-1.5-6.5-6.5-9.6
                                                                c-5-3.1-10.1-3.8-11.5-1.6c-0.1,0.2-0.2,0.5-0.3,0.7C251.8,174.4,255.9,175.3,260,177.9z"></path>
                                                                </g>
                                                                <path class="st11" d="M212.7,197.4c-6.2-0.8-11.5,1.3-12,4.8c0,0.3,0,0.5,0,0.8c1.3-2.8,6.2-4.4,11.6-3.7c5.7,0.8,10.1,3.8,10.3,7
                                                            c0.2-0.4,0.3-0.7,0.3-1.1C223.5,201.7,218.9,198.2,212.7,197.4z"></path>
                                                                <circle class="st5" cx="59.7" cy="112" r="3.3"></circle>
                                                                <circle class="st5" cx="248.6" cy="21.6" r="1.5"></circle>
                                                                <circle class="st5" cx="269.2" cy="48.6" r="1.5"></circle>
                                                                <circle class="st5" cx="25.7" cy="96.1" r="1.5"></circle>
                                                                <circle class="st4" cx="232.3" cy="74.2" r="1.9"></circle>
                                                                <circle class="st4" cx="311.2" cy="160.5" r="1.9"></circle>
                                                                <circle class="st4" cx="366.6" cy="163.6" r="1.9"></circle>
                                                                <circle class="st4" cx="71.2" cy="191" r="1.9"></circle>
                                                                <circle class="st4" cx="179.6" cy="55.1" r="1.9"></circle>
                                                                <polygon class="st4" points="158.7,100.7 161.2,102.1 158.6,103.5 157.2,106 155.9,103.4 153.4,102 155.9,100.7 157.3,98.2         "></polygon>
                                                                <polygon class="st4" points="276.6,74.4 278.2,75.3 276.5,76.2 275.6,77.8 274.7,76.2 273.1,75.2 274.8,74.3 275.7,72.7        "></polygon>
                                                                <polygon class="st4" points="83.7,152.8 85.4,153.7 83.7,154.6 82.8,156.2 81.9,154.6 80.2,153.6 81.9,152.8 82.9,151.1        "></polygon>
                                                                <polygon class="st4" points="84.7,86.2 86.3,87.1 84.6,88 83.7,89.6 82.8,87.9 81.2,87 82.9,86.1 83.8,84.5        "></polygon>
                                                                <polygon class="st4" points="34.7,185.6 36.3,186.5 34.7,187.4 33.7,189 32.8,187.4 31.2,186.4 32.9,185.6 33.8,183.9      "></polygon>
                                                                <polygon class="st4" points="331.5,139.5 333.2,140.4 331.5,141.3 330.6,142.9 329.7,141.3 328.1,140.3 329.7,139.5 330.7,137.8
                                                                    "></polygon>
                                                                <polygon class="st4" points="351.7,205.3 353.3,206.2 351.7,207.1 350.7,208.7 349.8,207 348.2,206.1 349.9,205.2 350.8,203.6
                                                            "></polygon>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <h3 class="m-t-30">Searched product not available</h3>
                                                    <p>Please search for the product again!</p>
                                                    <a href="{{ route('product.admin') }}" class="btn btn-round btn-primary mt-3">Back to Product</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Category</th>
                                                <th>Date </th>
                                                <th>Price/Price sale</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ( $dataSearch as $destroy )
                                        <tbody class="text-muted mb-0">
                                            <tr>
                                                <td>{{ $destroy->id}}</td>
                                                <td>{{ $destroy->name }}</td>
                                                <td>
                                                    <div class="bg-img">
                                                        <img class="img-fluid rounded" src="{{ asset('imgProduct/' . $destroy->image) }}" style="width: 46px;" alt="">
                                                    </div>
                                                </td>
                                                <td>{{ $destroy->category->namecategory }}</td>
                                                <td>{{ $destroy->created_at }}</td>
                                                <td>${{ number_format($destroy->price, 1) }} / ${{ number_format($destroy->price_sale, 1) }}</td>
                                                @php
                                                if($destroy->is_open == 1) {
                                                    $var = 'Rest';
                                                } else {
                                                    $var = 'Over';
                                                }
                                            @endphp
                                            <td style="text-align:center;">
                                                    @if ($destroy->is_open == 1)
                                                    <span class="badge badge-success ">{{ $var }}</span>
                                                    @else
                                                    <span class="badge badge-danger ">{{ $var }}</span>
                                                    @endif
                                            </td>
                                                <td>
                                                    <a href="{{ route('product.edit.detail',['id'=> $destroy->id]) }}" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                                    <a href="{{ route('product.delete',['id' => $destroy->id]) }}"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    <span>
                                    </span>
                                </div>
                            </div>
                         @endif
                    @endif
                    {{ $dataSearch->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            $(document).ready(function(){
                Command: toastr["error"]("{{ $error }}");
        });
        @endforeach
    @endif
</script>
@endsection
