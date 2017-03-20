function answerField(id) {
    if ($('#comment-'+id).length == 0  ){
        $('#answer'+id).after(
            '<div class="row" id="comment-'+id+'">'+
            '<br>'+
                '<div class="col-sm-1">'+
                    '<i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>'+
                '</div>'+
                '<div class="col-sm-11">'+
                    '<form class="form-inline" method="post" action="/post/comment/'+id+'">'+
                        '<div class="row">'+
                            '<div class="form-group col-sm-2">'+
                                '<label for="inputName">Name</label>'+
                                '<input type="text" class="form-control" name="userName" id="inputName" placeholder="Name" required>'+
                            '</div>'+
                            '<div class="form-group col-sm-10">'+
                                '<label>Comment</label>'+
                                '<textarea class="form-control" name="msg" rows="3" required></textarea>'+
                            '</div>'+
                        '</div>'+
                        '<br>'+
                        '<div class="row">'+
                            '<div class="col-sm-9"></div>'+
                            '<div class="col-sm-3">'+
                                '<div class="btn-group ">'+
                                    '<button type="button" onclick="cancelComment('+id+')" class="btn btn-default">Cancel</button>'+
                                    '<button type="submit" class="btn btn-primary ">Send</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</form>'+
                '</div>'+
            '</div>');
    }
}

function cancelComment(id) {
    $('#comment-'+id).remove();
}
