$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      songList();
 });





function songList() {
    oTable =   $('#cart_tbl').DataTable( {
      "pageLength": 50,
      "aProcessing": true,
      "aServerSide": true,
      "orderCellsTop": true,
      "bDeferRender": true,
      sDom: 'lrtip',
      "bDestroy": true,
      "ajax": {
      "url": '/song/showlist',
      "dataSrc": ""
      },
      columns: [
        {   
          "data":"item_code",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.item_code+'</td>';
            }
        },
        {   
          "data":"item_name",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.item_name+'</td>';
            }
        },
        {   
          "data":"description",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.description+'</td>';
            }
        },
        {   
          "data":"estimated_price",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
                return '<td>'+full.estimated_price+'</td>';
            }
        },
        {   
          "data":"cart",
           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
            {
              $(nTd).css('text-align', 'left');
              $(nTd).css('width', '10%');
            },
            "mRender": function( data, type, full ,meta) {
              if (full.cart === '') {
                return '<td>'+
                      '<button onclick="addDescription('+full.id+', \''+full.item_code+'\', \''+full.item_name+'\', \''+full.category_id+'\', \''+full.estimated_price+'\')"  data-toggle="modal" data-target="#item_modal" class="cart-btn btn btn-success btn-sm">Add to cart</button>'
                    +'</td>';
              }else{
                return '<td>'+
                      '<button onclick="removeCart('+full.cart+')"  class="cart-btn btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>'
                    +'</td>';
              }
            }
        },
      ],
      columnDefs: []
    });
  }
  