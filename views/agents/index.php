<div class="container py-5">
    
    <?php 
    /* `cannanfi_website2`.`peoples` */
    $peoples = $this->getAllAgents;

    // Extract unique provinces for the dropdown and sort them alphabetically
    $provinces = array_unique(array_column($peoples, 'pro_name'));
    sort($provinces);
    ?>

    <div class="row mb-5 justify-content-center">
        <div class="col-lg-8 text-center">
            <h2 class="fw-bold mb-3" style="color: var(--cf-dark-blue);">Find a Local Agent</h2>
            <p class="text-muted mb-0" style="font-size: 1.15rem; line-height: 1.6;">
                We're here to help. Reach out to one of our dedicated agents across the country to discuss your financial needs and get started with your application today.
            </p>
        </div>
    </div>

    <div class="row mb-5 justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white p-3 rounded-6 shadow-3 search-filter-box d-flex flex-column flex-md-row gap-3">
                
                <div class="input-group flex-grow-1">
                    <span class="input-group-text bg-transparent border-end-0 text-muted ps-4">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control border-start-0 py-2 shadow-none form-control-lg fs-6" placeholder="Search by name, email, or phone...">
                </div>
                
                <div class="d-none d-md-block border-end my-2"></div>
                
                <div class="flex-shrink-0" style="min-width: 250px;">
                    <select id="provinceFilter" class="form-select form-select-lg border-0 shadow-none fs-6 text-muted cursor-pointer h-100" style="background-color: transparent;">
                        <option value="">All Provinces (Nationwide)</option>
                        <?php foreach ($provinces as $province): ?>
                            <option value="<?php echo htmlspecialchars($province); ?>">
                                <?php echo htmlspecialchars($province); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="peopleGrid">
        <?php foreach ($peoples as $person): 
            $fullName = $person['fname'] . ' ' . $person['lname'];
            $searchString = strtolower($fullName . ' ' . $person['email'] . ' ' . $person['phone']);
        ?>
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 d-flex align-items-stretch person-card" 
                 data-province="<?php echo htmlspecialchars($person['pro_name']); ?>" 
                 data-search="<?php echo htmlspecialchars($searchString); ?>">
                
                <div class="card shadow-2 rounded-5 w-100 agent-card-wrapper bg-white" style="border-top: 5px solid var(--cf-dark-blue);">
                    <div class="card-body p-4 d-flex flex-column">
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-light d-flex justify-content-center align-items-center text-primary me-3 shadow-sm" style="width: 45px; height: 45px;">
                                <i class="fas fa-user fs-5" style="color: var(--cf-light-blue);"></i>
                            </div>
                            <div>
                                <h5 class="card-title fw-bold mb-1" style="color: var(--cf-black);">
                                    <?php echo htmlspecialchars($fullName); ?>
                                </h5>
                                <p class="text-muted small mb-0 fw-medium">
                                    <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                    <?php echo htmlspecialchars($person['pro_name']); ?>
                                </p>
                            </div>
                        </div>
                        
                        <hr class="hr hr-blurry my-2 opacity-50" />
                        
                        <div class="small mb-4 mt-2">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-light rounded p-1 me-2 text-center" style="width: 28px;">
                                    <i class="fas fa-phone-alt text-success"></i>
                                </div>
                                <span class="fw-bold fs-6 text-dark"><?php echo htmlspecialchars($person['phone']); ?></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-1 me-2 text-center" style="width: 28px;">
                                    <i class="fas fa-envelope" style="color: var(--cf-light-blue);"></i>
                                </div>
                                <span class="text-truncate" title="<?php echo htmlspecialchars($person['email']); ?>">
                                    <?php echo htmlspecialchars($person['email']); ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2 mt-auto">
                            <a href="mailto:<?php echo htmlspecialchars($person['email']); ?>" class="btn btn-primary btn-sm flex-fill rounded-pill shadow-0 agent-action-btn" style="background-color: var(--cf-dark-blue);">
                                <i class="fas fa-paper-plane me-1"></i>Email
                            </a>
                            <a href="tel:<?php echo htmlspecialchars(preg_replace('/[^0-9+]/', '', $person['phone'])); ?>" class="btn btn-outline-primary btn-sm flex-fill rounded-pill agent-action-btn" style="color: var(--cf-dark-blue); border-color: var(--cf-dark-blue);">
                                <i class="fas fa-phone me-1"></i>Call
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div id="noResultsMsg" class="d-none text-center py-5">
        <div class="p-5 bg-white rounded-5 shadow-sm d-inline-block border">
            <div class="rounded-circle bg-light d-flex justify-content-center align-items-center mx-auto mb-4" style="width: 80px; height: 80px;">
                <i class="fas fa-search-minus fa-2x text-muted"></i>
            </div>
            <h4 class="fw-bold" style="color: var(--cf-dark-blue);">No agents found</h4>
            <p class="text-muted mb-0">We couldn't find anyone matching your search criteria.<br>Try adjusting your filters or search terms.</p>
            <button class="btn btn-link mt-3 text-decoration-none" onclick="document.getElementById('searchInput').value=''; document.getElementById('provinceFilter').value=''; document.getElementById('searchInput').dispatchEvent(new Event('input'));">
                Clear Filters
            </button>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const provinceFilter = document.getElementById('provinceFilter');
    const allCards = document.querySelectorAll('.person-card');
    const noResultsMsg = document.getElementById('noResultsMsg');

    const performFilter = () => {
        const searchText = searchInput.value.toLowerCase().trim();
        const filterProvince = provinceFilter.value;
        let visibleCount = 0;

        allCards.forEach(card => {
            const cardDataSearch = card.getAttribute('data-search').toLowerCase();
            const cardProvince = card.getAttribute('data-province');

            const matchesText = cardDataSearch.includes(searchText);
            const matchesProv = (filterProvince === "" || cardProvince === filterProvince);

            if (matchesText && matchesProv) {
                card.classList.remove('d-none');
                // Use offsetWidth to force a reflow so animations re-trigger if needed
                void card.offsetWidth; 
                card.classList.add('d-flex');
                visibleCount++;
            } else {
                card.classList.remove('d-flex');
                card.classList.add('d-none');
            }
        });
        
        if(visibleCount === 0) {
            noResultsMsg.classList.remove('d-none');
        } else {
            noResultsMsg.classList.add('d-none');
        }
    };

    searchInput.addEventListener('input', performFilter);
    provinceFilter.addEventListener('change', performFilter);
});
</script>