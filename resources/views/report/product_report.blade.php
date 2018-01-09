
<script type="text/javascript">
    $(function(){
      $.getJSON("/report/product", function (result) {
        var labels = [],data=[];
        for (var i = 0; i < result.length; i++) {
            labels.push(result[i].size);
            data.push(result[i].sum);
            console.log(i);
            console.log("status " + result[i].size);
            console.log("value " + result[i].sum)
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
        var buyers = document.getElementById('product').getContext('2d');
        
        var myLineChart = new Chart(buyers, {
            type: 'bar',
            data: buyerData,
            options: {
              legend: {
                display: false
              }
            }
        });
      });
    });
</script>