<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    $(function(){
      $.getJSON("/report/paid", function (result) {
        var labels = [],data=[];
        for (var i = 0; i < result.length; i++) {
            labels.push(result[i].status);
            data.push(result[i].value);
            console.log(i);
            console.log("status " + result[i].status);
            console.log("value " + result[i].value)
        }
        var buyerData = {
          labels : labels,
          datasets : [
            {
              data : data,
              backgroundColor: [
                    "#FF6384",
                    "#4BC0C0",
                    "#FFCE56"
                ]
            }
          ]
        };
        var buyers = document.getElementById('paid').getContext('2d');
        
        var myLineChart = new Chart(buyers, {
            type: 'pie',
            data: buyerData
        });
      });
    });
</script>