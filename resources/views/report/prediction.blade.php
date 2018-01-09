

@extends('master')
@section('title', 'Prediction Next Month')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"><strong>Prediction Next Month (in %)</strong></h1>
                    <div class="form-group prediction-center">
                      <input type="number" checked="form" id="margin">
                    </div>
                    <button class="btn btn-info btn-raised prediction-btn" id="calculate">Calculate</button>
                    


                    <h3 id="message"></h3>
                    <p id="final"></p>
                    <p>
                     
                    </p>
                    <div id="chart_container">
                      <canvas id="prediction" height="150"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>


<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    $(function(){
      
      //based on: http://jsfiddle.net/TGd96/

var volume = { 

    init: function(){
        $('#volume').on('click', volume.change);
        $('#volume .control').on('mousedown', volume.drag);
    },
      
    change: function(e){
        e.preventDefault();
        var percent = helper.getFrac(e, $(this)) * 100;
        $('#volume .control').animate({ width: percent+'%' }, 100);
        volume.update(percent);
    },
  
    update: function(percent){
      $('.vol-box').text(Math.round(percent));
      //console.log(percent);
    },

    drag: function(e){
        e.preventDefault();
        $(document).on('mousemove', volume.moveHandler);
        $(document).on('mouseup', volume.stopHandler);
    },

    moveHandler: function(e){
        var holderOffset = $('#volume').offset().left,
            sliderWidth = $('#volume').width(),
            posX = Math.min(Math.max(0, e.pageX - holderOffset), sliderWidth);

        $('#volume .control').width(posX);
        volume.update(posX / sliderWidth * 100);
    },

    stopHandler: function(){
        $(document).off('mousemove', volume.moveHandler);
        $(document).off('mouseup', volume.stopHandler);
    }
  
}

var helper = {
    getFrac: function(e, $this){
        return ( e.pageX - $this.offset().left ) / $this.width();
    }
}

volume.init();



      $.getJSON("/report/sales", function (result) {
        
        // Get input from val

        $('#calculate').click(function(){

          var labels = [],data=[];


          for (var i = 0; i < result.length; i++) {
              labels.push(result[i].month);
              data.push(result[i].sum);
          }


          var resultLast = result[result.length-1].sum;
          var resultLast2 = result[result.length-2].sum;

          // var resultLast = 10
          // var resultLast2 = 20

          console.log("Sales last month " + resultLast);
          console.log("Sales last 2 month " + resultLast2);

          var different = resultLast- resultLast2;
          console.log("Different between 2 month " + different);

          //reset
          var resetCanvas = function(){
              $('#prediction').remove();
              $('#chart_container').append('<canvas id="prediction" height="150"></canvas>');
              console.log("In resetcanvas function");
          }
          resetCanvas();



          var percentage = $('#margin').val().replace("%","");
          console.log(percentage);

          var final = 0;
          var msg = "";
          
          if (different < 0) {
            final = resultLast2;
            msg = "You're losing";
            console.log("Loss");
          
          }else{
            final = (resultLast * percentage/100 ) + resultLast;
            msg = "You're doing great";
            console.log("Profit boys");
          }
          

          final = final.toFixed(2);
          console.log(final);

          //Insert new data into array
          labels.push("next month");
          data.push(final);

          //Change Text
          $('#message').text(msg);
          $('#final').text("Target Next Month: RM " + final);


          //Draw Graph
          var buyerData = {
            labels : labels,
            datasets : [
              {
                label: "Sales Per Month",
                data : data,
                backgroundColor: [
                      "#FFCE56"
                  ]
              }
            ]
          };
          var buyers = document.getElementById('prediction').getContext('2d');
          
          var myLineChart = new Chart(buyers, {
              type: 'line',
              data: buyerData,
              options: {
                showAllTooltips: true
              }

          });
        });


        

      });
    });
</script>


@endsection