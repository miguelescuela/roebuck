$(function() {

    Morris.Bar({
	  element: 'morris-area-chart',
	  data: [
		{ y: '2006', a: 100, b: 90 },
		{ y: '2007', a: 75,  b: 65 },
		{ y: '2008', a: 50,  b: 40 },
		{ y: '2009', a: 75,  b: 65 },
		{ y: '2010', a: 50,  b: 40 },
		{ y: '2011', a: 75,  b: 65 },
		{ y: '2012', a: 100, b: 90 }
	  ],
	  xkey: 'y',
	  ykeys: ['a', 'b'],
	  labels: ['Series A', 'Series B']
	});
	/*
    Morris.Donut({
        element: 'donut-chart_carga',
        data: [
			{
				label: "Persona 1",
				value: 12
			}, 
			{
				label: "Persona 2",
				value: 30
			}, 
			{
				label: "Persona 3",
				value: 7
			}, 
			{
				label: "Persona 4",
				value: 13
			}, 
			{
				label: "Persona 5",
				value: 17
			}, 
			{
				label: "Persona 6",
				value: 10
			}, 
			{
				label: "Persona 7",
				value: 11
			}
		],
        resize: true
    });*/

    /*Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });*/
    
});
