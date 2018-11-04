$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2014 Q1',
            certificados: 266,
            inspeccion: null,
            edificacion: 264
        }, {
            period: '2014 Q2',
            certificados: 277,
            inspeccion: 229,
            edificacion: 244
        }, {
            period: '2014 Q3',
            certificados: 491,
            inspeccion: 196,
            edificacion: 250
        }, {
            period: '2014 Q4',
            certificados: 376,
            inspeccion: 359,
            edificacion: 568
        }, {
            period: '2015 Q1',
            certificados: 681,
            inspeccion: 191,
            edificacion: 229
        }, {
            period: '2015 Q2',
            certificados: 567,
            inspeccion: 429,
            edificacion: 188
        }, {
            period: '2015 Q3',
            certificados: 482,
            inspeccion: 379,
            edificacion: 158
        }, {
            period: '2015 Q4',
            certificados: 705,
            inspeccion: 596,
            edificacion: 517
        }, {
            period: '2016 Q1',
            certificados: 655,
            inspeccion: 446,
            edificacion: 202
        }, {
            period: '2016 Q2',
            certificados: 843,
            inspeccion: 571,
            edificacion: 179
        }],
        xkey: 'period',
        ykeys: ['certificados', 'inspeccion', 'edificacion'],
        labels: ['Certificados', 'Inspección', 'Edificación'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
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
