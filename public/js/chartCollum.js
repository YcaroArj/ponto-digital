window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Horas Extras"
        },
          axisY: {
          includeZero: true
        },
        data: [{
            type: "column", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#5A5757",
              indexLabelFontSize: 16,
            indexLabelPlacement: "outside",
            dataPoints: [
                { x: 1, y: 2 },
                { x: 3, y: 1 },
                { x: 4, y: 0 },
                { x: 5, y: 2 },
                { x: 7, y: 3, indexLabel: "\u2605 Dia com mais Horas extras!" },
                { x: 8, y: 1 },
                { x: 9, y: 0 },
                { x: 10, y: 1 },
                { x: 11, y: 0 },
                { x: 13, y: 2 },
                { x: 14, y: 1 },
                { x: 15, y: 0 },
                { x: 16, y: 0}
            ]
        }]
    });
    chart.render();

    }
