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
      "searching": true,
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
                          '<button data-toggle="modal" data-target="#app_modal" class="cart-btn btn btn-default btn-sm"><span class="fa fa-eye"></span></button> | '+
                          '<button data-toggle="modal" data-target="#app_modal" class="cart-btn btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>'
                      +'</td>';
            }
        },
      ],
      columnDefs: []
    });
  }
  
  $('.btn-add-song').click(function(){
      $('#songlistModal').modal('show');
  })

  $('#song_form').submit(function(e){
    e.preventDefault();
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
          $('.name').text(data.name);
          $('.email').text(data.email);
          $('.msg').html(data.message);
          $('#viewMessages').modal('show');
        }
    });
  });

  



