/*
$('#postModalForm').on('show.bs.modal', function(event) {
	var data = $(event.relatedTarget).data('whichform'); //gets add/edit changes header text f.e
	var modal = $(this);
  //var method = /edit/;
  //var exists = method.test(data);
  var isit = data.includes("Edit"); // is it the edit button
  console.log(isit);
  if(isit == true){
    $('#postForm').attr('action', "{{route('admin.editpost', $post->id)}}");
    modal.find('.modal-title').text(data);
  }else{
    $('#postForm').attr('action', "{{route('admin.addpost', $post->id)}}");
    modal.find('.modal-title').text(data);
  }
})
*/
/*
$('#textbody').keypress(function(event) {
  if (event.which == 13) {
    event.preventDefault();
      var s = $(this).val();
      $(this).val(s+"\n");
  }
});*/
