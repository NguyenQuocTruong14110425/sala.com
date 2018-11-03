@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="table-dt row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-title">
                        <h2>table responsive</h2>
                        <p>Sử dụng thẻ form và add class <b style="color:#ffff00">.table-striped</b></p>
                    </div>
                    @foreach($user as $data)
                        <li>{{$data->name}}</li>
                    @endforeach
                    <div class="card-body">
                        <div class="table-basic">
                            <table id="mytable" class="table table-bordered table-striped">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card form table striped -->
        </div>
        <script type="text/javascript">
            $( document ).ready(function() {
                /*
                    data:
                    {
                        class:'table table-striped',
                        id:"mytable",
                        thead:["id", "First Name", "Last Name", "Username", "Role"],
                        tbody:[
                        ["1", "Deshmukh", "Prohaska", "@Genelia", "admin "],
                        ["2", "Deshmukh", "Gaylord", "@Ritesh", "member "],
                        ["3", "Sanghani", "Gusikowski", "@Govinda", "developer"]
                        ]
                    }
                */
                var method =
                    {
                        search: true,
                        sort: true,
                        pagin: true,
                        countRow: true,
                        show: [10,25,50,100],
                        lang: 'vn',
                        selectedId: true,
                        widthSelectId: "10%",
                        rowSelectedId: 'First Name',
                        filter:
                            {
                                Username: {
                                    type: 'text',
                                    filter: true,
                                    autocomplate: true
                                }
                            },
                        data:
                            {
                                class:'table table-bordered table-striped',
                                id:"mytable",
                                thead:["id", "First Name", "Last Name", "Username", "Role"],
                                tbody:[
                                    [1, "admin", "Prohaska", "Truong", "admin "],
                                    [2, "Weblon", "Aon", "Hong", "member "],
                                    [3, "Longing", "1215Lp", "Lan", "developer"],
                                    [4, "Strong", "12/1/1996", "Mã", "developer"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [10, "12Lon", "Alo", "Chine", "developer"],
                                    ["11", "Alon", "PLO", "12", "admin"],
                                    ["13", "10", "ALOP", "12", "developer"],
                                    ["14", "Lop", "PLO", "An Nguyeen", "developer"],
                                    ["15", "Ban", "PLO", "Blc", "admin"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [1, "admin", "Prohaska", "Truong", "admin "],
                                    [2, "Weblon", "Aon", "Hong", "member "],
                                    [3, "Longing", "1215Lp", "Lan", "developer"],
                                    [4, "Strong", "12/1/1996", "Mã", "developer"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [10, "12Lon", "Alo", "Chine", "developer"],
                                    ["11", "Alon", "PLO", "12", "admin"],
                                    ["13", "10", "ALOP", "12", "developer"],
                                    ["14", "Lop", "PLO", "An Nguyeen", "developer"],
                                    ["15", "Ban", "PLO", "Blc", "admin"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [1, "admin", "Prohaska", "Truong", "admin "],
                                    [2, "Weblon", "Aon", "Hong", "member "],
                                    [3, "Longing", "1215Lp", "Lan", "developer"],
                                    [4, "Strong", "12/1/1996", "Mã", "developer"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [10, "12Lon", "Alo", "Chine", "developer"],
                                    ["11", "Alon", "PLO", "12", "admin"],
                                    ["13", "10", "ALOP", "12", "developer"],
                                    ["14", "Lop", "PLO", "An Nguyeen", "developer"],
                                    ["15", "Ban", "PLO", "Blc", "admin"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [1, "admin", "Prohaska", "Truong", "admin "],
                                    [2, "Weblon", "Aon", "Hong", "member "],
                                    [3, "Longing", "1215Lp", "Lan", "developer"],
                                    [4, "Strong", "12/1/1996", "Mã", "developer"],
                                    [5, "Hlome", "Bloon", "Trần an nhiên", "admin"],
                                    [6, "Blin", "Cone", "Nguyên phúc quang", "admin"],
                                    [7, "@list", "$$abc", "Long An", "member"],
                                    [8, "$abc", "WWeb", "Hồ Chí Minh", "member"],
                                    [9, "Addome", "Gusikowski", "Hà Nội", "member"],
                                    [10, "12Lon", "Alo", "Chine", "developer"],
                                    ["11", "Alon", "PLO", "12", "admin"],

                                ]
                            }
                    }
                $('#mytable').DataTableCustom(method);
            });

        </script>
@endsection