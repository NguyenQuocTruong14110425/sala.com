if (typeof jQuery === 'undefined') {
    throw new Error('Datatable requires jQuery library.');
}

(function ($)
{

    console.log('start ....');
    settings = null;
    $table = null;
    $index = 0;
    defaults = {
        sort: false,
        sortField: [],
        search: true,
        countRow: true,
        show: [10,20,30,50,'all'],
        currentShow: 10,
        totalPage: 1,
        CurrentPage: 1,
        button: ['print','csv','excel','pdf','inport'],
        data: [],
        edit: false,
        child: false,
        selectedId: false,
        widthSelectId: '10%',
        rowSelectedId: 'number',
        dataSelectId: [],
        filter: false,
        pagin: true,
        trigger: false,
        IsMove: false,
        lang: 'en'
    }
    dataBackup: [];
    Method = {
        init: function()
        {
            // this.sortAsc();
        },
        search: function(regex)
        {
            var data  = defaults.data.tbody;
            var arrData = [];
            $('#body-table' +  defaults.data.id).remove();
            for(let i = 0 ; i< data.length ; i++)
            {
                data[i].filter(function (item) {
                    item = String(item).toLowerCase();
                    var flag = item.match(regex);
                    if(flag)
                    {
                        arrData.push(data[i])
                    }
                });
            }
            arrData = Array.from(new Set(arrData))
            Element.replaceTable(arrData)
        },

        ComparatorAsc: function(a, b) {
            var numa = !isNaN(a[$index]) ? parseInt(a[$index]) : a[$index];
            var numb = !isNaN(b[$index]) ? parseInt(b[$index]) : b[$index];
            return numa > numb ? 1 : -1;
        },
        ComparatorDesc: function(a, b) {
            var numa = !isNaN(a[$index]) ? parseInt(a[$index]) : a[$index];
            var numb = !isNaN(b[$index]) ? parseInt(b[$index]) : b[$index];
            return numa < numb ? 1 : -1;
        },
        sortAsc: function(index)
        {
            var data = defaults.data.tbody;
            $index = index;
            var data = data.sort(this.ComparatorAsc);
            Element.replaceTable(data)
        },
        sortDesc: function(index)
        {
            var data = defaults.data.tbody;
            $index = index;
            var data = data.sort(this.ComparatorDesc);
            Element.replaceTable(data)

        },
        arraymove: function(arr, fromIndex, toIndex) {
            var element = arr[fromIndex];
            arr.splice(fromIndex, 1);
            arr.splice(toIndex, 0, element);
        },
        show: function()
        {

        },
        pagin: function()
        {

        },
        edit: function()
        {

        },
        filter: function()
        {

        },
        trigger: function()
        {

        },
        lang: function()
        {

        },
        button: function()
        {

        },
        child: function()
        {

        },
        selectedId: function()
        {

        }
    }
    Lang =
        {
            vn: {
                search: 'Tìm kiếm:',
                searchPlaceholder: 'nhập từ khóa tìm kiếm ...',
                show: 'hiển thị',
                entrise: 'đối tượng',
                previous: 'trang trước',
                next: 'trang kế',
                first: 'trang đầu',
                last: 'trang cuối',
                showing: 'đang hiện thị',
                to: 'đến',
                of: 'của',
                rows: 'dòng',
            },
            en: {
                search: 'Search:',
                searchPlaceholder: 'enter keyword for search ...',
                show: 'show',
                entrise: 'entrise',
                previous: 'previous',
                next: 'next',
                first: 'first',
                last: 'last',
                showing: 'showing',
                to: 'to',
                of: 'of',
                rows: 'rows',
            },
            getValue: function(key)
            {
                var result = '';
                if(settings.lang != undefined)
                {
                    var langValue = settings.lang;
                    var result = Lang[langValue][key]
                }
                else
                {
                    var langValue = defaults.lang;
                    var result = Lang[langValue][key]
                }
                return result;
            }
        }
    EventData =
        {
            pageShowCurrent: function()
            {
                var currentShow = $('#show' +  defaults.data.id).val();
                defaults.currentShow = currentShow;
                $( document ).ready(function() {
                    $('#show' +  defaults.data.id).change(function(event){
                        var page = $(this).val();
                        defaults.currentShow = page;
                        Element.pagin();
                        Element.countRow();
                        Element.replaceTable();
                    });
                })
            },
            sort: function()
            {
                $( document ).ready(function() {
                    $('th[sort="true"]').click(function(){
                        var attr = $(this).attr();
                        var index = attr.index;
                        $('th[sort="true"]').attr('class','sort');
                        $('th[sort="true"]').removeAttr('type-sort');
                        if(attr['type-sort'] == 'asc')
                        {
                            $(this).attr('class','sort_asc');
                            $(this).attr('type-sort','desc');
                            Method.sortAsc(index);
                        }
                        if(attr['type-sort'] == 'desc')
                        {
                            $(this).attr('class','sort_desc');
                            $(this).attr('type-sort','asc');
                            Method.sortDesc(index);
                        }
                        else
                        {
                            $(this).attr('type-sort','desc');
                            $(this).attr('class','sort_asc');
                            Method.sortAsc(index);
                        }
                    });
                });
            },
            search: function()
            {
                $( document ).ready(function() {
                    $('#search' +  defaults.data.id).on('keyup', function() {
                        var data = dataBackup.tbody;
                        defaults.data.tbody = dataBackup.tbody;
                        if (this.value.length > 0) {
                            var value = $(this).val();
                            Method.search(value.toLowerCase());
                        }
                        else
                        {
                            Element.replaceTable(data)
                        }

                    });
                });
            },
            pagination: function()
            {
                $( document ).ready(function() {
                    $('a[data-type="pre"]').removeClass('disable');
                    $('a[data-type="pre"]').attr('disable','false');
                    $('a[data-type="next"]').removeClass('disable');
                    $('a[data-type="next"]').attr('disable','false');
                    var page = $('a[current-page="true"]').text();
                    if(page==1)
                    {
                        $('a[data-type="pre"]').addClass('disable');
                        $('a[data-type="pre"]').attr('disable','true');
                    }
                    else if(page== parseInt(defaults.totalPage))
                    {
                        $('a[data-type="next"]').addClass('disable');
                        $('a[data-type="next"]').attr('disable','true');
                    }
                    $('a[data-type="page"]').click(function(event){
                        event.preventDefault()
                        $('a[data-type="page"]').removeClass('active');
                        $('a[data-type="page"]').attr('current-page','false');
                        $(this).addClass('active');
                        $(this).attr('current-page','true');
                        var page = $(this).text();
                        defaults.CurrentPage = page;

                        index = page * defaults.currentShow - defaults.currentShow;
                        Element.countRow();
                        Element.replaceTable(defaults.data.tbody,index,page,page);
                    })
                    $('a[data-type="next"]').click(function(event){
                        event.preventDefault()
                        var pageCurrent = $('a[current-page="true"]').text();
                        if(pageCurrent == defaults.totalPage)
                        {
                            $('a[data-type="next"]').addClass('disable');
                            $('a[data-type="next"]').attr('disable','true');
                        }
                        else
                        {
                            $('a[data-type="page"]').removeClass('active');
                            page = parseInt(pageCurrent) + 1;
                            defaults.CurrentPage = page;
                            $('a[data-type="page"]').attr('current-page','false');
                            $('a[index="'+ page + '"]').addClass('active');
                            $('a[index="'+ page + '"]').attr('current-page','true');
                            index = page * defaults.currentShow - defaults.currentShow;
                            Element.countRow();
                            Element.replaceTable(defaults.data.tbody,index,page,page+2);
                        }

                    })
                    $('a[data-type="pre"]').click(function(event){
                        event.preventDefault()
                        var pageCurrent = $('a[current-page="true"]').text();
                        if(pageCurrent == 1)
                        {
                            $('a[data-type="pre"]').addClass('disable');
                            $('a[data-type="pre"]').attr('disable','true');
                        }
                        else
                        {
                            $('a[data-type="page"]').removeClass('active');
                            page = parseInt(pageCurrent) - 1;
                            defaults.CurrentPage = page;
                            $('a[data-type="page"]').attr('current-page','false');
                            $('a[index="'+ page + '"]').addClass('active');
                            $('a[index="'+ page + '"]').attr('current-page','true');
                            index = page * defaults.currentShow - defaults.currentShow;
                            Element.countRow();
                            Element.replaceTable(defaults.data.tbody,index,page-2,page);
                        }
                    });
                    $('a[data-type="next-center"]').click(function(event){
                        event.preventDefault()
                        var pageCurrent = $(this).attr('index');
                        var page = Math.floor(pageCurrent);
                        $('a[data-type="page"]').removeClass('active');
                        page = page;
                        defaults.CurrentPage = page;
                        $('a[data-type="page"]').attr('current-page','false');
                        $('a[index="'+ page + '"]').addClass('active');
                        $('a[index="'+ page + '"]').attr('current-page','true');
                        index = page * defaults.currentShow - defaults.currentShow;
                        Element.countRow();
                        Element.replaceTable(defaults.data.tbody,index,page,page+2);
                    });
                    $('a[data-type="pre-center"]').click(function(event){
                        event.preventDefault()
                        var pageCurrent = $(this).attr('index');
                        var page = Math.floor(pageCurrent);
                        var pageCurrent = $(this).attr('index');
                        var page = Math.floor(pageCurrent);
                        $('a[data-type="page"]').removeClass('active');
                        pageindex = page;
                        defaults.CurrentPage = pageindex;
                        $('a[data-type="page"]').attr('current-page','false');
                        $('a[index="'+ pageindex + '"]').addClass('active');
                        $('a[index="'+ pageindex + '"]').attr('current-page','true');
                        index = pageindex * defaults.currentShow - defaults.currentShow;
                        Element.countRow();
                        Element.replaceTable(defaults.data.tbody,index,page-2,page);
                    });

                })
            },
            selectedId: function()
            {
                $( document ).ready(function() {
                    $('input[tag-check]').click(function(){
                        var selected_value = []; // initialize empty array
                        $(".checkID:checked").each(function () {
                            selected_value.push($(this).val());
                        });
                        defaults.dataSelectId = defaults.dataSelectId.concat(selected_value);
                        defaults.dataSelectId = Array.from(new Set(defaults.dataSelectId))
                    });
                    $('input[tag-check="all"]').click(function(){
                        var param = '#' + defaults.data.id +  ' input[type="checkbox"]';
                        $(param).prop('checked', this.checked)
                    });

                });
            }

        }
    Data =
        {
            table: function()
            {
                var a = $($table).children()[0];
                var b = $(a).children()[0];
                var c = $($table).children()[1];
                var thead = $(b).children();
                var body = $(c).children();
                var arrThead = [];
                var arrBody = [];
                var flagSelectId = settings.selectedId== false  || settings.selectedId !=undefined? settings.selectedId: defaults.selectedId;
                var rowSelectedId = settings.rowSelectedId? settings.rowSelectedId: defaults.rowSelectedId;
                for(let i = 0; i< thead.length;i++)
                {
                    var thValue = $(thead[i]).text();
                    arrThead.push(thValue);
                }
                for(let j = 0; j< body.length;j++)
                {
                    var tr = $(body[j]).children();
                    var arrayTr = [];
                    for(let k = 0; k< tr.length;k++)
                    {
                        var trValue = '';
                        if($(tr[k]).children()[0])
                        {
                            trValue = $(tr[k]).children();
                        }
                        else
                        {
                            trValue = $(tr[k]).text()
                        }
                        arrayTr.push(trValue);
                    }
                    arrBody.push(arrayTr);
                }
                    table = {
                    class: $table.attr().class !=undefined ? $table.attr().class: 'table',
                    id: $table.attr().id !=undefined ? $table.attr().id: 'myTable',
                    thead: arrThead,
                    tbody: arrBody
                }
                if(settings.data)
                {
                    settings.data.class ? table.class = settings.data.class: table.class = 'table';
                    settings.data.id ? table.id = settings.data.id: table.class = 'myTable';
                    settings.data.thead ? table.thead = settings.data.thead: table.thead = [];
                    settings.data.tbody ? table.tbody = settings.data.tbody: table.tbody = [];
                }
                if(flagSelectId == true && defaults.IsMove == false)
                {
                    if(rowSelectedId == 'number')
                    {
                        table.thead.unshift('');
                    }
                    else
                    {
                        console.log('flagSelectId: ' + rowSelectedId);
                        indexMove = table.thead.indexOf(rowSelectedId);
                        table.thead = table.thead.filter(word => word != rowSelectedId);
                        if(indexMove!= -1)
                        {
                            table.tbody = table.tbody.filter(function(element)
                            {
                                Method.arraymove(element,indexMove,0)
                                return  element;
                            });
                            defaults.IsMove = true;
                            table.thead.unshift(rowSelectedId);
                        }
                    }
                    table.thead = Array.from(new Set(table.thead))
                }
                return table;
            },
            UpdateData: function()
            {
                defaults.data = this.table();
            }
        }
    Element =
        {
            init: function()
            {
                this.show();
                this.search();
                this.table();
                this.pagin();
                this.countRow();
            },
            style: function()
            {

            },
            thTable: function()
            {
                var dataTable = defaults.data;
                var thead ='';
                var flagSelectId = settings.selectedId== false  || settings.selectedId !=undefined? settings.selectedId: defaults.selectedId;
                var flagsortField = settings.sortField== false  || settings.sortField !=undefined? settings.sortField: defaults.sortField;
                if(dataTable.thead.length > 0)
                {
                    for (let i = 0; i< dataTable.thead.length; i++)
                    {
                        if((settings.sort == true && flagSelectId == true && i!=0 ) || (settings.sort == true && flagSelectId==false) )
                        {
                            element = '<th index="'+ i + '">' + dataTable.thead[i] +'</th>\n';
                            for (let p = 0 ; p< flagsortField.length ; p ++)
                            {
                                if(dataTable.thead[i] == flagsortField[p])
                                {
                                    element = '<th class="sort" sort="true"  index="'+ i + '">' + dataTable.thead[i] +'</th>\n';
                                }
                            }
                        }
                        else if(flagSelectId == true && i==0)
                        {
                            defaults.widthSelectId = settings.widthSelectId ? settings.widthSelectId : defaults.widthSelectId;
                            var inputCheck = '<input type="checkbox" tag-check ="all" class="form-control checkID" id="check'+ defaults.data.id + (parseInt(i) + 1)  +'" name="checkID" value="'+ (parseInt(i) + 1) +'"/>\n';
                                element =  '<th width="'+ defaults.widthSelectId +'">\n<div id="check-all'+ defaults.data.id+'">\n' + inputCheck  +'</div></th>\n';
                        }
                        else
                        {
                            element = '<th>' + dataTable.thead[i] +'</th>\n';
                        }
                        thead += element;
                    }
                }
                return thead;
            },
            replaceTable: function(data,index = 0,form = 0 , to = 4)
            {
                $('#body-table' +  defaults.data.id).remove();
                defaults.data.tbody = data ? data: defaults.data.tbody;
                var trbody = Element.trTable(index);
                var idTable = defaults.data.id;
                var tbody ='\n<tbody id="body-table'+ defaults.data.id+'">\n'+ trbody +'\n</tbody>\n';
                $('#' + idTable).append(tbody);
                this.pagin(form,to);
                this.countRow();
            },
            trTable: function(index)
            {
                var dataTable = defaults.data;
                var trbody ='';
                var rowSelectedId = settings.rowSelectedId? settings.rowSelectedId: defaults.rowSelectedId;
                var flagSelectId = settings.selectedId== false  || settings.selectedId !=undefined? settings.selectedId: defaults.selectedId;
                if(dataTable)
                {
                    var tbodyLength = dataTable.tbody && dataTable.tbody.length < parseInt(defaults.currentShow) + parseInt(index) ? dataTable.tbody.length: parseInt(defaults.currentShow) + parseInt(index) ;
                    var tdLength =  dataTable.tbody.length > 0 && dataTable.thead.length < dataTable.tbody[0].length ? dataTable.thead.length: dataTable.tbody.length ==0 ? 0 : dataTable.tbody[0].length;
                    for(let i = index ; i< tbodyLength;i ++)
                    {
                        var tdbody = '';
                        for( let j= 0; j < tdLength;j ++)
                        {

                            if(flagSelectId == true && j == 0)
                            {
                                if(rowSelectedId == 'number')
                                {
                                    var inputCheck = '<input type="checkbox" tag-check ="false" class="form-control checkID" id="check'+ defaults.data.id + (parseInt(i) + 1)  +'" name="checkID" value="'+ (parseInt(i) + 1) +'"/>';
                                    selectID = '<td>' + inputCheck +'</td>\n';
                                    element =  selectID + '<td>' + dataTable.tbody[i][j] +'</td>\n';
                                }
                                else
                                {
                                    var inputCheck = '<input type="checkbox" tag-check ="false" class="form-control checkID" id="check'+ defaults.data.id + (parseInt(i) + 1)  +'" name="checkID" value="'+ dataTable.tbody[i][j] +'"/>';
                                    element =  '<td>' + inputCheck +'</td>\n';
                                }
                            }
                            else
                            {
                                  if($.type(dataTable.tbody[i][j]) =="object")
                                  {
                                      var taget = $(dataTable.tbody[i][j]);
                                      var buttonsAction ='';
                                      for(let k = 0; k< taget.length ; k++)
                                      {
                                          var typeButton = $(dataTable.tbody[i][j][k]).attr("tages");
                                          var href =  $(dataTable.tbody[i][j][k]).attr("href");
                                          if(typeButton == "edit")
                                          {
                                              buttonsAction += '<a type="buttons" class="btn btn-warning" href="'+ href +'"><i class="fas fa-edit"></i></a>\n';
                                          }
                                          if(typeButton == "delete")
                                          {
                                              buttonsAction += '<a type="buttons" class="btn btn-danger" href="'+ href +'"><i class="fas fa-trash"></i></a>\n';
                                          }
                                          if(typeButton == "info")
                                          {
                                              buttonsAction += '<a type="buttons" class="btn btn-info" href="'+ href +'"><i class="fas fa-info-circle"></i></a>\n';
                                          }
                                          if(typeButton == "recover")
                                          {
                                              buttonsAction += '<a type="buttons" class="btn btn-info" href="'+ href +'"><i class="fas fa-reply"></i></a>\n';
                                          }
                                      }
                                      element = '<td width="12%">'+buttonsAction+'</td>\n'
                                  }
                                  else
                                  {
                                      element = '<td>' + dataTable.tbody[i][j] +'</td>\n';
                                  }
                            }
                            tdbody+= element;
                        }
                        var tdData = '<tr>'+ tdbody+'</tr>\n';
                        trbody+= tdData;
                    }

                }
                if(flagSelectId== true)
                {
                    EventData.selectedId();
                }
                return trbody;
            },
            table: function()
            {
                var dataTable = defaults.data;
                var th = this.thTable() ? this.thTable() :'';
                var thead = '<thead>\n<tr>'+ th +'</tr>\n</thead>\n';
                var tbody = this.trTable(0) ? this.trTable(0): '';
                var table = '<table id="'+ dataTable.id + '" class="'+ dataTable.class + '">\n'+ thead + '<tbody id="body-table'+ defaults.data.id+'">\n' + tbody +'</tbody\n</table>\n';
                $($table).remove();
                $($parent).append(table);
            },
            search: function()
            {
                var flagSearch = settings.search == false  || settings.search !=undefined ? settings.search: defaults.search;

                if(flagSearch == true)
                {
                    var input = '<input type="text" name="search" id="search'+ defaults.data.id+'" class="form-control" placeholder="'+ Lang.getValue("searchPlaceholder") +'"/>\n';
                    var label = '<label>'+ Lang.getValue("search") +'</label>\n';
                    var div = '<div class="form-group form-search">'+ label + input +'</div>\n'
                    $($parent).append(div);
                    EventData.search();
                }
            },
            show: function()
            {
                var flagShow = settings.show== false  || settings.show !=undefined? settings.show: defaults.show;

                if(flagShow && flagShow.length > 0)
                {
                    $('#show' +  defaults.data.id).remove();
                    var labelShow = '<label>'+ Lang.getValue("show") +'</label>\n';
                    var labelEntries = '<label>'+ Lang.getValue("entrise") +'</label>\n';
                    var opitions = '';
                    var show = settings.show && settings.show.length >0? settings.show : defaults.show;
                    for (let i = 0 ; i < show.length; i ++ )
                    {
                        var element = '<option>'+ show[i] +'</option>\n';
                        opitions += element;
                    }
                    var select = '<select id="show'+ defaults.data.id+'" name="show" class="form-control">'+ opitions + '<select>\n';
                    var divShow = '<div  class="show-group">'+ labelShow + select + labelEntries +'</div>\n'
                    $($parent).append(divShow);
                    EventData.sort();
                    EventData.pageShowCurrent();
                }
            },
            compareNumbers: function(a, b) {
                return a - b;
            },
            pagin: function(from = 0 , to = 4)
            {
                var flagPagin = settings.pagin == false || settings.pagin != undefined ? settings.pagin: defaults.pagin;
                if(flagPagin ==true)
                {
                    $('#pagein' +  defaults.data.id).remove();
                    var dataTable = defaults.data;
                    var pageShowCurrent = defaults.currentShow;
                    var countRow = dataTable.tbody.length;
                    var totalPage = Math.floor(countRow/pageShowCurrent) == countRow/pageShowCurrent ? countRow/pageShowCurrent : Math.floor(countRow/pageShowCurrent) == 0 ? 1: Math.floor(countRow/pageShowCurrent) + 1;
                    defaults.totalPage = totalPage;
                    var aPre = '<a class="page-link disable" disable="true" data-type="pre" href="javascript:void(0)">' + Lang.getValue("previous")+ '</a>\n';
                    var liPre ='<li class="page-item">' +  aPre +'</li>\n';
                    var aNext = '<a class="page-link" disable="false" data-type="next" href="javascript:void(0)">' + Lang.getValue("next")+ '</a>\n';
                    var liNext ='<li class="page-item">' +  aNext +'</li>\n';
                    var liPage = '';
                    var preButton = defaults.CurrentPage<from ? defaults.CurrentPage: from;
                    var nextButton = defaults.CurrentPage<to ? defaults.CurrentPage: to;
                    var createArray = [];
                    if(from==to)
                    {
                        from = parseInt(defaults.CurrentPage) - 1;
                        to  = parseInt(defaults.CurrentPage)  + 1;
                    }
                    else if((from >= parseInt(defaults.CurrentPage) && to <= parseInt(defaults.CurrentPage)) || from ==0)
                    {
                        from = parseInt(defaults.CurrentPage);
                    }
                    else if((from >= parseInt(defaults.CurrentPage) && to >= parseInt(defaults.CurrentPage)) || from ==0)
                    {
                        to = from + 2;
                    }
                    else
                    {
                        to = parseInt(defaults.CurrentPage);
                        from = parseInt(defaults.CurrentPage) -2;
                    }
                    for (let j = 1 ; j <= totalPage ; j ++)
                    {
                        if(totalPage <= 10)
                        {
                            createArray.push(j)
                        }
                        else
                        {
                            if(j==1 || j>= totalPage-1)
                            {
                                createArray.push(j)
                            }
                            else if(j>= from && j <= to && j>1 || j == parseInt(defaults.CurrentPage))
                            {
                                createArray.push(j)
                            }
                            else
                            {
                                if(j< from && j> 1)
                                {
                                    var preindex = from;
                                    createArray.push(preindex - 0.4)
                                }
                                if(j>  to  && j< totalPage -1)
                                {
                                    var preindex = to;
                                    createArray.push(preindex + 0.4)
                                }
                            }
                        }
                    }
                    createArray = Array.from(new Set(createArray))
                    createArray = createArray.sort(this.compareNumbers);
                    for (let k = 0 ; k < createArray.length ; k ++)
                    {
                        if(createArray[k] == defaults.CurrentPage )
                        {
                            element = '<li class="page-item">\n<a class="page-link active" current-page ="true" data-type="page" index="'+ createArray[k] + '" href="javascript:void(0)">'+ createArray[k] +'</a>\n</li>\n';
                        }
                        else
                        {
                            if(Math.ceil(createArray[k]) == createArray[k+1])
                            {
                                element = '<li class="page-item">\n<a class="page-link" current-page ="false" data-type="pre-center" index="'+ createArray[k] + '" href="javascript:void(0)">...</a>\n</li>\n';
                            }
                            else if(Math.floor(createArray[k]) == createArray[k-1])
                            {
                                element = '<li class="page-item">\n<a class="page-link" current-page ="false" data-type="next-center" index="'+ createArray[k] + '" href="javascript:void(0)">...</a>\n</li>\n';
                            }
                            else
                            {
                                element = '<li class="page-item">\n<a class="page-link" current-page ="false" data-type="page" index="'+ createArray[k] + '" href="javascript:void(0)">'+ createArray[k] +'</a>\n</li>\n';
                            }
                        }
                        liPage += element;
                    }
                    var divPagin = '<div class="pagin-group" id="pagein'+ defaults.data.id+'">\n<nav aria-label="Page navigation">\n<ul class="pagination">\n'+ liPre + liPage + liNext+ '</ul>\n</div>\n</div>';
                    $('#pagin'+ defaults.data.id).remove();
                    $($parent).append(divPagin);
                    EventData.pagination();
                }
            },
            countRow: function()
            {
                var flagPagin = settings.pagin == false || settings.pagin != undefined ? settings.pagin: defaults.pagin;
                var flagCountRow = settings.countRow == false || settings.countRow != undefined ? settings.countRow: defaults.countRow;
                if(flagCountRow == true && flagPagin == true)
                {
                    $('#count-row'+ defaults.data.id).remove();
                    var dataTable = defaults.data;
                    var pageShowCurrent = defaults.currentShow;
                    var countRow = dataTable.tbody.length;
                    var pageActive = $('a[current-page ="true"]').text();
                    var indexto = (pageShowCurrent*pageActive - pageShowCurrent) + 1;
                    indexto = indexto < 0 ? 0: indexto;
                    var indexfrom = pageShowCurrent*pageActive <= countRow ? pageShowCurrent*pageActive: countRow;
                    var pCount ='<span>' + indexto  + ' ' +  Lang.getValue("to")  + ' ' + indexfrom  + ' ' + Lang.getValue("of")  + ' '+ countRow  + ' ' + Lang.getValue("rows") +'</span>';
                    var divCount ='<div id="count-row'+ defaults.data.id+'" class="count-row">\n'+ pCount +'\n</div>'
                    $('#count-row' + defaults.data.id).remove();
                    $($parent).append(divCount);
                }
            },
            sort: function()
            {

            },
            button: function()
            {

            }
        }
    $.fn.DataTableCustom = function (method) {
        settings = $.extend({}, method);
        $table = $(this);
        $parent = $(this).parent();
        Data.UpdateData();
        dataBackup = Data.table();
        Element.init();
        Method.init();
    };
})(jQuery);

(function(old) {
    $.fn.attr = function() {
        if(arguments.length === 0) {
            if(this.length === 0) {
                return null;
            }

            var obj = {};
            $.each(this[0].attributes, function() {
                if(this.specified) {
                    obj[this.name] = this.value;
                }
            });
            return obj;
        }

        return old.apply(this, arguments);
    };
})($.fn.attr)