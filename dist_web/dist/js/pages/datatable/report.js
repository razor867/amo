$(document).ready(function () {
	var page = "lent";

	display_datatable(page);

	const lent = document.getElementById("lent");
	const returned = document.getElementById("returned");
	const broken = document.getElementById("broken");
	const repair = document.getElementById("repair");
	const repaired = document.getElementById("repaired");
	const lost = document.getElementById("lost");

	const lent_card = document.getElementById("lent_card");
	const returned_card = document.getElementById("returned_card");
	const broken_card = document.getElementById("broken_card");
	const repair_card = document.getElementById("repair_card");
	const repaired_card = document.getElementById("repaired_card");
	const lost_card = document.getElementById("lost_card");

	lent.addEventListener("click", function () {
		reset_card();
		this.classList.add("active");
		lent_card.classList.remove("d-none");
		lent_card.classList.add("d-block");
		page = "lent";
		display_datatable(page);
	});

	returned.addEventListener("click", function () {
		reset_card();
		this.classList.add("active");
		returned_card.classList.remove("d-none");
		returned_card.classList.add("d-block");
		page = "returned";
		display_datatable(page);
	});

	broken.addEventListener("click", function () {
		reset_card();
		this.classList.add("active");
		broken_card.classList.remove("d-none");
		broken_card.classList.add("d-block");
		page = "broken";
		display_datatable(page);
	});

	repair.addEventListener("click", function () {
		reset_card();
		this.classList.add("active");
		repair_card.classList.remove("d-none");
		repair_card.classList.add("d-block");
		page = "repair";
		display_datatable(page);
	});

	repaired.addEventListener("click", function () {
		reset_card();
		this.classList.add("active");
		repaired_card.classList.remove("d-none");
		repaired_card.classList.add("d-block");
		page = "repaired";
		display_datatable(page);
	});

	lost.addEventListener("click", function () {
		reset_card();
		this.classList.add("active");
		lost_card.classList.remove("d-none");
		lost_card.classList.add("d-block");
		page = "lost";
		display_datatable(page);
	});
});

function reset_card() {
	lent.classList.remove("active");
	returned.classList.remove("active");
	broken.classList.remove("active");
	repair.classList.remove("active");
	repaired.classList.remove("active");
	lost.classList.remove("active");

	lent_card.classList.remove("d-block");
	returned_card.classList.remove("d-block");
	broken_card.classList.remove("d-block");
	repair_card.classList.remove("d-block");
	repaired_card.classList.remove("d-block");
	lost_card.classList.remove("d-block");

	lent_card.classList.add("d-none");
	returned_card.classList.add("d-none");
	broken_card.classList.add("d-none");
	repair_card.classList.add("d-none");
	repaired_card.classList.add("d-none");
	lost_card.classList.add("d-none");
}

var show_lent = true;
var show_returned = true;
var show_broken = true;
var show_repair = true;
var show_repaired = true;
var show_lost = true;

