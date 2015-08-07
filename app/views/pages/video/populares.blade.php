<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/tables/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="css/tables/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/jsfunctions/dataTables.responsive.js"></script>


</head>
<body>
<div id="popular" class="box-content">   
          <table style="overflow:auto;" id="datatable-1" class="" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th><center>Id</center></th>
                <th><center>Imagen</center></th>
                <th><center>Titulo</center></th>
                <th><center>Vistas <i class="fa fa-weibo"></i></center></th>
                <!-- <th>Calificacion <i class="fa fa-star"></i></th>                 -->
              </tr>
            </thead>
            <tbody>
            <!-- Start: list_row -->
              @foreach($items as $item)
              <tr>
                <td id="id">{{$item->id}}</td>
                <td id="imagen">
                  <img src="{{ $item->thumburl }}" width="140px" height="87px" alt="" />          
                </td>
                <td id="titulo">{{$item->title}}</td>
                <td id="vistas"><center>{{$item->times_viewed}}</center></td>
                <!-- <td id="calificacion">{{$item->rate}}</td>                 -->
              </tr>
              @endforeach
            <!-- End: list_row -->
            </tbody>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Tilulo</th>
                <th>Vistas</th>
                <!-- <th>Calificacion</th> -->
                
              </tr>
            </tfoot>
          </table>

<center>{{ $items->appends(Input::except('page'))->links() }}</center>
<label class="col-sm-12 control-label text-left text-primary" >{{ 'Mostrando del '.$items->appends(Input::except('page'))->getFrom().' a '.$items->appends(Input::except('page'))->getTo().' (Total: '.$items->appends(Input::except('page'))->getTotal().' Resultados)' }} </label><br>
</div>



<script type="text/javascript">
/**
 * [.fancybox-buttons description: galeria con url]
 * @type {String}
 */

jQuery(document).ready(function($) {


$('.fancybox-media')
  .attr('rel', 'media-gallery')
  .fancybox({
    openEffect : 'elastic',
    closeEffect : 'elastic',

    prevEffect : 'fade',
    nextEffect : 'fade',

    closeBtn  : false,
    openSpeed : 'slow',

    arrows : false,
    helpers : {
      media : {},
      buttons : {},
      title : {
        type : 'inside',
        position: 'top'
      },
      overlay : {
          showEarly : false
      }
    },
    overlay : {
        css : {
            'background' : 'rgba(58, 62, 75, 0.75)'
        }
    }
  });

/**
 * [.fancybox-buttons description: galeria con embebidos]
 * @type {String}
 */
$('.fancybox-buttons').fancybox({
  openEffect  : 'elastic',
  closeEffect : 'elastic',

  prevEffect : 'fade',
  nextEffect : 'fade',

  closeBtn  : false,
  openSpeed : 'slow',
  helpers : {
    title : {
      type : 'inside',
      position: 'top'
    },
    overlay : {
            showEarly : false
        },
    buttons : {}
  },

  // afterLoad : function() {
  //  this.title = 'Video ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
  // },
  overlay : {
        css : {
            'background' : 'rgba(58, 62, 75, 0.75)'
        }
    }
});

</script>
</body>
</html>