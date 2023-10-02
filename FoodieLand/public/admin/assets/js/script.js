//barchart
        var options = {
            series: [{
            data: [10, 8, 6, 4, 2]
          }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar:{
                show:false
            },
          },
          colors : [
              "#246dec",
              "#cc3c43",
              "#367952",
              "#f5b74f",
              "#4f35a1"
          ],
          plotOptions: {
            bar: {
              distributed: true,
              borderRadius: 4,
              horizontal: false,
              columnWidth: '40%'
            }
          },
          dataLabels: {
            enabled: false
          },
          legend:{
            show: false
          },
          xaxis: {
            categories: ['Turkey Burgers', 'Pepperoni Pizza', 'Margherita Pizza', 'Red velvet Cake', 'Chicken Momo'
            ],
          },
          yaxis: {
            title:{
                text:"Count"
            }
            
          }
          };
  
          var barChart = new ApexCharts(document.querySelector("#bar-chart"), options);
          barChart.render();
        
        
//linechart

      
var options = {
    series: [{
    name: 'Sales orders',
    type: 'area',
    data: [44, 50, 38, 33, 44, 47]
  }],
    chart: {
    height: 350,
    type: 'area',
    toolbar:{
        show:false
    }, 
  },
  color:["#4f35a1", "#246dec"],
  dataLabels:{
    enabled:true,
  },
  stroke: {
    curve: 'smooth'
  },
  fill: {
    type:'solid',
    opacity: [0.35, 1],
  },
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
  markers: {
    size: 0
  },
  yaxis: [
    {
      title: {
        text: 'Sales orders',
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
  }
  };

  var areaChart = new ApexCharts(document.querySelector("#area-chart"), options);
  areaChart.render();