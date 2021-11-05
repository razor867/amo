/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/

var lentJanuary = [],
	lentFebruary = [],
	lentMarch = [],
	lentApril = [],
	lentMay = [],
	lentJune = [],
	lentJuly = [],
	lentAugust = [],
	lentSeptember = [],
	lentOctober = [],
	lentNovember = [],
	lentDecember = [];

var returnedJanuary = [],
	returnedFebruary = [],
	returnedMarch = [],
	returnedApril = [],
	returnedMay = [],
	returnedJune = [],
	returnedJuly = [],
	returnedAugust = [],
	returnedSeptember = [],
	returnedOctober = [],
	returnedNovember = [],
	returnedDecember = [];

$(function () {
	"use strict";
	// ==============================================================
	// Newsletter
	// ==============================================================

	for (let i = 0; i < dataLent.length; i++) {
		const d = new Date();
		let month = dataLent[i].split("-");
		month = month[1];
		if (month == "01") {
			lentJanuary.push(dataLent[i]);
		} else if (month == "02") {
			lentFebruary.push(dataLent[i]);
		} else if (month == "03") {
			lentMarch.push(dataLent[i]);
		} else if (month == "04") {
			lentApril.push(dataLent[i]);
		} else if (month == "05") {
			lentMay.push(dataLent[i]);
		} else if (month == "06") {
			lentJune.push(dataLent[i]);
		} else if (month == "07") {
			lentJuly.push(dataLent[i]);
		} else if (month == "08") {
			lentAugust.push(dataLent[i]);
		} else if (month == "09") {
			lentSeptember.push(dataLent[i]);
		} else if (month == "10") {
			lentOctober.push(dataLent[i]);
		} else if (month == "11") {
			lentNovember.push(dataLent[i]);
		} else if (month == "12") {
			lentDecember.push(dataLent[i]);
		}
	}

	for (let i = 0; i < dataReturned.length; i++) {
		const d = new Date();
		let month = dataReturned[i].split("-");
		month = month[1];
		if (month == "01") {
			returnedJanuary.push(dataReturned[i]);
		} else if (month == "02") {
			returnedFebruary.push(dataReturned[i]);
		} else if (month == "03") {
			returnedMarch.push(dataReturned[i]);
		} else if (month == "04") {
			returnedApril.push(dataReturned[i]);
		} else if (month == "05") {
			returnedMay.push(dataReturned[i]);
		} else if (month == "06") {
			returnedJune.push(dataReturned[i]);
		} else if (month == "07") {
			returnedJuly.push(dataReturned[i]);
		} else if (month == "08") {
			returnedAugust.push(dataReturned[i]);
		} else if (month == "09") {
			returnedSeptember.push(dataReturned[i]);
		} else if (month == "10") {
			returnedOctober.push(dataReturned[i]);
		} else if (month == "11") {
			returnedNovember.push(dataReturned[i]);
		} else if (month == "12") {
			returnedDecember.push(dataReturned[i]);
		}
	}

	var chart2 = new Chartist.Bar(
		".amp-pxl",
		{
			labels: [
				"January",
				"February",
				"March",
				"April",
				"May",
				"June",
				"July",
				"August",
				"September",
				"October",
				"November",
				"December",
			],
			series: [
				[
					lentJanuary.length,
					lentFebruary.length,
					lentMarch.length,
					lentApril.length,
					lentMay.length,
					lentJune.length,
					lentJuly.length,
					lentAugust.length,
					lentSeptember.length,
					lentOctober.length,
					lentNovember.length,
					lentDecember.length,
				],
				[
					returnedJanuary.length,
					returnedFebruary.length,
					returnedMarch.length,
					returnedApril.length,
					returnedMay.length,
					returnedJune.length,
					returnedJuly.length,
					returnedAugust.length,
					returnedSeptember.length,
					returnedOctober.length,
					returnedNovember.length,
					returnedDecember.length,
				],
			],
		},
		{
			axisX: {
				// On the x-axis start means top and end means bottom
				position: "end",
				showGrid: true,
			},
			axisY: {
				// On the y-axis start means left and end means right
				position: "start",
			},
			high:
				dataLent.length > dataReturned.length
					? dataLent.length
					: dataReturned.length,
			low: "0",
			plugins: [Chartist.plugins.tooltip()],
		}
	);

	var chart = [chart2];
});
