@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">Create new catelogies</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">Dashboad</a></li>
                <li><a href="{{URL::to('admin/categories/')}}" title="admin/catelogies">catelogies</a></li>
            </div>
            <div class="right-action">
                <button type="button" class="btn btn-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i>Help</a>
                    <a class="dropdown-item" href="#"><i class="fab fa-stack-overflow"></i> Activity</a>
                </div>
            </div>
        </div>
        <form class="form-basic" action="{{URL::to('admin/categories/create')}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-wallet"></i>
                        <h2>Content</h2>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" id="description" name="description">
                                <span>ex: detail for catelogries</span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword:</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"  data-role="tagsinput"
                                       value="input,tag,in" placeholder="add item">
                            </div>
                            <div class="form-group">
                                <label for="language">Language:</label>
                                <select class="form-control">
                                    <option value="vi">Việt Nam</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-images"></i>
                        <h2>Futured Image</h2>
                    </div>
                    <div class="card-body">
                        <div class="image-dashboard row">
                            <div class="col-sm-12 col-md-6">
                                <img src="{{URL::asset('public/images/img1.png')}}" width="200px" height="200px">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>Size: 600 x 600</p>
                                <p>Type: png</p>
                                <p>Thumb: 150 x 150</p>
                                <p>Date Update: {{now()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-puzzle-piece"></i>
                        <h2>Publish infomation</h2>
                    </div>
                    <div class="card-body">
                        <div class="info row">
                            <div class="col-sm-12 col-md-4">
                                <p>Date create:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">{{now()}}</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Publish status:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">publish</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Authod:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">Truong.nguyen</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Hot news:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">false</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Url:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">{{URL::to('/news/blog/tieu-de-name')}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end card form table striped -->
        </div>
        </form>
@endsection