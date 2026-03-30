<div class="container py-4">
    
    <?php 
    /* `cannanfi_website2`.`peoples` */
    $peoples = $this->getAllAgents;

    // Extract unique provinces for the dropdown and sort them alphabetically
    $provinces = array_unique(array_column($peoples, 'pro_name'));
    sort($provinces);
    ?>

    <div class="row mb-3">
        <div class="col-12 text-center">
            <p class="text-muted lead mb-0" style="font-size: 1.1rem;">
                We're here to help. Reach out to one of our local agents across the country to discuss your financial needs and get started with your application.
            </p>
        </div>
    </div>

    <div class="row mb-4 bg-light p-3 rounded shadow-sm">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="input-group">
                <span class="input-group-text bg-white text-muted border-end-0">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="searchInput" class="form-control border-start-0 ps-0" placeholder="Search by name, email, or phone...">
            </div>
        </div>
        <div class="col-md-6">
            <select id="provinceFilter" class="form-select">
                <option value="">All Provinces</option>
                <?php foreach ($provinces as $province): ?>
                    <option value="<?php echo htmlspecialchars($province); ?>">
                        <?php echo htmlspecialchars($province); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row" id="peopleGrid">
        <?php foreach ($peoples as $person): 
            $fullName = $person['fname'] . ' ' . $person['lname'];
            // Combine fields for the search data attribute
            $searchString = strtolower($fullName . ' ' . $person['email'] . ' ' . $person['phone']);
        ?>
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 d-flex align-items-stretch person-card" 
                 data-province="<?php echo htmlspecialchars($person['pro_name']); ?>" 
                 data-search="<?php echo htmlspecialchars($searchString); ?>">
                
                <div class="card shadow-2-strong rounded-3 w-100" style="border-top: 4px solid #3b71ca;">
                    <div class="card-body p-3 d-flex flex-column">
                        
                        <h5 class="card-title fw-bold mb-0">
                            <?php echo htmlspecialchars($fullName); ?>
                        </h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-1"></i>
                            <?php echo htmlspecialchars($person['pro_name']); ?>
                        </p>
                        
                        <div class="small mb-3">
                            <div class="mb-2">
                                <i class="fas fa-phone-alt text-success text-center me-2" style="width: 16px;"></i>
                                <span class="fw-bold"><?php echo htmlspecialchars($person['phone']); ?></span>
                            </div>
                            <div>
                                <i class="fas fa-envelope text-info text-center me-2" style="width: 16px;"></i>
                                <?php echo htmlspecialchars($person['email']); ?>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2 mt-auto">
                            <a href="mailto:<?php echo htmlspecialchars($person['email']); ?>" class="btn btn-primary btn-sm flex-fill shadow-0 px-2">
                                <i class="fas fa-paper-plane me-1"></i>Email
                            </a>
                            <a href="tel:<?php echo htmlspecialchars(preg_replace('/[^0-9+]/', '', $person['phone'])); ?>" class="btn btn-outline-primary btn-sm flex-fill px-2">
                                <i class="fas fa-phone me-1"></i>Call
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Grab the inputs and the card wrappers
    const searchInput = document.getElementById('searchInput');
    const provinceFilter = document.getElementById('provinceFilter');
    const allCards = document.querySelectorAll('.person-card');

    // 2. Create the core filtering function
    const performFilter = () => {
        const searchText = searchInput.value.toLowerCase().trim();
        const filterProvince = provinceFilter.value;

        allCards.forEach(card => {
            // Grab the data attributes we mapped in the PHP loop
            const cardDataSearch = card.getAttribute('data-search').toLowerCase();
            const cardProvince = card.getAttribute('data-province');

            // 3. Evaluate if the card matches the current inputs
            const matchesText = cardDataSearch.includes(searchText);
            const matchesProv = (filterProvince === "" || cardProvince === filterProvince);

            // 4. Show or hide instantly using Bootstrap classes
            if (matchesText && matchesProv) {
                card.classList.remove('d-none');
                card.classList.add('d-flex'); // Restores the grid stretching
            } else {
                card.classList.remove('d-flex');
                card.classList.add('d-none'); // Hides the card and collapses its space
            }
        });
    };

    // --- The Event Listeners that make it instant ---

    // Fires instantly on every single keystroke, deletion, or paste
    searchInput.addEventListener('input', performFilter);

    // Fires instantly the moment a new province is clicked
    provinceFilter.addEventListener('change', performFilter);
});
</script>