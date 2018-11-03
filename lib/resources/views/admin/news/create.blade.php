@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">Create new post</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">Dashboad</a></li>
                <li><a href="{{URL::to('admin/news/')}}" title="admin/news">News</a></li>
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
        <form class="form-basic">
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
                                <span>ex: thu duc district, hcm city</span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keyword:</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"  data-role="tagsinput"
                                       value="input,tag,in" placeholder="add item">
                            </div>
                            <div class="form-group">
                                <label for="email">Content:</label>
                                <textarea class="form-control" rows="10" placeholder="enter content"></textarea>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-info"></i>
                        <h2>Infomation post</h2>
                    </div>
                    <div class="card-body">
                        <div class="tab-menu">
                            <div class="menu-right">
                                <ul>
                                    <li>
                                        <a toggle-tab="tag" href="javascript:void(0)">
                                            <i class="fab fa-wpforms"></i>
                                            <p>Tag</p>

                                        </a>
                                        <ul child-tab="tag">
                                            <div class="form-tab">
                                                <div class="list-tag">
                                                    <a href="javascript:void(0)" tag="lst-tag">news <span>20</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">post<span>1</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">tech <span>0</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">word <span>50</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">new future <span>100</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">new post <span>75</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">curun<span>10</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">hot news<span>7</span></a>
                                                </div>
                                                <div class="right-action">
                                                    <button type="button" class="btn btn-view">view all tag</button>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title:</label>
                                                    <input type="text" class="form-control" id="title" name="title" data-role="tagsinput"
                                                            placeholder="add item">
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a toggle-tab="basic" href="javascript:void(0)">
                                            <i class="fab fa-wpforms"></i>
                                            <p>Form</p>
                                        </a>
                                        <ul child-tab="basic">
                                            <div class="form-tab">
                                                <div class="form-group">
                                                    <label for="title">Title:</label>
                                                    <input type="text" class="form-control unline" id="title" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title:</label>
                                                    <input type="text" class="form-control unline" id="title" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Title:</label>
                                                    <input type="text" class="form-control unline" id="title" name="title">
                                                </div>
                                            </div>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-table"></i>
                        <h2>Categories</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">News</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input"  />
                                <label class="custom-control-label" for="customRadio3">Blog tech</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input"   />
                                <label class="custom-control-label" for="customRadio4">Q/A</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input"  />
                                <label class="custom-control-label" for="customRadio5">Introduce</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio6" name="customRadio" class="custom-control-input" checked />
                                <label class="custom-control-label" for="customRadio6">Hot news</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio7" name="customRadio" class="custom-control-input"  />
                                <label class="custom-control-label" for="customRadio7">Name box</label>
                            </div>
                            <div class="form-group group-search">
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" placeholder="search category">
                                    <button class="btn btn-search" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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