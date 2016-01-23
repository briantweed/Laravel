
$.fn.onScreen = function()
{
   if( !$(this).length ) return false;
   else return $(window).scrollTop() + $(window).height() >= $(this).offset().top + 100;
}

CanvasJS.addColorSet('cert', ['#6bc954', '#158b1a', '#e6dd19', '#d9a125', '#c1277e', '#d43030', '#460000']);

var runRating = true,
    runDecade = true,
    runCertif = true,
    runFormat = true;

$(document).resize(function(event) {
   $('#actor-slidee, #director-slidee').sly('reload');
});

$(document).scroll(function(){
   displayCharts();
});

$(document).ready(function() {


   $('#decadeSelectFilter').change(function() {
      var selected = $(this).val();
      if(selected !== 'all')
      {
         var start = parseInt(selected);
         var end = start + 9;
         displayMoviesByYear(start, end);
      }
      else
      {
         runDecade = true;
         displayMoviesByDecade();
      }
   });

   $('.slick-purchased').slick({
      speed: 800,
      dots: false,
      arrows: false,
      autoplay: true,
      infinite: true,
      slidesToShow: 8,
      slidesToScroll: 1,
      swipeToSlide: true,
      pauseOnHover: true,
      autoplaySpeed: 3000,
      responsive: [
         {breakpoint: 1200, settings: {slidesToShow: 6}},
         {breakpoint: 992, settings: {slidesToShow: 5}},
         {breakpoint: 768, settings: {slidesToShow: 4}},
         {breakpoint: 400, settings: {slidesToShow: 2}},
      ]
   }).hide().removeClass('hide').fadeIn();

   $('#actor-slidee').sly({
      speed : 560,
      dragHandle : 1,
      horizontal : 1,
      releaseSwing : 1,
      itemNav : 'basic',
      touchDragging : 1,
      mouseDragging : 1,
      activateOn : 'click',
      activatePageOn : 'click',
      pagesBar : '#actor-pages',
      dragSource : '#actor-slidee',
      pageBuilder : function (index) {
         return '<li>' + (index + 1) + '</li>';
      }
   });

   $('#director-slidee').sly({
      speed : 600,
      dragHandle : 1,
      horizontal : 1,
      releaseSwing : 1,
      mouseDragging : 1,
      touchDragging : 1,
      itemNav : 'basic',
      activateOn : 'click',
      activatePageOn : 'click',
      pagesBar : '#director-pages',
      dragSource : '#director-slidee',
      pageBuilder : function (index) {
         return '<li>' + (index + 1) + '</li>';
      }
   });

   displayCharts();

});

function displayCharts() {
   if( $('#ratingChart').onScreen() ) displayMoviesByRating();
   if( $('#yearChart').onScreen() )   displayMoviesByDecade();
   if( $('#formatChart').onScreen() ) displayMoviesByFormat();
   if( $('#certificateChart').onScreen() ) displayMoviesByCertificate();
}

function displayMoviesByDecade() {
   if(runDecade === true) {
      $.ajax({
         beforeSend: function() {
            runDecade = false
         },
         type: 'POST',
         url: '/MyMDb/public/movieDecadeCount',
         data: {
            _token: $('meta[name="_token"]').attr('content')
         }
      }).done(function(json) {
         var chart = new CanvasJS.Chart('yearChart', {
            axisY:{
               gridColor: '#ddd',
               gridThickness: 1
            },
            animationEnabled: true,
            animationDuration: 1500,
            toolTip: {
               enabled: false
                  // contentFormatter: function(event) {
                  //    var str = '';
                  //    for (var i = 0; i < event.entries.length; i++)
                  //    {
                  //       str =  event.entries[i].dataPoint.label + ': ';
                  //       str += event.entries[i].dataPoint.y == 1 ? '1 movie' : event.entries[i].dataPoint.y + ' movies';
                  //       return (str);
                  //    }
                  // }
            },
            data: [{
               type: 'column',
               dataPoints: json,
               indexLabelPlacement: "outside",
               indexLabelOrientation: "horizontal",
               indexLabel: "{y}",
               click: function(event) {
                  // displayMoviesByYear(event.dataPoint.label, event.dataPoint.label+9);
               }
            }]
         });
         chart.render();
      });
   }
}

