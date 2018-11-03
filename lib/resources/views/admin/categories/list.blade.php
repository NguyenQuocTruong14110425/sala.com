@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">List category post</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">Dashboad</a></li>
                <li><a href="{{URL::to('admin/categories/')}}" title="admin/news">List category post</a></li>
            </div>
            <div class="right-action">
                <a type="buttons" href="{{URL::to('admin/categories/create')}}" class="btn btn-dropdown">
                    <i class="fas fa-plus"></i>
                </a>
                <a type="buttons" href="{{URL::to('admin/categories/all-trash')}}" class="btn btn-dropdown">
                    <i class="fas fa-trash"></i>
                </a>
                <button type="button" class="btn btn-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i>Help</a>
                    <a class="dropdown-item" href="#"><i class="fab fa-stack-overflow"></i> Activity</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-title">
                        <ul class="nav nav-tabs">
                            <li>
                                <a class="active show" data-toggle="tab" href="#list">
                                    <i class="fas fa-clipboard-list"></i>List categories</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#trash">
                                    <i class="fab fa-firstdraft"></i>Draft</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-basic">
                              <div class="tab-content">
                                <div id="list" class="tab-pane fade in active show">
                                    <table id="listtable" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Keword</th>
                                        <th>Tags</th>
                                        <th>Lang code</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $value)
                                            <tr>
                                                <td>{{$value->news_categories_title}}</td>
                                                <td>{{$value->news_categories_description}}</td>
                                                <td>{{$value->news_categories_keyword}}</td>
                                                <td>{{$value->news_categories_tags}}</td>
                                                <td>{{$value->news_categories_lang_code}}</td>
                                                <td>
                                                    <a type="buttons" tages="edit"  href="{{URL::to('admin/categories/update/' . $value->id)}}">update</a>
                                                    <a type="buttons" tages="delete"  href="{{URL::to('admin/categories/trash/' . $value->id)}}">trash</a>
                                                    <a type="buttons" tages="info"  href="{{URL::to('admin/categories/detail/' . $value->id)}}">detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="trash" class="tab-pane fade">
                                    <table id="trashtable" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Keword</th>
                                        <th>Tags</th>
                                        <th>Lang code</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card form table striped -->
        </div>
        <script type="text/javascript">
            $( document ).ready(function() {
                var method =
                    {
                        search: true,
                        sort: true,
                        pagin: true,
                        countRow: true,
                        show: [10,25,50,100],
                        lang: 'en',
                        selectedId: false,
                        sortField :['Title','Description','Keword','Lang code']
                    }
                $('#listtable').DataTableCustom(method);
            });

        </script>
@endsection