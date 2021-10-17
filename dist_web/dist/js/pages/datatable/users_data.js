$(document).ready(function () {
	const $thead = $("thead tr th").length;
	// $("#tabledata").DataTable();

	$("#tabledata").DataTable({
		// dom: "Bfrtip",
		// buttons: [
		// 	{
		// 		extend: "copy",
		// 		className: "btn btn-secondary btn-sm",
		// 		exportOptions: {
		// 			columns: [0, 1],
		// 		},
		// 	},
		// 	{
		// 		extend: "csv",
		// 		className: "btn btn-secondary btn-sm",
		// 		exportOptions: {
		// 			columns: [0, 1],
		// 		},
		// 	},
		// 	{
		// 		extend: "excel",
		// 		className: "btn btn-secondary btn-sm",
		// 		exportOptions: {
		// 			columns: [0, 1],
		// 		},
		// 	},
		// 	{
		// 		extend: "pdf",
		// 		className: "btn btn-secondary btn-sm",
		// 		// orientation: "landscape",
		// 		pageSize: "A4",
		// 		// alignment: "center",
		// 		exportOptions: {
		// 			columns: [0, 1],
		// 		},
		// 		customize: function (doc) {
		// 			doc.content[1].table.widths = Array(
		// 				doc.content[1].table.body[0].length + 1
		// 			)
		// 				.join("*")
		// 				.split("");
		// 		},
		// 	},
		// 	{
		// 		extend: "print",
		// 		className: "btn btn-secondary btn-sm",
		// 		exportOptions: {
		// 			columns: [0, 1],
		// 		},
		// 	},
		// ],
		processing: true,
		oLanguage: {
			// sLengthMenu: "Tampilkan _MENU_ data per halaman",
			// sSearch: "Pencarian: ",
			// sZeroRecords: "Maaf, tidak ada data yang ditemukan",
			// sInfo: "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			// sInfoEmpty: "Menampilkan 0 s/d 0 dari 0 data",
			// sInfoFiltered: "(di filter dari _MAX_ total data)",
			// oPaginate: {
			//   sFirst: "<<",
			//   slast: ">>",
			//   sPrevious: "<",
			//   sNext: ">",
			// },
		},
		language: {
			search: "_INPUT_",
			searchPlaceholder: "Search...",
		},
		columnDefs: [
			{
				orderable: false,
				targets: $thead == 7 ? [] : [7],
			},
			// {
			// 	className: "wrap-max-50",
			// 	targets: [0],
			// },
			// {
			// 	className: "wrap-max-25",
			// 	targets: [1],
			// },
			// {
			// 	className: "wrap-max-15",
			// 	targets: [2],
			// },
			{
				className: "wrap-max-10 dt-nowrap",
				targets: [7],
			},
		],
		// ordering: true,
		// info: true,
		serverSide: false,
		responsive: true,
		// stateSave: true,
		scrollX: true,
		// ajax: {
		// 	url: site_url + "department/listdata",
		// 	type: "post",
		// 	error: function (e) {
		// 		console.log("data tidak ditemukan di server");
		// 	},
		// 	// success: function (data) {
		// 	//   console.log(data);
		// 	// },
		// },
		// columns: [
		// 	{ data: "name" },
		// 	{ data: "location_name" },
		// 	// { data: "action" },
		// 	{
		// 		data: "action",
		// 		render: (data, type, row) => {
		// 			return (
		// 				`
		// 				<a class="btn btn-warning btn-sm" href="` +
		// 				site_url +
		// 				`department/form/${row.id}"><i class="mdi mdi-lead-pencil"></i> Edit</a>
		// 				<a class="btn btn-secondary btn-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="del(\'` +
		// 				site_url +
		// 				`department/delete/${row.id} \')"><i class="mdi mdi-delete"></i> Delete</a>
		// 				`
		// 			);
		// 		},
		// 	},
		// ],
	});
});

function activated(url_activated, type) {
	$(".btn_yes").attr("href", url_activated);
	$(".modal-title").text("Information");
	if (type == "active") {
		$(".modal-body").html(`Disable this user?`);
	} else {
		$(".modal-body").html(`Enable this user?`);
	}
}
