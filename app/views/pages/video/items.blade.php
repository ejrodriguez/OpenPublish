<!DOCTYPE html>
<html>
<head>
<!-- Add jQuery library -->
<!-- <script type="text/javascript" src="plugins/fancyapps/lib/jquery-1.10.1.min.js"></script> -->
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="plugins/fancyapps/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="plugins/fancyapps/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="plugins/fancyapps/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="plugins/fancyapps/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="plugins/fancyapps/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="plugins/fancyapps/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="plugins/fancyapps/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="plugins/fancyapps/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


</head>
<body>
<div id="simple_gallery" class="box-content">   
  @foreach ($items as $item)
      <a class="fancybox-media" href="{{ $item->videourl }}" title="Calificacion: {{ $item->rate }} - Visto:  {{ $item->times_viewed }}"><img src="{{ $item->thumburl }}" width="240px" height="137px" alt="" /></a>
      <!-- <a class="fancybox-buttons fancybox.iframe" data-fancybox-group="button" href="{{ $item->videourl }}" title="{{ $item->title }}"><img src="{{ $item->thumburl }}" width="240px" height="137px" alt="" /></a> -->
  @endforeach
<center>{{ $items->appends(Input::except('page'))->links() }}</center>
<label class="col-sm-12 control-label text-left text-primary" >{{ 'Mostrando del '.$items->appends(Input::except('page'))->getFrom().' a '.$items->appends(Input::except('page'))->getTo().' (Total: '.$items->appends(Input::except('page'))->getTotal().' Resultados)' }} </label><br>
</div>



<script type="text/javascript">
/**
 * [.fancybox-buttons description: galeria con url]
 * @type {String}
 */
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