@extends('layouts.adminpagelayouts.master')

@section('title')
    Comment
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row label">
            <div class="col-xl-10"></div>
            <div class="col-xl-2" style="background-color: #ff8b77; 
                                        padding-left:0">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10" style="background-color: #fce5ff; 
                                            text-align: center">
                        <h5 style="color: #b91e1a">Comment</h5>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <table id="tbCategory" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td class="buttonAction">
                                <input type="button" class="btn btn-link btnResponse" Value="Response" >
                            </td>
                            <td class="eachRow">{{$comment->id}}</td>
                            <td class="eachRow">{{$comment->comment}}</td>
                            <td class="eachRow">{{$comment->date}}</td>
                            <td class="eachRow">{{$comment->author}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @include('commoncomponent.loading')
        {{ ( $comments->links()) }}
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            var tableclicked = null;
            /*********************************
            *       Edit Blog Category
            **********************************/
            $(document).on('click', '#tbCategory .btnResponse', function(e){
                tableclicked = $(this);
                var tr = $(this).closest('tr');
                var code = tr.find('td:eq(2)').html();
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: "/comment/response/" + tr.find('td:eq(2)').html(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        // $("#editCategoryId").val(data && data.id ? data.id :"Auto Generate");
                        // $("#editCategoryName").val(data && data.categoryName ? data.categoryName :"");
                        // $("#editCategoryCode").val(data && data.categoryCode ? data.categoryCode :"");
                        // data && data.isView 
                        // ? data.isView == 1 
                        //     ? $("#editIsView").attr('checked', true) 
                        //     : $("#editIsView").attr('checked', false) 
                        // : $("#editIsView").attr('checked', false);
                        
                        // console.log(data);
                    },
                    error: function(data){
                        $("#loadMe").modal("hide");
                        console.log(data);
                    }
                });
            });
        });
    </script>
@stop