function display_datatable(page) {
	const $thead = $("thead tr th").length;
	if (page == "lent") {
		document.title = "Report Lent Asset";
		if (show_lent) {
			$("#tableLent").DataTable({
				dom: "Bfrtip",
				buttons: [
					{
						extend: "copy",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
					},
					{
						extend: "csv",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
					},
					{
						extend: "excel",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
					},
					{
						extend: "pdf",
						className: "btn btn-secondary btn-sm",
						// orientation: "landscape",
						pageSize: "A4",
						// alignment: "center",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
						// customize: function (doc) {
						// 	doc.content[1].table.widths = Array(
						// 		doc.content[1].table.body[0].length + 1
						// 	)
						// 		.join("*")
						// 		.split("");
						// },
					},
					{
						extend: "print",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
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
					{
						className: "wrap-max-10",
						targets: [0],
					},
					{
						className: "wrap-max-20",
						targets: [1],
					},
					{
						className: "wrap-max-20",
						targets: [2],
					},
					{
						className: "wrap-max-15",
						targets: [3],
					},
					{
						className: "wrap-max-15",
						targets: [4],
					},
					{
						className: "wrap-max-20",
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
					url: site_url + "report/listdata_lent",
					type: "post",
					error: function (e) {
						console.log("data tidak ditemukan di server");
					},
					// success: function (data) {
					//   console.log(data);
					// },
				},
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
					},
					{ data: "asset_name" },
					{ data: "borrower" },
					// {
					// 	data: "borrower",
					// 	render: (data, type, row) => {
					// 		return get_Department(row.borrower);
					// 	},
					// },
					{ data: "date_lent" },
					{ data: "date_lent_returned" },
					{ data: "note_lent" },
				],
			});
		}
		show_lent = false;
	} else if (page == "returned") {
		document.title = "Report Returned Asset";
		if (show_returned) {
			$("#tableReturned").DataTable({
				dom: "Bfrtip",
				buttons: [
					{
						extend: "copy",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
					},
					{
						extend: "csv",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
					},
					{
						extend: "excel",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
					},
					{
						extend: "pdf",
						className: "btn btn-secondary btn-sm",
						// orientation: "landscape",
						pageSize: "A4",
						// alignment: "center",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
						},
						// customize: function (doc) {
						// 	doc.content[1].table.widths = Array(
						// 		doc.content[1].table.body[0].length + 1
						// 	)
						// 		.join("*")
						// 		.split("");
						// },
					},
					{
						extend: "print",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
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
					{
						className: "wrap-max-10",
						targets: [0],
					},
					{
						className: "wrap-max-20",
						targets: [1],
					},
					{
						className: "wrap-max-20",
						targets: [2],
					},
					{
						className: "wrap-max-15",
						targets: [3],
					},
					{
						className: "wrap-max-15",
						targets: [4],
					},
					{
						className: "wrap-max-20",
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
					url: site_url + "report/listdata_returned",
					type: "post",
					error: function (e) {
						console.log("data tidak ditemukan di server");
					},
					// success: function (data) {
					//   console.log(data);
					// },
				},
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
					},
					{ data: "asset_name" },
					{ data: "borrower" },
					// {
					// 	data: "borrower",
					// 	render: (data, type, row) => {
					// 		return get_Department(row.borrower);
					// 	},
					// },
					{ data: "date_returned" },
					{ data: "fine" },
					{ data: "note_returned" },
				],
			});
		}
		show_returned = false;
	} else if (page == "broken") {
		document.title = "Report Broken Asset";
		if (show_broken) {
			$("#tableBroken").DataTable({
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
						// extend: "pdfHtml5",
						className: "btn btn-secondary btn-sm",
						// orientation: "landscape",
						pageSize: "A4",
						// alignment: "center",
						exportOptions: {
							columns: [0, 1, 2, 3, 4],
						},
						// customize: function (doc) {
						// 	doc.content[1].table.widths = Array(
						// 		doc.content[1].table.body[0].length + 1
						// 	)
						// 		.join("*")
						// 		.split("");
						// },
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
						targets: $thead == 4 ? [] : [4],
					},
					{
						className: "wrap-max-10",
						targets: [0],
					},
					{
						className: "wrap-max-30",
						targets: [1],
					},
					{
						className: "wrap-max-20",
						targets: [2],
					},
					{
						className: "wrap-max-20",
						targets: [3],
					},
					{
						className: "wrap-max-20",
						targets: [4],
					},
				],
				// ordering: true,
				// info: true,
				serverSide: true,
				responsive: true,
				// stateSave: true,
				scrollX: true,
				ajax: {
					url: site_url + "report/listdata_broken",
					type: "post",
					error: function (e) {
						console.log("data tidak ditemukan di server");
					},
					// success: function (data) {
					//   console.log(data);
					// },
				},
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
					},
					{ data: "name" },
					{ data: "asset_code" },
					// {
					// 	data: "borrower",
					// 	render: (data, type, row) => {
					// 		return get_Department(row.borrower);
					// 	},
					// },
					{ data: "serial_number" },
					{ data: "date_purchase" },
				],
			});
		}
		show_broken = false;
	} else if (page == "repair") {
		document.title = "Report Repair Asset";
		if (show_repair) {
			$("#tableRepair").DataTable({
				dom: "Bfrtip",
				buttons: [
					{
						extend: "copy",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
					},
					{
						extend: "csv",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
					},
					{
						extend: "excel",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
					},
					{
						extend: "pdf",
						className: "btn btn-secondary btn-sm",
						// orientation: "landscape",
						pageSize: "A4",
						// alignment: "center",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
						// customize: function (doc) {
						// 	doc.content[1].table.widths = Array(
						// 		doc.content[1].table.body[0].length + 1
						// 	)
						// 		.join("*")
						// 		.split("");
						// },
					},
					{
						extend: "print",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
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
						targets: $thead == 4 ? [] : [4],
					},
					{
						className: "wrap-max-10",
						targets: [0],
					},
					{
						className: "wrap-max-20",
						targets: [1],
					},
					{
						className: "wrap-max-20",
						targets: [2],
					},
					{
						className: "wrap-max-10",
						targets: [3],
					},
					{
						className: "wrap-max-10",
						targets: [4],
					},
					{
						className: "wrap-max-10",
						targets: [5],
					},
					{
						className: "wrap-max-20",
						targets: [6],
					},
				],
				// ordering: true,
				// info: true,
				serverSide: true,
				responsive: true,
				// stateSave: true,
				scrollX: true,
				ajax: {
					url: site_url + "report/listdata_repair",
					type: "post",
					error: function (e) {
						console.log("data tidak ditemukan di server");
					},
					// success: function (data) {
					//   console.log(data);
					// },
				},
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
					},
					{ data: "asset_name" },
					{ data: "repair_by" },
					{ data: "start_repair" },
					{ data: "end_repair" },
					{ data: "cost" },
					{ data: "note_repair" },
				],
			});
		}
		show_repair = false;
	} else if (page == "repaired") {
		document.title = "Report Repaired Asset";
		if (show_repaired) {
			$("#tableRepaired").DataTable({
				dom: "Bfrtip",
				buttons: [
					{
						extend: "copy",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
					},
					{
						extend: "csv",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
					},
					{
						extend: "excel",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
					},
					{
						extend: "pdf",
						className: "btn btn-secondary btn-sm",
						// orientation: "landscape",
						pageSize: "A4",
						// alignment: "center",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
						},
						// customize: function (doc) {
						// 	doc.content[1].table.widths = Array(
						// 		doc.content[1].table.body[0].length + 1
						// 	)
						// 		.join("*")
						// 		.split("");
						// },
					},
					{
						extend: "print",
						className: "btn btn-secondary btn-sm",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
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
						targets: $thead == 4 ? [] : [4],
					},
					{
						className: "wrap-max-10",
						targets: [0],
					},
					{
						className: "wrap-max-20",
						targets: [1],
					},
					{
						className: "wrap-max-20",
						targets: [2],
					},
					{
						className: "wrap-max-10",
						targets: [3],
					},
					{
						className: "wrap-max-10",
						targets: [4],
					},
					{
						className: "wrap-max-10",
						targets: [5],
					},
					{
						className: "wrap-max-20",
						targets: [6],
					},
				],
				// ordering: true,
				// info: true,
				serverSide: true,
				responsive: true,
				// stateSave: true,
				scrollX: true,
				ajax: {
					url: site_url + "report/listdata_repaired",
					type: "post",
					error: function (e) {
						console.log("data tidak ditemukan di server");
					},
					// success: function (data) {
					//   console.log(data);
					// },
				},
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
					},
					{ data: "asset_name" },
					{ data: "repair_by" },
					{ data: "start_repair" },
					{ data: "end_repair" },
					{ data: "cost" },
					{ data: "note_repair" },
				],
			});
		}
		show_repaired = false;
	} else if (page == "lost") {
		document.title = "Report Lost Asset";
		if (show_lost) {
			$("#tableLost").DataTable({
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
						// customize: function (doc) {
						// 	doc.content[1].table.widths = Array(
						// 		doc.content[1].table.body[0].length + 1
						// 	)
						// 		.join("*")
						// 		.split("");
						// },
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
						targets: $thead == 4 ? [] : [4],
					},
					{
						className: "wrap-max-10",
						targets: [0],
					},
					{
						className: "wrap-max-30",
						targets: [1],
					},
					{
						className: "wrap-max-20",
						targets: [2],
					},
					{
						className: "wrap-max-20",
						targets: [3],
					},
					{
						className: "wrap-max-20",
						targets: [4],
					},
				],
				// ordering: true,
				// info: true,
				serverSide: true,
				responsive: true,
				// stateSave: true,
				scrollX: true,
				ajax: {
					url: site_url + "report/listdata_lost",
					type: "post",
					error: function (e) {
						console.log("data tidak ditemukan di server");
					},
					// success: function (data) {
					//   console.log(data);
					// },
				},
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						},
					},
					{ data: "name" },
					{ data: "asset_code" },
					// {
					// 	data: "borrower",
					// 	render: (data, type, row) => {
					// 		return get_Department(row.borrower);
					// 	},
					// },
					{ data: "serial_number" },
					{ data: "date_purchase" },
				],
			});
		}
		show_lost = false;
	}
}
