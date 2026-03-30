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
        /* color: var(--cf-white) !important; */
        padding: 10px 12px;
        font-size: 0.85rem;
        font-weight: 500;
        border-bottom: none;
        letter-spacing: 0.5px;
    }

    .custom-theme-table tbody td {
        padding: 6px 12px;
        font-size: 0.85rem;
        vertical-align: middle;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .custom-theme-table tbody tr:hover td {
        background-color: rgba(84, 151, 206, 0.08); 
    }

    /* DataTable Overrides for Theme Match */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: var(--cf-dark-blue) !important;
        color: var(--cf-white) !important;
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
        <button type="button" class="btn cf-btn-create btn-sm shadow-sm" id="btnCreateAgent" 
                data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#createAgentModal">
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

<div class="modal fade" id="createAgentModal" tabindex="-1" aria-labelledby="createAgentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: var(--cf-dark-blue);">
                <h5 class="modal-title" id="createAgentModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Create New Agent
                </h5>
                <button type="button" class="btn-close btn-close-white" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCreateAgent">
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="fname" name="fname" class="form-control" required />
                                <label class="form-label" for="fname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="lname" name="lname" class="form-control" required />
                                <label class="form-label" for="lname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="select form-control" id="gender" name="gender" data-mdb-select-init>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="email" id="email" name="email" class="form-control" required />
                                <label class="form-label" for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="tel" id="phone" name="phone" class="form-control" required />
                                <label class="form-label" for="phone">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="agentcode" name="agentcode" class="form-control" />
                                <label class="form-label" for="agentcode">Agent Code (Optional)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="select form-control" id="province" name="province" data-mdb-select-init required>
                                <option value="" disabled selected>Select Province</option>
                                <option value="23">Central</option>
                                <option value="24">Chimbu (Simbu)</option>
                                <option value="25">Eastern Highlands</option>
                                <option value="26">East New Britain</option>
                                <option value="27">East Sepik</option>
                                <option value="28">Enga</option>
                                <option value="29">Gulf</option>
                                <option value="30">Madang</option>
                                <option value="31">Manus</option>
                                <option value="32">Milne Bay</option>
                                <option value="33">Morobe</option>
                                <option value="34">New Ireland</option>
                                <option value="35">Northern (Oro Province)</option>
                                <option value="36">Bougainville</option>
                                <option value="37">Southern Highlands</option>
                                <option value="38">Western Province</option>
                                <option value="39">Western Highlands</option>
                                <option value="40">West New Britain</option>
                                <option value="41">West Sepik</option>
                                <option value="42">NCD</option>
                                <option value="43">Hela</option>
                                <option value="44">Jiwaka</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="isactive" name="isactive" value="1" checked />
                                <label class="form-check-label" for="isactive">Active Agent</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn cf-btn-create" data-mdb-ripple-init id="btnSaveAgent">Save Agent</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editAgentModal" tabindex="-1" aria-labelledby="editAgentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: var(--cf-dark-blue);">
                <h5 class="modal-title" id="editAgentModalLabel">
                    <i class="fas fa-user-edit me-2"></i>Edit Agent
                </h5>
                <button type="button" class="btn-close btn-close-white" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditAgent">
                    <input type="hidden" id="edit_agentid" name="edit_agentid">
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="edit_fname" name="edit_fname" class="form-control" required />
                                <label class="form-label" for="edit_fname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="edit_lname" name="edit_lname" class="form-control" required />
                                <label class="form-label" for="edit_lname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="select form-control" id="edit_gender" name="edit_gender" data-mdb-select-init>
                                <option value="" disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label class="form-label select-label">Gender</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="email" id="edit_email" name="edit_email" class="form-control" required />
                                <label class="form-label" for="edit_email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="tel" id="edit_phone" name="edit_phone" class="form-control" required />
                                <label class="form-label" for="edit_phone">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="text" id="edit_agentcode" name="edit_agentcode" class="form-control" />
                                <label class="form-label" for="edit_agentcode">Agent Code (Optional)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="select form-control" id="edit_province" name="edit_province" data-mdb-select-init required>
                                <option value="" disabled>Select Province</option>
                                <option value="23">Central</option>
                                <option value="24">Chimbu (Simbu)</option>
                                <option value="25">Eastern Highlands</option>
                                <option value="26">East New Britain</option>
                                <option value="27">East Sepik</option>
                                <option value="28">Enga</option>
                                <option value="29">Gulf</option>
                                <option value="30">Madang</option>
                                <option value="31">Manus</option>
                                <option value="32">Milne Bay</option>
                                <option value="33">Morobe</option>
                                <option value="34">New Ireland</option>
                                <option value="35">Northern (Oro Province)</option>
                                <option value="36">Bougainville</option>
                                <option value="37">Southern Highlands</option>
                                <option value="38">Western Province</option>
                                <option value="39">Western Highlands</option>
                                <option value="40">West New Britain</option>
                                <option value="41">West Sepik</option>
                                <option value="42">NCD</option>
                                <option value="43">Hela</option>
                                <option value="44">Jiwaka</option>
                            </select>
                            <label class="form-label select-label">Province</label>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="edit_isactive" name="edit_isactive" value="1" />
                                <label class="form-check-label" for="edit_isactive">Active Agent</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn cf-btn-create" data-mdb-ripple-init id="btnUpdateAgent">Update Agent</button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1070;">
    <div id="actionToast" class="toast align-items-center text-white border-0 shadow-5" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="true" data-mdb-delay="4000">
        <div class="d-flex">
            <div class="toast-body" id="actionToastBody">
                </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-mdb-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    // --- Helper Function for Toasts ---
    function showToast(message, type = 'success') {
        const toastEl = document.getElementById('actionToast');
        const toastBody = document.getElementById('actionToastBody');
        
        // Reset classes
        toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
        
        // Apply styling based on type
        if (type === 'success') {
            toastEl.classList.add('bg-success');
            toastBody.innerHTML = `<i class="fas fa-check-circle me-2"></i> ${message}`;
        } else if (type === 'error') {
            toastEl.classList.add('bg-danger');
            toastBody.innerHTML = `<i class="fas fa-exclamation-circle me-2"></i> ${message}`;
        }

        // Initialize and show MDB Toast
        const toastInstance = mdb.Toast.getInstance(toastEl) || new mdb.Toast(toastEl);
        toastInstance.show();
    }

    $(document).ready(function() {
        // 1. Initialize DataTable
        const agentTable = $("#datatable").DataTable({
            responsive: true,
            pageLength: 10,
            paging: true,
            scrollX: false,
            order: [],
            ajax: {
                url: `${url}/${control}/masterFetchAgents`,
                type: "POST",
            },
            columnDefs: [
                { targets: [0], orderable: true },
                { targets: [7], className: "text-center", orderable: false } 
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search agents..."
            }
        });

        // 2. Reset form when create modal opens
        $("#btnCreateAgent").on("click", function() {
            $('#formCreateAgent')[0].reset();
            $('#formCreateAgent').removeClass('was-validated');
            
            // Reset MDB Select UI
            document.querySelectorAll('#formCreateAgent .select').forEach(el => {
                const selectInstance = mdb.Select.getInstance(el);
                if (selectInstance) {
                    selectInstance.setValue('');
                }
            });
        });

        // 3. Save Button Action Listener via AJAX
        $("#btnSaveAgent").on("click", function() {
            const form = document.getElementById('formCreateAgent');
            
            // HTML5 Form Validation
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            // Collect form data
            const formData = $('#formCreateAgent').serialize();
            
            // Disable button to prevent double submission
            $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Saving...');

            $.ajax({
                url: `${url}/${control}/create_agent`,
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if(response.success) {
                        // Close Modal securely using MDB instance
                        const modalElement = document.getElementById('createAgentModal');
                        const modalInstance = mdb.Modal.getInstance(modalElement);
                        modalInstance.hide();
                        
                        // Reload the DataTable to show the new agent without refreshing the page
                        agentTable.ajax.reload(null, false);
                        
                        // Trigger Success Toast
                        showToast(response.message, 'success');
                    } else {
                        // Trigger Error Toast
                        showToast(response.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    showToast("A system error occurred while trying to save.", 'error');
                },
                complete: function() {
                    // Re-enable button
                    $("#btnSaveAgent").prop('disabled', false).html('Save Agent');
                }
            });
        });

        // 4. Load Agent Details from JSON directly and Open Edit Modal
        $('#datatable tbody').on('click', '.btnEditAgent', function() {
            try {
                // Get the JSON string from the button's data attribute
                let jsonString = $(this).attr('data-mdb-json');
                
                // Parse the JSON
                let data = JSON.parse(jsonString);
                
                // Fallback: If it was double-encoded from old PHP code, parse it again
                if (typeof data === 'string') {
                    data = JSON.parse(data);
                }
                
                // Populate Form Inputs
                $('#edit_agentid').val(data.agentidpk);
                $('#edit_fname').val(data.fname);
                $('#edit_lname').val(data.lname);
                $('#edit_email').val(data.email);
                $('#edit_phone').val(data.phone);
                $('#edit_agentcode').val(data.agentcode);
                
                // Handle Checkbox / Switch
                $('#edit_isactive').prop('checked', data.isactive == 1);
                
                // Update MDB Inputs so labels float correctly
                document.querySelectorAll('#formEditAgent .form-outline').forEach((formOutline) => {
                    const instance = mdb.Input.getInstance(formOutline);
                    if (instance) {
                        instance.update();
                    } else {
                        new mdb.Input(formOutline).init();
                    }
                });
                
                // Handle MDB Selects
                const genderSelect = mdb.Select.getInstance(document.getElementById('edit_gender'));
                if(genderSelect) genderSelect.setValue(data.gender);
                
                const provSelect = mdb.Select.getInstance(document.getElementById('edit_province'));
                if(provSelect) provSelect.setValue(data.provinceid);

                // Note: The modal will open automatically due to the data-mdb-target attribute.
            } catch (e) {
                console.error("Error parsing agent data: ", e);
                showToast("Failed to load agent details. Data format error.", 'error');
            }
        });

        // 5. Update Agent Action
        $("#btnUpdateAgent").on("click", function() {
            const form = document.getElementById('formEditAgent');
            
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            const formData = $('#formEditAgent').serialize();
            $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Updating...');

            $.ajax({
                url: `${url}/${control}/edit_agent`,
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if(response.success) {
                        const modalElement = document.getElementById('editAgentModal');
                        const modalInstance = mdb.Modal.getInstance(modalElement);
                        modalInstance.hide();
                        
                        agentTable.ajax.reload(null, false); // Reload DataTable keeping current page
                        showToast(response.message, 'success');
                    } else {
                        showToast(response.message, 'error');
                    }
                },
                error: function() {
                    showToast("System error occurred while updating.", 'error');
                },
                complete: function() {
                    $("#btnUpdateAgent").prop('disabled', false).html('Update Agent');
                }
            });
        });

        // 6. Toggle Agent Status Action directly from the Table
        $('#datatable tbody').on('change', '.toggle-active-agent', function() {
            // Get the agent ID stored in data-id attribute
            const agentId = $(this).data('id');
            // Determine if checked (1) or unchecked (0)
            const isActive = $(this).is(':checked') ? 1 : 0;
            const toggleSwitch = $(this);

            // Temporarily disable the switch to prevent spam clicking
            toggleSwitch.prop('disabled', true);

            $.ajax({
                url: `${url}/${control}/toggle_active`,
                type: "POST",
                data: {
                    agentid: agentId,
                    isactive: isActive
                },
                dataType: "json",
                success: function(response) {
                    if(response.success) {
                        showToast(response.message, 'success');
                    } else {
                        showToast(response.message, 'error');
                        // Revert switch visually if backend failed
                        toggleSwitch.prop('checked', !isActive); 
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    showToast("System error occurred while updating status.", 'error');
                    // Revert switch visually if server error
                    toggleSwitch.prop('checked', !isActive);
                },
                complete: function() {
                    // Re-enable the switch
                    toggleSwitch.prop('disabled', false);
                }
            });
        });
    });
</script>