function displayMoviesByYear(start, end) {
   $.ajax({
      type: 'POST',
      url: '/MyMDb/public/movieYearCount',
      data: {
         _token: $('meta[name="_token"]').attr('content'),
         start: start,
         end: end
      }
   }).done(function(json) {
      $('#movies-by-label').html('Movies By Year');
      var chart = new CanvasJS.Chart('yearChart', {
         axisY:{
            gridColor: '#ddd',
            gridThickness: 1,
            interval: json.interval
         },
         animationEnabled: true,
         animationDuration: 1500,
         toolTip: {
            enabled: false
            // contentFormatter: function(event) {
            //    var str = '';
            //    for (var i = 0; i < event.entries.length; i++)
            //    {
            //       str = event.entries[i].dataPoint.label + ': ';
            //       str += event.entries[i].dataPoint.y == 1 ? '1 movie' : event.entries[i].dataPoint.y + ' movies';
            //       return (str);
            //    }
            // }
         },
         data: [{
            type: 'column',
            dataPoints: json.years,
            indexLabelPlacement: "outside",
            indexLabelOrientation: "horizontal",
            indexLabel: "{y}",
            click: function(event) {
               // startFilter('year', event.dataPoint.label);
            },
         }]
      });
      chart.render();
   });
}

function displayMoviesByFormat() {
   if(runFormat === true) {
      $.ajax({
         beforeSend: function() {
            runFormat = false
         },
         type: 'POST',
         url: '/MyMDb/public/movieFormatCount',
         data: {
            _token: $('meta[name="_token"]').attr('content')
         }
      }).done(function(json) {
         var chart = new CanvasJS.Chart('formatChart', {
            toolTip: {
               contentFormatter: function(event) {
                  var str = '';
                  for (var i = 0; i < event.entries.length; i++)
                  {
                     str = event.entries[i].dataPoint.y ==1 ? '1 movie' : event.entries[i].dataPoint.y + ' movies';
                     return (str);
                  }
               }
            },
            animationEnabled: true,
            data: [{
               type: 'doughnut',
               dataPoints: json,
               click: function(event) {
                  // startFilter('format', event.dataPoint.label);
               },
            }]
         });
         chart.render();
      });
   }
}

function displayMoviesByCertificate() {
   if(runCertif === true) {
      $.ajax({
         beforeSend: function() {
            runCertif = false
         },
         type: 'POST',
         url: '/MyMDb/public/movieCertificateCount',
         data: {
            _token: $('meta[name="_token"]').attr('content')
         }
      }).done(function(json) {
         var chart = new CanvasJS.Chart('certificateChart', {
            colorSet: 'cert',
            animationEnabled: true,
            toolTip: {
               contentFormatter: function(event) {
                  var str = '';
                  for (var i = 0; i < event.entries.length; i++){
                     str = event.entries[i].dataPoint.y ==1 ? '1 movie' : event.entries[i].dataPoint.y + ' movies';
                     return (str);
                  }
               }
            },
            data: [{
               type: 'doughnut',
               startAngle:  270,
               dataPoints: json,
               click: function(event){
                  // startFilter('certificate', event.dataPoint.id);
               },
            }]
         });
         chart.render();
      });
   }
}

function displayMoviesByRating() {
   if(runRating === true)
   {
      $.ajax({
         beforeSend: function(){
            runRating = false
         },
         type: 'POST',
         url: '/MyMDb/public/movieRatingCount',
         data: {
            _token: $('meta[name="_token"]').attr('content')
         }
      }).done(function(json) {
         var chart = new CanvasJS.Chart('ratingChart', {
            axisY:{
               gridColor: '#ddd',
               gridThickness: 1,
               interval: 10
            },
            animationEnabled: true,
            animationDuration: 1500,
            toolTip: {
               contentFormatter: function(event) {
                  var str = '';
                  for (var i = 0; i < event.entries.length; i++){
                     str = event.entries[i].dataPoint.y ==1 ? '1 movie' : event.entries[i].dataPoint.y + ' movies';
                     return (str);
                  }
               }
            },
            data: [{
               type: 'column',
               startAngle:  270,
               dataPoints: json,
               click: function(event){
                  // startFilter('rating', event.dataPoint.id);
               },
            }]
         });
         chart.render();
      });
   }
}
