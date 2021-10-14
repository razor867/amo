$(document).ready(function () {
	const $thead = $("thead tr th").length;
	// $("#tabledata").DataTable();

	$("#tabledata").DataTable({
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
			},
			{
				extend: "csv",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
			},
			{
				extend: "excel",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
			},
			{
				extend: "pdf",
				className: "btn btn-secondary btn-sm",
				// orientation: "landscape",
				pageSize: "A4",
				// alignment: "center",
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
				customize: function (doc) {
					doc.content[1].table.widths = Array(
						doc.content[1].table.body[0].length + 1
					)
						.join("*")
						.split("");
				},
			},
			{
				extend: "print",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 1, 2, 3, 4],
				},
			},
		],
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
				targets: $thead == 5 ? [] : [5],
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
				targets: [5],
			},
		],
		// ordering: true,
		// info: true,
		serverSide: true,
		responsive: true,
		// stateSave: true,
		scrollX: true,
		ajax: {
			url: site_url + "location/listdata",
			type: "post",
			error: function (e) {
				console.log("data tidak ditemukan di server");
			},
			// success: function (data) {
			//   console.log(data);
			// },
		},
		columns: [
			{ data: "name" },
			{ data: "state" },
			{ data: "province" },
			{ data: "district" },
			{ data: "postcode" },
			// { data: "action" },
			{
				data: "action",
				render: (data, type, row) => {
					return (
						`
						<a class="btn btn-warning btn-sm" href="` +
						site_url +
						`location/form/${row.id}"><i class="mdi mdi-lead-pencil"></i> Edit</a>
						<a class="btn btn-secondary btn-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="del(\'` +
						site_url +
						`location/delete/${row.id} \')"><i class="mdi mdi-delete"></i> Delete</a>
						`
					);
				},
			},
		],
	});
});

// function detail(id_data) {
// 	$.ajax({
// 		url: "/buku/detail",
// 		method: "post",
// 		dataType: "json",
// 		data: {
// 			id: id_data,
// 		},
// 		success: function (data) {
// 			let msg = "";
// 			if (data != "error") {
// 				msg +=
// 					detail_content("Penulis", data.penulis) +
// 					detail_content("Penerbit", data.penerbit) +
// 					detail_content("Jumlah Buku", data.jml_buku) +
// 					detail_content("Stok Tersedia", data.stok) +
// 					detail_content("Detail", data.deskripsi);

// 				$(".modal-title").text(data.judul);
// 				$(".modal-body").empty();
// 				$(".modal-body").append(msg);
// 				if (data.stok < 1) {
// 					$(".modal-footer").find(".pinjam").empty();
// 				} else {
// 					$(".modal-footer").find(".pinjam").empty();
// 					$(".modal-footer")
// 						.find(".pinjam")
// 						.append(
// 							'<a href="/buku/pinjam/' +
// 								data.id +
// 								"/" +
// 								"book" +
// 								'" class="btn btn-primary"><i class="fas fa-expand-alt"></i> Pinjam</a>'
// 						);
// 				}
// 				// console.log(data);
// 			} else {
// 				msg = "Data tidak ditemukan";
// 				$(".modal-title").text(msg);
// 				$(".modal-body").text(msg);
// 			}
// 		},
// 	});
// }

// function detail_content(label, data) {
// 	let content =
// 		'<div class="mb-3 row">' +
// 		'<div class="col-md-4"><span style="font-weight: 600;">' +
// 		label +
// 		" " +
// 		'<div class="float-end">:</div></span></div>' +
// 		'<div class="col-md-8">' +
// 		data +
// 		"</div>" +
// 		"</div>";
// 	return content;
// }
