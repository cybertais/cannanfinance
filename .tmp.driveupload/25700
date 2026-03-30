<style>
    /* Card Container Effects */
    .cf-card {
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 12px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background-color: var(--cf-white);
        overflow: hidden;
    }
    
    .cf-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(45, 49, 146, 0.15) !important; /* Soft dark blue shadow */
    }

    /* Image Wrapper for alignment and effect */
    .cf-img-wrapper {
        height: 130px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fdfdfd;
        border-bottom: 1px solid rgba(0,0,0,0.03);
        overflow: hidden;
    }

    .cf-card-img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    /* Image zoom effect on card hover */
    .cf-card:hover .cf-card-img {
        transform: scale(1.08);
    }

    /* Typography */
    .cf-card-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--cf-dark-blue);
        line-height: 1.4;
        margin-bottom: 0;
        /* Limit to 2 lines to keep cards uniform */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Modern Compact Button */
    .cf-btn {
        background-color: var(--cf-light-blue);
        color: var(--cf-white);
        border-radius: 6px;
        text-transform: none;
        font-weight: 500;
        font-size: 0.8rem;
        letter-spacing: 0.3px;
        transition: background-color 0.3s ease;
        box-shadow: none;
    }

    .cf-btn:hover {
        background-color: var(--cf-dark-blue);
        color: var(--cf-white);
        box-shadow: 0 4px 9px -4px var(--cf-dark-blue);
    }
</style>

<div class="container mt-3 mb-3">
  <div class="p-5 text-center bg-white rounded-4 shadow-sm mb-5" style="border-top: 5px solid var(--cf-dark-blue);">
    <h1 class="display-4 fw-bold mb-3" style="color: var(--cf-dark-blue);">
        Find Your Application Form
    </h1>
    <p class="lead fs-4 mb-4" style="color: #555;">
        Welcome to the Cannan Finance download portal. We've made it easy to get the exact paperwork you need. 
    </p>
    
    <hr class="my-4" style="width: 80px; margin: 0 auto; border-color: var(--cf-light-blue); border-width: 3px; opacity: 1;">
    
    <p class="mt-4 text-muted fs-5">
        Please select your employer or organization category from the options below to download the tailored loan application form. Whether you are with a Government Department, Telikom, NBC, or a Private Organization, simply download the PDF, fill it out, and you are one step closer to securing your finance.
    </p>
</div>
    <div class="row justify-content-center" id="app">
        </div>
</div>

<script>
  function createCard(imageSrc, altText, title, buttonText, file) {
    // Responsive column: 2 on desktop, 3 on tablet, 2 on small tablet, 1 on mobile
    const colDiv = document.createElement('div');
    colDiv.className = 'col-lg-2 col-md-4 col-sm-6 mb-4';

    // Main card container (h-100 ensures equal height across the row)
    const cardDiv = document.createElement('div');
    cardDiv.className = 'card cf-card h-100 shadow-sm';

    // Image wrapper
    const imgWrapper = document.createElement('div');
    imgWrapper.className = 'cf-img-wrapper';

    // Image element
    const img = document.createElement('img');
    img.src = imageSrc;
    img.className = 'card-img-top cf-card-img';
    img.alt = altText;
    imgWrapper.appendChild(img);

    // Card body container
    const cardBodyDiv = document.createElement('div');
    cardBodyDiv.className = 'card-body d-flex flex-column p-3 text-center';

    // Title element
    const titleElement = document.createElement('p');
    titleElement.className = 'card-title cf-card-title mb-3';
    titleElement.textContent = title;

    // Button container (mt-auto pushes button to the bottom if titles vary in length)
    const buttonContainer = document.createElement('div');
    buttonContainer.className = 'mt-auto';

    // Button element
    const button = document.createElement('a');
    // Ensure `url` variable is globally accessible, otherwise fallback or declare it
    const baseUrl = typeof url !== 'undefined' ? url : ''; 
    button.href = baseUrl + '/public/documents/' + file;
    button.className = 'btn btn-sm cf-btn w-100';
    button.setAttribute('data-mdb-ripple-init', '');
    button.setAttribute('target', '_blank');
    button.textContent = buttonText;

    buttonContainer.appendChild(button);

    // Assemble the card
    cardBodyDiv.appendChild(titleElement);
    cardBodyDiv.appendChild(buttonContainer);

    cardDiv.appendChild(imgWrapper);
    cardDiv.appendChild(cardBodyDiv);

    colDiv.appendChild(cardDiv);

    return colDiv;
  }

  let app = document.getElementById('app');
  const path = 'public/images/logos/';
  
  // Create and append cards
  app.append(createCard(path + 'telikomv1.png', 'Telikom PNG', 'Telikom PNG', 'Get Application', 'Telikom_Loan_Application_Form_Cannan Finance.pdf'));
  app.append(createCard(path + 'eduv1.png', 'Department of Education', 'Department of Education', 'Get Application', 'Education_Application_Form_Cannan_Finance.pdf'));
  app.append(createCard(path + 'agov1.png', 'Auditor General Office', 'Auditor General Office', 'Get Application', 'Auditor_Application_Form_Cannan_Finance.pdf'));
  app.append(createCard(path + 'nbcv1.png', 'National Broadcasting Corporation', 'National Broadcasting Corporation', 'Get Application', 'NBC_Application_Form_Cannan_Finance.pdf'));
  app.append(createCard(path + 'govdeptv1.png', 'Government Departments', 'Government Departments', 'Get Application', 'Government_Application_Form_Cannan_Finance.pdf'));
  app.append(createCard(path + 'private.png', 'Private Organization', 'Private Organization', 'Get Application', 'Education_Application_Form_Cannan_Finance.pdf'));
</script>