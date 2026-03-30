<style>
    /* Compact and Themed Table Styling */
    .custom-theme-table {
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 6px;
        overflow: hidden;
    }
    
    .custom-theme-table thead th {
        background-color: var(--cf-dark-blue);
        color: var( --cf-dark-blue) !important;
        padding: 10px 12px; /* Compact padding */
        font-size: 0.85rem;
        font-weight: 500;
        border-bottom: none;
        letter-spacing: 0.5px;
    }

    .custom-theme-table tbody td {
        padding: 6px 12px; /* Compact padding */
        font-size: 0.85rem;
        vertical-align: middle;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .custom-theme-table tbody tr:hover td {
        background-color: rgba(84, 151, 206, 0.08); /* Soft hover using --cf-light-blue */
    }

    /* DataTable Overrides for Theme Match */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: var(--cf-dark-blue) !important;
        color: var( --cf-dark-blue) !important;
        border: 1px solid var(--cf-dark-blue);
        border-radius: 4px;
        padding: 4px 10px;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 4px;
        border: 1px solid #ddd;
        padding: 4px 8px;
    }
    
    .cf-btn-create {
        background-color: var(--cf-dark-blue);
        color: var(--cf-white);
        transition: background-color 0.3s;
    }
    .cf-btn-create:hover {
        background-color: var(--cf-light-blue);
        color: var(--cf-white);
    }
</style>

<div class="mt-4 mb-4 container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 fw-bold" style="color: var(--cf-dark-blue);">
            <i class="fas fa-users-cog me-2"></i>Agent Directory
        </h5>
        <button type="button" class="btn cf-btn-create btn-sm shadow-sm" id="btnCreateAgent">
            <i class="fas fa-plus-circle me-1"></i> Create New Agent
        </button>
    </div>

    <div class="card shadow-2-strong border-0" style="border-radius: 8px;">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table style="width: 100%;" id="datatable"
                    class="table custom-theme-table w-100">
                    <thead>
                        <tr>
                            <th>FNAME</th>
                            <th>LNAME</th>
                            <th>GENDER</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>PROVINCE</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // 1. Initialize DataTable
        const agentTable = $("#datatable").DataTable({
            responsive: true,
            pageLength: 10,
            paging: true,
            scrollX: false, // Let the table-responsive div handle overflow natively
            order: [],
            ajax: {
                url: `${url}/${control}/masterFetchAgents`,
                type: "POST",
            },
            columnDefs: [
                {
                    targets: [0],
                    orderable: true,
                },
                {
                    targets: [5], // Assuming 'Action' is the 6th column (index 5)
                    className: "text-center",
                    orderable: false
                }
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search agents..."
            }
        });

        // 2. Create Button Action Listener
        $("#btnCreateAgent").on("click", function() {
            // Add your logic to open a modal or redirect to a create form here
            console.log("Create Agent clicked");
            // Example: $("#createAgentModal").modal('show');
        });
    });
</script>