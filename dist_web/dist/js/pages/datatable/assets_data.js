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
					columns: [0, 2, 3, 4, 5, 6],
				},
			},
			{
				extend: "csv",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 2, 3, 4, 5, 6],
				},
			},
			{
				extend: "excel",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 2, 3, 4, 5, 6],
				},
			},
			{
				extend: "pdf",
				className: "btn btn-secondary btn-sm",
				// orientation: "landscape",
				pageSize: "A4",
				// alignment: "center",
				exportOptions: {
					columns: [0, 2, 3, 4, 5, 6],
				},
				// customize: function (doc) {
				// 	doc.content[1].table.widths = Array(
				// 		doc.content[1].table.body[0].length + 1
				// 	)
				// 		.join("*")
				// 		.split("");
				// },
				customize: function (doc) {
					// doc.styles.tableHeader.alignment = "left"; //giustifica a sinistra titoli colonne
					doc.content[1].table.widths = [20, 90, 90, 90, 90, 90]; //costringe le colonne ad occupare un dato spazio per gestire il baco del 100% width che non si concretizza mai
				},
			},
			{
				extend: "print",
				className: "btn btn-secondary btn-sm",
				exportOptions: {
					columns: [0, 2, 3, 4, 5, 6],
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
				targets: $thead == 7 ? [] : [7],
			},
			{
				className: "wrap-max-10",
				targets: [0],
			},
			{
				className: "wrap-max-10",
				targets: [1],
			},
			{
				className: "wrap-max-15",
				targets: [2],
			},
			{
				className: "wrap-max-10",
				targets: [3],
			},
			{
				className: "wrap-max-15",
				targets: [4],
			},
			{
				className: "wrap-max-10",
				targets: [5],
			},
			{
				className: "wrap-max-10",
				targets: [6],
			},
			{
				className: "wrap-max-10 dt-nowrap",
				targets: [7],
			},
		],
		// ordering: true,
		// info: true,
		serverSide: true,
		responsive: true,
		// stateSave: true,
		scrollX: true,
		ajax: {
			url: site_url + "assets/listdata",
			type: "post",
			error: function (e) {
				console.log("data tidak ditemukan di server");
			},
			// success: function (data) {
			// 	console.log(data);
			// },
		},
		columns: [
			{
				data: "id",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
			},
			{
				data: "picture",
				render: (data, type, row) => {
					return (
						`<img src="` +
						site_url +
						`img_up/assets/${row.picture}" width="100" alt="">`
					);
				},
			},
			{
				data: "name",
				render: (data, type, row) => {
					return `<a href="` + site_url + `detail/${row.id}">${row.name}</a>`;
				},
			},
			{ data: "serial_number" },
			{
				data: "price",
				render: (data, type, row) => {
					return formatRupiah(row.price, "Rp");
				},
			},
			{ data: "supplier_name" },
			{
				data: "status",
				render: (data, type, row) => {
					return (
						`<span class="badge ` +
						status_badge(row.status) +
						`">${row.status}</span>`
					);
				},
			},
			// { data: "action" },
			{
				data: "action",
				render: (data, type, row) => {
					return (
						`
						<a class="btn btn-warning btn-sm" href="` +
						site_url +
						`assets/form/${row.id}"><i class="mdi mdi-lead-pencil"></i> Edit</a>
						<a class="btn btn-secondary btn-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="del(\'` +
						site_url +
						`assets/delete/${row.id} \')"><i class="mdi mdi-delete"></i> Delete</a>
						`
					);
				},
			},
		],
	});
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
	var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix + rupiah;
	// return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function status_badge(data) {
	return data == "Ready"
		? "bg-success"
		: data == "Lent"
		? "bg-primary"
		: data == "Broken"
		? "bg-danger"
		: data == "Lost"
		? "bg-secondary"
		: "bg-info";
}
