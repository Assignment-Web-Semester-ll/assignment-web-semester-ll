@extends('layouts.adminpagelayouts.master')

@section('title')
    Blog
@endsection

@section('css')
    <style>
        .table .buttonAction{
            width: 10px; 
            padding-top: 0px; 
            padding-bottom: 0px;
        }
        .table .eachRow{
            padding-top: 0px; 
            padding-bottom: 0px;
            vertical-align: middle;
        }
        .label{
            margin-bottom: 10px;
        }
        .marginBottom{
            margin-bottom: 10px;
        }
        .box{
            border-style: solid; 
            border-color: #A9A9A9; 
            border-width: 1.5px; 
            border-radius: 3px;
            margin-bottom: 10px;
        }
        .boxTitle{
            background-color: #D8D8D8; 
            padding-bottom: 10px; 
            padding-top: 10px;

            border: 0px;
            border-style: solid; 
            border-bottom-color: #A9A9A9;
            border-bottom-width: 0.5px; 
        }
        .boxTitle h5{
            margin: 0px;
        }
        .boxContent{
            background-color: #F7F7F7; 
            padding-bottom: 10px; 
            padding-top: 10px;
        }
    </style>
@stop

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row label">
                            <div class="col-xl-9"></div>
                            <div class="row col-xl-3" style="background-color: #ff8b77; padding-left:0">
                                <div class="col-xl-1"></div>
                                <div class="col-xl-10" style="background-color: #fce5ff; 
                                                            text-align: center">
                                    <h5 style="color: #b91e1a">Blog</h5>
                                </div>
                                <div class="col-xl-1"></div>
                            </div>
                        </div>

                        <div class="row label">
                            <div class="col-xl-12">
                                <input type="text" class="form-control" id="blogTitle" name="blogTitle" class="form-control" placeholder="Blog's Title Place Here">
                            </div>
                        </div>
    
                        <textarea id="summernote"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="row box">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 boxTitle">
                                <h5>Publish</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 boxContent">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label>Code:</label>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" id="blogCode" name="blogCode">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label>Status:</label>
                                    </div>
                                    <div class="col-xl-9">
                                        <label>Draft</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label>Visibility:</label>
                                    </div>
                                    <div class="col-xl-9">
                                        <select id="visibility" name="visibility">
                                            <option value="1" selected>Show</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-xl-5">
                                        <input type="button" class="btn btn-primary" value="Publish" style="width: 100%">
                                    </div>
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-5">
                                        <input type="button" class="btn btn-danger" value="Delete" style="width: 100%;">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <input type="button" id="btnSave" name="btnSave" class="btn btn-success" value="Save" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row box">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 boxTitle">
                                <h5>Category</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 boxContent" style="max-height: 150px; overflow-y: scroll;">
                                <fieldset>
                                    @foreach ($blogCategory as $key => $value) 
                                        <div class="row">
                                            <div class="col-xl-12 blogCategoryRadio">
                                                <input type="radio" value="{{ $key }}" id="{{ $key }}" name="blogCategory"> {{$value}}
                                            </div>
                                        </div>
                                    @endforeach
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row box">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 boxTitle">
                                <h5>Feature Image</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 boxContent" style="max-height: 150px; overflow-y: scroll;">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <form method="POST" enctype="multipart/form-data" id="fileUploadForm">
                                            <input type="file" name="image" id="image" class="btn btn-link">
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <img id="photo" name="photo" style="width: 200px; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('commoncomponent.loading')

    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            var userLogin = 4;
            var isNew = {{$isNew}};

            console.log("Here");
            //========== Set Control ===========
            if(isNew && isNew == 1){
                $('input[name=blogCategory]:first').attr('checked', true);
            }

            //========== Summer Note(Content) ===========
            $('#summernote').summernote({
                placeholder: "What's new?",
                tabsize: 2,
                height: 400,
            });
            

            //============ Start Photochange ==============
            $('#image').change(function(evt){
                var tgt = evt.target || window.event.srcElement,
                    files = tgt.files;
                // FileReader support
                if (FileReader && files && files.length) {
                    var fr = new FileReader();
                    fr.onload = function () {
                        document.getElementById('photo').src = fr.result;
                    }
                    fr.readAsDataURL(files[0]);
                }
                // Not supported
                else {
                    // fallback -- perhaps submit the input to an iframe and temporarily store
                    // them on the server until the user's session ends.
                }
            });
            //============ End Photochange ==============

            //============ Start Save ==============
            if(isNew && isNew == 1){
                //======== NEW ==========
                $('#btnSave').click(function(){
                    $("#loadMe").modal({
                        backdrop: "static", //remove ability to close modal with click
                        keyboard: false, //remove option to close with keyboard
                        show: true //Display loader!
                    });
                    
                    var blogTitle = $('#blogTitle').val();
                    var content = $('#summernote').val();
                    var blogCode = $('#blogCode').val();
                    var visibility = $('#visibility').val();
                    var blogCategoryId = $('input[name=blogCategory]:checked').val();

                    //--------- Validation ----------
                    if(blogTitle && content && blogCode && visibility 
                        && blogCategoryId)
                    {
                        //stop submit the form, we will post it manually.
                        event.preventDefault();
                        // Get form
                        var form = $('#fileUploadForm')[0];

                        // Create an FormData object 
                        var data = new FormData(form);

                        // If you want to add an extra field for the FormData
                        data.append("blogCode", blogCode);
                        data.append("title", blogTitle);
                        data.append("content", content);
                        data.append("bogCategoryId", blogCategoryId);
                        data.append("reportUserId", userLogin);
                        data.append("isApproved", false);
                        data.append("isDeleted", false);
                        data.append("isView", visibility);

                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{ route('blog.store') }}",
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 600000,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                $("#loadMe").modal("hide");
                                console.log("SUCCESS : ", data);
                                window.location = "/blog/edit/" + data;
                                // window.location = "{{ route('blog.edit', 17)}}";
                            },
                            error: function (e) {
                                $("#loadMe").modal("hide");
                                console.log("ERROR : ", e);
                            }
                        });
                    }else{
                        if(confirm("Please Check BlogTitle or Content or BlogCode, or Visibility or BlogCategory Again.")){
                            $("#loadMe").modal("hide");
                            return;
                        }else{
                            $("#loadMe").modal("hide");
                            return;
                        }
                    }
                    console.log("New");
                });
            }else if(isNew != null && isNew == 0){
                //======== OLD ==========
                $('#btnSave').click(function(){
                    console.log("Edit");
                });
            }
            //============ End Save ==============
        });
    </script>
@endsection