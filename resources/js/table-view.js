new DataTable('#example', {
    responsive: true,
    columnDefs: [
        // { orderable: false, targets: 0 },
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 },
    ]
});