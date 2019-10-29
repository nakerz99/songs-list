$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      songList();
 });

 function songList() {
    oTable =   $('#songListTbl').DataTable( {
      "pageLength": 25,
      "aProcessing": true,
      "aServerSide": true,
      "orderCellsTop": true,
      paging: true,
      searching: true,
      destroy: true,
      "aaSorting": [],
      "ajax": {
      "url": '/songs/showlist',
      "dataSrc": ""
      },
      columns: [
        {   
          "data":"title",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.title+'</td>';
            }
        },
        {   
          "data":"artist",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.artist+'</td>';
            }
        },
        {   
          "data":"created_at",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.date_created+'</td>';
            }
        },
        {   
          "data":"created_at",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '3%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+
                          '<button data-id="'+full.id+'"  data-title="'+full.title+'"   data-lyrics="'+full.lyrics+'"  data-artist="'+full.artist+'" class="cart-btn btn btn-default btn-sm btn-view"><span class="fa fa-eye"></span></button> | '+
                          '<button data-id="'+full.id+'"  class="cart-btn btn btn-danger btn-sm btn-remove"><span class="fa fa-trash"></span></button>'
                      +'</td>';
            }
        },
      ],
      columnDefs: []
    });
  }
  
  $('.btn-add-song').click(function(){
      clear();
      $('#songlistModal').modal('show');
  })

  function clear(){
    $('#song_id').val('');
    $('#title').val('');
    $('#lyrics').text('');
    $('#artist').val('');
  }

  $(document).on("click",".btn-remove",function() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $('#overlay').fadeIn();
        $.ajax({
            url: 'songs/'+$(this).data('id'),
            type: "delete",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            // dataType: "json",
            success: function (data) {
                $('#overlay').delay(500).fadeOut('fast', function(){
                  songList();
                  notif('success', data+' successfully deleted!', 'Success!..');
                });
            }
        });
      }
    })
  })

  $(document).on("click",".btn-view",function() {
    $('#overlay').fadeIn();
    $.ajax({
        url: 'songs/'+$(this).data('id'),
        type: "get",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
          $('#overlay').delay(1).fadeOut('fast', function(){
            $('#songlistModal').modal('show');
            $('#song_id').val(data.id)
            $('#title').val(data.title)
            $('#lyrics').text(data.lyrics)
            $('#artist').val(data.artist)
          });
        }
    });
  })

  $('#song_form').submit(function(e){
    e.preventDefault();
    $('#overlay').fadeIn();
    $('#songlistModal').modal('hide');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: $(this).attr('actions'),
        type: "post",
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
          if (data == 'success') {
            $('.alert-song-input').attr('hidden', true);
            $('#overlay').delay(1000).fadeOut('fast', function(){
              songList();
              notif(data, 'Song Successfully Saved!', 'success');
            });
          }
        },
        error : function(xhr){
          $('#overlay').delay(1000).fadeOut('fast', function(){
            $('#songlistModal').modal('show');
            $('.alert-song-input').attr('hidden', false);
            $('.error-message').html('');
            
            $.each(xhr.responseJSON.errors, function( index, value ) {
              $('.error-message').append(value+'<br>');
            });
          });
        }
    });
  });

function notif(type, message,title){
  $.toast({
    title: title,
    content: message,
    type: type,
    pause_on_hover: true,
    delay: 5000
  });
}

