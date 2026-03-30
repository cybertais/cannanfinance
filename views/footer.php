<style>
    .site-footer {
        background-color: var(--cf-dark-blue);
        color: var(--cf-white);
    }
    .site-footer a, .site-footer p, .site-footer i, .site-footer span {
        color: var(--cf-white) !important;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .site-footer a:hover {
        color: var(--cf-light-blue) !important;
    }
    .site-footer .social-btn {
        background-color: rgba(255,255,255,0.1);
        border-radius: 50%;
        margin-right: 10px;
    }
    .site-footer .social-btn:hover {
        background-color: var(--cf-light-blue);
    }
    .footer-bottom {
        background-color: rgba(0, 0, 0, 0.2);
        font-size: 13px;
    }
    .footer-bottom a { font-weight: 500; }
</style>

<footer class="site-footer text-center text-lg-start pt-4">
    <div class="container p-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-6 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                <img src="public/images/LogoCF.png" alt="Cannan Finance" style="height: 50px;">
            </div>
            <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
                <a target="_blank" class="btn text-white social-btn btn-floating" href="<?php echo COMPANY_FBLINK;?>" role="button">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a target="_blank" class="btn text-white social-btn btn-floating" href="https://wa.me/75520000" role="button">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <hr class="my-4" style="border-color: rgba(255,255,255,0.2);" />

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h6 class="text-uppercase fw-bold mb-3" style="color: var(--cf-light-blue);">Visit Us</h6>
                <p><i class="fas fa-map-marker-alt me-2"></i> GB Haus, MVIL Road, Port Moresby</p>
                <p><i class="fas fa-clock me-2"></i> Open Mon-Fri, 8:00AM - 5:00PM</p>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h6 class="text-uppercase fw-bold mb-3" style="color: var(--cf-light-blue);">Contact Us</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><i class="fab fa-whatsapp me-2"></i><a target="_blank" href="https://wa.me/75520000">7552-0000</a></li>
                    <li class="mb-2"><i class="fa-solid fa-phone me-2"></i><a href="tel:+6753234499">323-4499</a></li>
                    <li class="mb-2"><i class="fa-solid fa-mobile-screen me-2"></i><a href="tel:+67570922233">7092-2233</a></li>
                    <li class="mb-2"><i class="fa-solid fa-paper-plane me-2"></i><a href="mailto:enquiries@cannanfinance.com">enquiries@cannanfinance.com</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h6 class="text-uppercase fw-bold mb-3" style="color: var(--cf-light-blue);">Postal Address</h6>
                <p><i class="fas fa-envelope me-2"></i> P.O Box 107, Vision City<br>National Capital District<br>Papua New Guinea</p>
            </div>
        </div>
    </div>

    <div class="footer-bottom p-3">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                © <?php echo date("Y"); ?> Copyright: <a href="#"><?php echo COMPANY_LONGNAME?></a>
            </div>
            <div class="mb-2 mb-md-0">
                Last Update: 26 March 2026
            </div>
            <div>
                <a href="mailto:admin@cybertais.com">Website Developed by: <?php echo DEVELOPER_LONGNAME?></a>
            </div>
        </div>
    </div>
</footer>
<!--Footer-->
</div>
</div>
</div>
</section>
<!-- Heading -->


</div>
<!-- End your project here-->
<!-- footer start -->
<footer class=" bg-body-tertiary text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center" style="font-size: 12px; background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a class="text-body" href="#"><?php echo COMPANY_LONGNAME ?></a>
  </div>
  <!-- Copyright -->

  <!-- Version -->
  <div class="text-center" style="font-size: 12px; background-color: rgba(0, 0, 0, 0.05);">Last Update: 26 March 2026
  </div>
  <!-- Version -->

  <!-- Developer -->
  <div class="text-center" style="font-size: 12px; background-color: rgba(0, 0, 0, 0.05);">
    <a href="mailto:admin@cybertais.com">Website Developed by: <?php echo DEVELOPER_LONGNAME ?></a>
  </div>
  <!-- Developer -->

</footer>
<!-- footer ends -->
</body>
<!-- MDB ESSENTIAL -->
<script type="text/javascript" src="<?php echo URL ?>public/node_modules/mdb-ui-kit/js/mdb.umd.min.js"></script>
<!-- MDB PLUGINS -->
<script type="text/javascript" src="<?php echo URL ?>public/node_modules/mdb-ui-kit/plugins/js/all.min.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/ffcsmsapp.js"></script>
<!-- Custom scripts -->


<script>
  $(document).ready(function () {
    document.querySelectorAll(".select-wrapper input").forEach(obj => {
      obj.classList.add('form-control-sm');
    });
  });
</script>`

<?php
if (isset($this->js)) {
  foreach ($this->js as $js) {
    echo "<script src='" . URL . $js . "'></script>";
  }
}
?>

<script>
  function formatDate(inputDate) {
    let parts = inputDate.split('/');
    if (parts.length !== 3) return '';

    let [day, month, year] = parts;
    return `${year}-${month}-${day}`;
  }

  function formatDateFromSQLToHtmlMdb(inputDate) {
    if (!inputDate) return ''; // Return blank string if inputDate is empty or undefined

    let parts = inputDate.split('-');
    if (parts.length !== 3) return '';

    let [year, month, day] = parts; // Correcting the order
    // return `${year}/${month}/${day}`;
    return `${day}/${month}/${year}`;
  }

</script>

<script>
  /*
  * optionValue -> String: Value of the Editable item
  * selectid -> String: ID of the Select Tag
  * Description:
  */
  function setSelectedOption(optionValue, selectid) {
    let selectElement = document.getElementById(selectid);
    for (let option of selectElement.options) {
      if (option.hasAttribute("selected")) {
        option.removeAttribute("selected");
      }
      if (option.value === optionValue) {
        option.setAttribute('selected', 'selected');
      } else {
        option.selected = false;
      }
    }
  }

  function assignValues3(elementObjs, jsonObj, colkeys) {
    colkeys.forEach((key, index) => {
      if (elementObjs[index]) {
        if (elementObjs[index].classList.contains('customDatepicker')) {
          elementObjs[index].value = formatDateFromSQLToHtmlMdb(jsonObj[key]) ?? '';
        }

        else if (document.querySelector(`form input[type="text"][id="${elementObjs[index].id}"]`)) {
          elementObjs[index].value = jsonObj[key] ?? '';
        }

        else if (document.querySelector(`form input[type="number"][id="${elementObjs[index].id}"]`)) {
          elementObjs[index].value = parseInt(jsonObj[key], 10) ?? '';
        }

        else if (document.querySelector(`form input[type="email"][id="${elementObjs[index].id}"]`)) {
          elementObjs[index].value = jsonObj[key] ?? '';
        }

        else if (document.querySelector(`form input[type="tel"][id="${elementObjs[index].id}"]`)) {
          elementObjs[index].value = jsonObj[key] ?? '';
        }

        else if (document.querySelector(`form input[type="password"][id="${elementObjs[index].id}"]`)) {
          elementObjs[index].value = jsonObj[key] ?? '';
        }

        else if (document.querySelector(`form textarea[id="${elementObjs[index].id}"]`)) {
          elementObjs[index].value = jsonObj[key] ?? '';
        }


        else if (document.querySelector(`form select[id="${elementObjs[index].id}"]`)) {
          setSelectedOption(jsonObj[key], elementObjs[index].id);
        }

      }
    });
  }

  // Description: Assign Text Value for viewing purposese
  function assignValuesLabel(elementObjs, jsonObj, keys) {
    keys.forEach((key, index) => {
      if (elementObjs[index]) {
        elementObjs[index].textContent = jsonObj[key] ?? '';
      }
    });
  }

</script>

<script>

  // Run the function
  document.addEventListener("DOMContentLoaded", findDuplicateAttributes);
  function findDuplicateAttributes() {
    const idMap = new Map();
    const nameMap = new Map();

    document.querySelectorAll("[id], [name]").forEach(element => {
      if (element.id) {
        idMap.set(element.id, (idMap.get(element.id) || 0) + 1);
      }
      if (element.name) {
        nameMap.set(element.name, (nameMap.get(element.name) || 0) + 1);
      }
    });

    const duplicateIds = [...idMap.entries()].filter(([key, count]) => count > 1);
    const duplicateNames = [...nameMap.entries()].filter(([key, count]) => count > 1);

    if (duplicateIds.length || duplicateNames.length) {
      console.warn("Duplicate IDs:", duplicateIds);
      console.warn("Duplicate Names:", duplicateNames);
    } else {
      console.log("No duplicate IDs or Names found.");
    }
  }
</script>

</html>