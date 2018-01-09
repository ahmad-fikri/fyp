
<script type="text/javascript">
    $(function(){
      $.getJSON("/report/sales", function (result) {
        var labels = [],data=[];
        for (var i = 0; i < result.length; i++) {
            labels.push(result[i].month);
            data.push(result[i].sum);
            console.log(i);
            console.log("month" + result[i].month);
            console.log("sum " + result[i].sum)
        }
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
        var buyers = document.getElementById('sales').getContext('2d');
        
        var myLineChart = new Chart(buyers, {
            type: 'line',
            data: buyerData,
            options: {
            }
        });
      });
    });
</script>