$(function() {

  //Remove modal AJAX
  $('[data-js=btn-edit]').on('click', '.editModalForm', function(){
    console.log('Clicked!');
    var post_id = $(this).val();
    $.get('admin/post/edit/' + post_id, function(data){
      jQuery('#editForm-name').val(data.name);
      jQuery('#editForm-slug').val(data.slug);
      jQuery('#editForm-title').val(data.title);
      jQuery('#editForm-excerpt').val(data.excerpt);
      jQuery('#editForm-body').val(data.body);
      jQuery('#editForm-image').val(data.image);
      jQuery('#editForm-updatedAt').val(data.updated_at);
      jQuery('#confirmBtn').val("update");
    })
  });


  $('#confirmBtn').click(function(e){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    // Trying to parse timestamp given by js into sql readable format (wont work probably)
    var now = new Date(Date.now());
    var dateFormat = now.getFullYear() + "-" + now.getMonth() + "-" + now.getDate() + " " + now.getHours() + ":"  + now.getMinutes() + ":" + now.getSeconds();

    var formData ={
      name: jQuery('#editForm-name').val(),
      slug: jQuery('#editForm-slug').val(),
      title: jQuery('#editForm-title').val(),
      excerpt: jQuery('#editForm-excerpt').val(),
      body: jQuery('#editForm-body').val(),
      image: jQuery('#editForm-image').val(),
      updated_at: dateFormat,
    };
    var state = jQuery('#confirmBtn').val();
    var type = "POST";
    var post_id = jQuery('#post_id').val();
    var ajaxurl = 'admin/post';
    if(state == "update"){
      type = "PUT";
      ajaxurl = "admin/post/edit/" + post_id;
    }
    $.ajax({
      type: type,
      url: ajaxurl,
      data: formData,
      dataType: 'json',
      success: function (data){
        //Passing through the new table row with updated values
        var post =  '<tr><td>' + {{$id + 1}} + '</td><td>' + '<tr><td>' + {{$post->author_id}} + '</td><td>' + data.name + '</td><td>' + data.slug + '</td><td>' + data.title + '</td><td>' + data.excerpt + '</td><td>' + data.body + '</td><td>' + data.image + '</td><td>' + {{$post->created_at}} + '</td><td>' +  + '</td>';
                link += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                link += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    jQuery('#links-list').append(link);
                } else {
                    $("#link" + link_id).replaceWith(link);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#linkEditorModal').modal('hide')
            },
      }
    })
  })
})
