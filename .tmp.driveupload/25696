

  <style>
    /* --- CUSTOM STYLING --- */
    body {
      background-color: #f0f2f5;
      font-family: 'Roboto', sans-serif;
      font-size: 0.75rem;
      -webkit-print-color-adjust: exact;
    }

    .a4-container {
      background-color: white;
      max-width: 210mm;
      margin: 20px auto;
      padding: 8mm;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* Custom Input: Underline Style */
    .form-line {
      border: 0;
      border-bottom: 1px solid #000;
      border-radius: 0;
      padding: 0 2px;
      background: transparent;
      min-height: 20px;
      height: 20px;
      font-size: 0.8rem;
    }
    .form-line:focus {
      border-bottom: 2px solid #1266f1;
      box-shadow: none;
      background: rgba(18, 102, 241, 0.05);
    }

    input[type="date"].form-line {
      display: flex;
      align-items: end;
      padding-top: 0;
    }
    
    .form-label-compact {
      font-weight: 700;
      font-size: 0.7rem;
      white-space: nowrap;
      color: #333;
      padding-top: 2px;
    }

    .section-title {
      background-color: #1a237e;
      color: white;
      font-weight: 700;
      text-transform: uppercase;
      font-size: 0.75rem;
      padding: 2px;
      text-align: center;
      margin-bottom: 6px;
    }

    .inline-input {
      display: inline-block;
      text-align: center;
      margin: 0 2px;
    }

    .border-thick { border-width: 2px !important; }
    .tight-row { margin-bottom: 3px; }

    /* SIGNATURE STYLES */
    #signature-pad {
      border: 2px dashed #ccc;
      border-radius: 5px;
      cursor: crosshair;
      touch-action: none;
    }
    .signature-image {
      max-height: 35px; 
      display: block; 
      margin: 0 auto;
    }
    
    .btn-undo-signature {
      position: absolute;
      top: -15px;
      left: 0;
      font-size: 0.6rem;
      padding: 2px 6px;
      z-index: 10;
      background-color: #fff;
      border: 1px solid #dc3545;
      color: #dc3545;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .btn-undo-signature:hover {
      background-color: #dc3545;
      color: white;
    }

