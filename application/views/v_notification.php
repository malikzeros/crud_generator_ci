<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
    <h2>Dynamic Pills</h2>
    <p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#incoming">Incoming</a></li>
      <li><a data-toggle="pill" href="#distribution">Distribution</a></li>
      <li><a data-toggle="pill" href="#Transmittal">Transmittal</a></li>
    </ul>

    <div class="tab-content">
      <div id="incoming" class="tab-pane fade in active">
        <h3>Incoming</h3>
        <p>
           <table class="table table-bordered table-striped" style="margin-bottom: 10px" id='incoming'>
             <thead>
              <tr>
                <th>folby</th>
                <th>status</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>   
          <div class="row"> 
            <div class="col-md-6">
              <a href="#" class="btn btn-primary">Total Record : <?php echo $allcountincoming ?></a>
            </div>
            <div class="col-md-6 text-right">
             <div id='paginationincoming'></div>
           </div>
         </div>
     </p>
   </div>
   <div id="distribution" class="tab-pane fade">
    <h3>Distribution</h3>
     <p>
           <table class="table table-bordered table-striped" style="margin-bottom: 10px" id='distribution'>
             <thead>
              <tr>
                <th>folby</th>
                <th>status</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>   
          <div class="row"> 
            <div class="col-md-6">
              <a href="#" class="btn btn-primary">Total Record : <?php echo $allcountdistribution ?></a>
            </div>
            <div class="col-md-6 text-right">
             <div id='paginationdistribution'></div>
           </div>
         </div>
     </p>
</div>
<div id="Transmittal" class="tab-pane fade">
  <h3>Transmittal</h3>
  <p>
           <table class="table table-bordered table-striped" style="margin-bottom: 10px" id='transmittal'>
             <thead>
              <tr>
                <th>folby</th>
                <th>status</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>   
          <div class="row"> 
            <div class="col-md-6">
              <a href="#" class="btn btn-primary">Total Record : <?php echo $allcounttransmittal ?></a>
            </div>
            <div class="col-md-6 text-right">
             <div id='paginationtransmittal'></div>
           </div>
         </div>
     </p>
</div>

</div>
</div>
</div>
</div>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript'>
 $(document).ready(function(){

   $('#paginationincoming').on('click','a',function(e){
     e.preventDefault(); 
     var pageno = $(this).attr('data-ci-pagination-page');
     loadPaginationincoming(pageno);
   });

   loadPaginationincoming(0);

   function loadPaginationincoming(pagno){
     $.ajax({
       url: '<?php echo base_url()?>index.php/notification/loadRecordincoming/'+pagno,
       type: 'get',
       dataType: 'json',
       success: function(response){
        $('#paginationincoming').html(response.paginationincoming);
        createTableincoming(response.result,response.row);
      }
    });
   }

   function createTableincoming(result,sno){
     sno = Number(sno);
     $('#incoming tbody').empty();
     for(index in result){
      var id = result[index].folby;
      var title = result[index].status;
      var content = result[index].date;
      content = content.substr(0, 60) + " ...";
      var link = result[index].date;
      sno+=1;

      var tr = "<tr>";
      tr += "<td>"+ sno +"</td>";
      tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
      tr += "</tr>";
      $('#incoming tbody').append(tr);

    }
  }

     $('#paginationdistribution').on('click','a',function(e){
     e.preventDefault(); 
     var pageno = $(this).attr('data-ci-pagination-page');
     loadPaginationdistribution(pageno);
   });

   loadPaginationdistribution(0);

   function loadPaginationdistribution(pagno){
     $.ajax({
       url: '<?php echo base_url()?>index.php/notification/loadRecorddistribution/'+pagno,
       type: 'get',
       dataType: 'json',
       success: function(response){
        $('#paginationdistribution').html(response.paginationdistribution);
        createTabledistribution(response.result,response.row);
      }
    });
   }

   function createTabledistribution(result,sno){
     sno = Number(sno);
     $('#distribution tbody').empty();
     for(index in result){
      var id = result[index].folby;
      var title = result[index].status;
      var content = result[index].date;
      content = content.substr(0, 60) + " ...";
      var link = result[index].date;
      sno+=1;

      var tr = "<tr>";
      tr += "<td>"+ sno +"</td>";
      tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
      tr += "</tr>";
      $('#distribution tbody').append(tr);

    }
  }

     $('#paginationtransmittal').on('click','a',function(e){
     e.preventDefault(); 
     var pageno = $(this).attr('data-ci-pagination-page');
     loadPaginationtransmittal(pageno);
   });

   loadPaginationtransmittal(0);

   function loadPaginationtransmittal(pagno){
     $.ajax({
       url: '<?php echo base_url()?>index.php/notification/loadRecordtransmittal/'+pagno,
       type: 'get',
       dataType: 'json',
       success: function(response){
        $('#paginationtransmittal').html(response.paginationtransmittal);
        createTabletransmittal(response.result,response.row);
      }
    });
   }

   function createTabletransmittal(result,sno){
     sno = Number(sno);
     $('#transmittal tbody').empty();
     for(index in result){
      var id = result[index].folby;
      var title = result[index].status;
      var content = result[index].date;
      content = content.substr(0, 60) + " ...";
      var link = result[index].date;
      sno+=1;

      var tr = "<tr>";
      tr += "<td>"+ sno +"</td>";
      tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
      tr += "</tr>";
      $('#transmittal tbody').append(tr);

    }
  }

});
</script>
</body>
</html>