/* --- STRICT PRINT CONFIGURATION --- */
  @media print {
    
    /* 1. Reset Page Margins to 0 */
    @page {
      margin: 0;
      size: auto;
    }

    /* 2. Hide EVERYTHING in the body first */
    body * {
      visibility: hidden;
    }

    /* 3. Remove the gray background color */
    body {
      background-color: white !important;
    }

    /* 4. Make ONLY the .a4-container and its children visible */
    .a4-container, .a4-container * {
      visibility: visible;
    }

    /* 5. Force the container to the top-left, covering the hidden elements */
    .a4-container {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      margin: 0;
      padding: 10mm; /* Add padding here to act as your page margin */
      box-shadow: none;
      border: none;
    }

    /* 6. Ensure input styling remains clean */
    .form-line {
      border-bottom: 1px solid #000 !important;
    }
    
    /* 7. Hide specific UI elements (just in case) */
    .no-print, .btn-sign-placeholder, .btn-undo-signature { 
      display: none !important; 
    }

    /* 8. Handle Page Breaks inside the container */
    .print-break-before {
      page-break-before: always !important;
      margin-top: 20px;
    }
  }

  </style>


  <div class="container text-end mt-3 mb-2 no-print" style="max-width: 210mm;">
    <button type="button" class="btn btn-primary btn-sm shadow-2" onclick="window.print()">
      <i class="fas fa-file-pdf me-2"></i> Print / Save PDF
    </button>
  </div>

  <div class="a4-container">
    
    <header class="border-bottom border-thick border-dark pb-2 mb-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <img src="public/images/LogoCF.png" alt="Logo" class="img-fluid mb-1" style="max-height: 65px;">
          <p class="text-danger fw-bold fst-italic mb-0 ps-1" style="font-size: 0.7rem;">Fast, Easy & Convenient</p>
        </div>
        
        <div class="text-end" style="font-size: 0.65rem; line-height: 1.4;">
          <p class="fw-bold mb-0">PO Box 107, Vision City, National Capital District, Papua New Guinea</p>
          <div class="mb-0">
            <span class="me-2"><strong>PH:</strong> 323 4499</span>
            <span><strong>MOBILE:</strong> 7552 0000 / 7092 2233</span>
          </div>
          <p class="mb-0">WhatsApp: (675) 7552 0000 | Facebook: Cannan Finance</p>
          <p class="mb-0">Email: enquiries@cannanfinance.com | Website: Cannanfinance.com</p>
        </div>
      </div>
      
      <div class="text-center mt-2">
        <h5 class="fw-bold text-decoration-underline text-uppercase mb-0">Loan Application Form</h5>
      </div>
    </header>

    <form>
      <div class="row g-2 mb-3">
        <div class="col-6">
          <div class="border border-secondary p-1 h-100">
            <div class="section-title">Personal Details</div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">FULL NAME:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">DOB:</label></div><div class="col-8"><input type="date" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">GENDER:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">HOME PROV:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">DISTRICT:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">VILLAGE:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">ADDRESS:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">MARITAL STS:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">SPOUSE:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">MOBILE #:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end mb-0"><div class="col-4"><label class="form-label-compact">EMAIL:</label></div><div class="col-8"><input type="email" class="form-control form-line"></div></div>
          </div>
        </div>

        <div class="col-6">
          <div class="border border-secondary p-1 h-100">
            <div class="section-title">Employment Details</div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">EMPLOYER:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">OCCUPATION:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">LOCATION:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">BIRTH PLACE:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">FILE NO:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">GROSS:</label></div><div class="col-8 d-flex align-items-end"><span class="fw-bold me-1" style="font-size:0.7rem">K</span><input type="number" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">NET:</label></div><div class="col-8 d-flex align-items-end"><span class="fw-bold me-1" style="font-size:0.7rem">K</span><input type="number" class="form-control form-line"></div></div>
            <div class="d-flex align-items-center py-1 border-bottom border-light">
              <span class="form-label-compact me-2">SUPER:</span>
              <div class="form-check form-check-inline mb-0"><input class="form-check-input" type="checkbox" id="super1" style="transform: scale(0.8);" /><label class="form-check-label" for="super1" style="font-size: 0.7rem;">Nambawan Super</label></div>
              <div class="form-check form-check-inline mb-0"><input class="form-check-input" type="checkbox" id="super2" style="transform: scale(0.8);" /><label class="form-check-label" for="super2" style="font-size: 0.7rem;">Nasfund</label></div>
            </div>
            <div class="row tight-row align-items-end mt-1"><div class="col-4"><label class="form-label-compact">WORK PHONE:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end mb-0"><div class="col-4"><label class="form-label-compact">MEMBER NO:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
          </div>
        </div>
      </div>

      <div class="row g-2 mb-3">
        <div class="col-6">
          <div class="border border-secondary p-1">
            <div class="section-title">Loan Details (Break-Up)</div>
            <div class="row tight-row align-items-end"><div class="col-6"><label class="form-label-compact">LOAN AMT:</label></div><div class="col-6 d-flex align-items-end"><span class="fw-bold me-1" style="font-size:0.7rem">K</span><input type="number" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-6"><label class="form-label-compact">Total LOAN REPAYABLE:</label></div><div class="col-6 d-flex align-items-end"><span class="fw-bold me-1" style="font-size:0.7rem">K</span><input type="number" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-6"><label class="form-label-compact">OUTSTANDING BAL:</label></div><div class="col-6 d-flex align-items-end"><span class="fw-bold me-1" style="font-size:0.7rem">K</span><input type="number" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end mb-0"><div class="col-6"><label class="form-label-compact">PAYOUT AMT:</label></div><div class="col-6 d-flex align-items-end"><span class="fw-bold me-1" style="font-size:0.7rem">K</span><input type="number" class="form-control form-line"></div></div>
          </div>
        </div>
        <div class="col-6">
          <div class="border border-secondary p-1">
            <div class="section-title">Mode of Payment (Bank)</div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">ACC NAME:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">ACC NUMBER:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end"><div class="col-4"><label class="form-label-compact">BANK:</label></div><div class="col-8"><input type="text" class="form-control form-line"></div></div>
            <div class="row tight-row align-items-end mb-0"><div class="col-6 d-flex align-items-end"><label class="form-label-compact me-2">BRANCH:</label><input type="text" class="form-control form-line"></div><div class="col-6 d-flex align-items-end"><label class="form-label-compact me-2">CODE:</label><input type="text" class="form-control form-line"></div></div>
          </div>
        </div>
      </div>

      <div class="card rounded-0 mb-3 bg-light border border-dark">
        <div class="card-body p-2">
          <h6 class="text-center fw-bold text-uppercase text-decoration-underline mb-2" style="font-size: 0.75rem;">Irrevocable Salary Deduction Authority</h6>
          <div class="d-flex align-items-end mb-1"><span class="fw-bold me-2" style="font-size:0.75rem">TO: Paymaster of</span><input type="text" class="form-control form-line w-50"></div>
          <p class="text-justify mb-1" style="line-height: 1.6; font-size: 0.75rem;">
            I <input type="text" class="form-control form-line inline-input" style="width: 130px;" placeholder="(Name)">
            hereby authorize you to deduct 
            <span class="fw-bold">K</span><input type="number" class="form-control form-line inline-input" style="width: 70px;">
            from my monthly/fortnightly salary for
            <input type="number" class="form-control form-line inline-input" style="width: 40px;"> consecutive fortnights totalling 
            <span class="fw-bold">K</span><input type="number" class="form-control form-line inline-input" style="width: 70px;">
            and remit payment in Favor of <span class="fw-bold">CANNAN Finance, ACC#: 7016045317, BSP, Waigani Drive</span>.
          </p>
          <div class="d-flex align-items-end mt-1" style="font-size: 0.75rem;">
             <span>Commencing on this PPE:</span>
             <input type="date" class="form-control form-line mx-2" style="width: auto;">
             <span class="text-muted fst-italic">(DD/MM/YYYY)</span>
          </div>
          <p class="fst-italic mt-2 mb-1 text-muted" style="font-size: 0.7rem;">"You are also authorized to remit from my final entitlements..."</p>
          <p class="fw-bold text-center mb-2" style="font-size: 0.7rem;">[The above authority is irrevocable without the written consent of CANNAN Finance]</p>
          <div class="row text-center mt-3" style="font-size: 0.7rem;">
             <div class="col-4"><div class="border-top border-dark pt-1">Pay Master's Full Name</div></div>
             <div class="col-4"><div class="border-top border-dark pt-1">Signature</div></div>
             <div class="col-4"><div class="border border-dark py-2 text-muted">Official Stamp</div></div>
          </div>
        </div>
      </div>

      <div class="border border-dark p-2 mb-3">
         <h6 class="fw-bold text-uppercase text-decoration-underline mb-1" style="font-size: 0.75rem;">Irrevocable Declaration by Applicant</h6>
         <ul class="mb-0 ps-3" style="font-size: 0.7rem;">
            <li class="mb-1 text-justify">In the event of my Resignation, Termination, Retrenchment or Death, I irrevocably assign to CANNAN Finance, pursuant to the Mercantile Act, all of my Entitlements and Savings... to be used to settle the debt owed.</li>
            <li class="mb-1 text-justify"><strong>Default fee of 40%</strong> will incur on all outstanding balances as per the repayment schedule upon every pay period ending.</li>
            <li class="text-justify">All expenses involved including legal fees in recouping monies owed to CANNAN Finance will be made payable as an applicant on demand.</li>
         </ul>
      </div>

      <div class="card rounded-0 border-primary print-break-before" style="background-color: #e3f2fd;">
         <div class="card-body p-2">
            <h6 class="fw-bold text-uppercase text-center text-decoration-underline mb-1" style="font-size: 0.75rem;">Applicants Acknowledgement</h6>
            <p class="text-center fst-italic mb-4" style="font-size: 0.7rem;">"I acknowledge that I have read and understood the contents of this Loan Agreement and that by signing this Contract, I am legally bound by the said terms and conditions therein."</p>

            <div class="row text-center mt-2 g-2" style="font-size: 0.7rem;">
               <div class="col-4">
                  <input type="text" class="form-control form-line">
                  <span>Applicant's Full Name</span>
               </div>
               
               <div class="col-4 position-relative">
                  <div id="signedState" class="d-none position-relative">
                    <button type="button" class="btn btn-undo-signature rounded-1" onclick="resetSignature()">Undo</button>
                    <img id="applicantSignatureImage" class="img-fluid signature-image" />
                    <div style="border-bottom: 1px solid black; margin-top: 2px;"></div>
                  </div>

                  <div id="unsignedState">
                    <button type="button" class="btn btn-outline-dark btn-sm btn-block p-0 shadow-0 btn-sign-placeholder" 
                            id="btnOpenSignature" 
                            data-mdb-toggle="modal" 
                            data-mdb-target="#signatureModal" 
                            style="height: 20px; font-size: 0.7rem;">
                      Click to Sign
                    </button>
                  </div>
                  <span>Applicant's Signature</span>
               </div>
               
               <div class="col-4">
                  <input type="text" class="form-control form-line">
                  <span>Witness Signature</span>
               </div>
            </div>

            <div class="d-flex justify-content-between align-items-end mt-3" style="font-size: 0.7rem;">
               <div class="text-center" style="width: 30%;">
                  <input type="date" class="form-control form-line">
                  <span>Accepted Date</span>
               </div>
               <div class="bg-white border border-dark px-2 py-1 fw-bold font-monospace">Deduction Code: DCANN</div>
            </div>
         </div>
      </div>

    </form>
  </div>

  <div class="modal fade" id="signatureModal" tabindex="-1" aria-labelledby="signatureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white py-2">
          <h5 class="modal-title fs-6" id="signatureModalLabel">Draw Signature</h5>
          <button type="button" class="btn-close btn-close-white" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <div class="alert alert-info py-1 small mb-2"><i class="fas fa-info-circle me-1"></i> Sign in the box below</div>
          <canvas id="signature-pad" width="400" height="150" class="w-100"></canvas>
        </div>
        <div class="modal-footer py-1 d-flex justify-content-between">
          <div>
            <button type="button" class="btn btn-secondary btn-sm" onclick="clearCanvas()">Clear All</button>
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="undoLastStroke()"><i class="fas fa-undo me-1"></i> Undo</button>
          </div>
          <button type="button" class="btn btn-primary btn-sm" onclick="saveSignature()">Save Signature</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
  <script>
    const canvas = document.getElementById('signature-pad');
    const ctx = canvas.getContext('2d');
    let isDrawing = false;
    let lastX = 0; let lastY = 0;
    let restore_array = []; let index = -1;

    function getPos(e) {
      const rect = canvas.getBoundingClientRect();
      const x = (e.clientX || e.touches[0].clientX) - rect.left;
      const y = (e.clientY || e.touches[0].clientY) - rect.top;
      return { x: x * (canvas.width / rect.width), y: y * (canvas.height / rect.height) };
    }

    function startDrawing(e) {
      isDrawing = true;
      const pos = getPos(e);
      lastX = pos.x; lastY = pos.y;
    }

    function draw(e) {
      if (!isDrawing) return;
      e.preventDefault();
      const pos = getPos(e);
      ctx.beginPath();
      ctx.moveTo(lastX, lastY);
      ctx.lineTo(pos.x, pos.y);
      ctx.strokeStyle = '#000080';
      ctx.lineWidth = 4;
      ctx.lineCap = 'round';
      ctx.stroke();
      lastX = pos.x; lastY = pos.y;
    }

    function stopDrawing() {
      if (isDrawing) {
        isDrawing = false;
        restore_array.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
        index += 1;
      }
    }

    function undoLastStroke() {
        if (index <= 0) { clearCanvas(); } 
        else { index -= 1; restore_array.pop(); ctx.putImageData(restore_array[index], 0, 0); }
    }

    // Event Listeners
    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseout', stopDrawing);
    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);

    function clearCanvas() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      restore_array = []; index = -1;
    }

    function saveSignature() {
      const dataURL = canvas.toDataURL('image/png');
      document.getElementById('applicantSignatureImage').src = dataURL;
      document.getElementById('unsignedState').classList.add('d-none');
      document.getElementById('signedState').classList.remove('d-none');
      mdb.Modal.getInstance(document.getElementById('signatureModal')).hide();
    }

    function resetSignature() {
      document.getElementById('applicantSignatureImage').src = "";
      document.getElementById('signedState').classList.add('d-none');
      document.getElementById('unsignedState').classList.remove('d-none');
      clearCanvas();
    }
  </script>