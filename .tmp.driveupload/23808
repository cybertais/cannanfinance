/**
 * MDBInputBuilder
 * Reusable JS class for generating MDB-formatted form components
 * with centralized validation handling and component initialization.
 */
class MDBInputBuilder {
  constructor() {
    // Initialize centralized validation for standard inputs
    document.addEventListener("input", (e) => this.validateInput(e));
    document.addEventListener("change", (e) => this.validateInput(e));

    // Listen for datepicker specific events
    document.addEventListener("dateChange.mdb.datepicker", (e) => this.validateInput(e));

    // Listen for changes to reset "Server Errors"
    document.addEventListener("change", (e) => this.resetError(e.target));
    document.addEventListener("input", (e) => this.resetError(e.target));
  }

  // ---------------------------------------------------------
  // 1. COMPONENT INITIALIZATION
  // ---------------------------------------------------------
  activateMDB(container) {
    if (!container) return;

    const initLogic = () => {
      if (typeof mdb === "undefined") {
        console.warn("MDBInputBuilder: MDB Library not loaded yet. Retrying...");
        setTimeout(initLogic, 100);
        return;
      }

      const inputs = container.querySelectorAll(".form-outline");
      inputs.forEach((inputDiv) => { new mdb.Input(inputDiv).init(); });

      const datepickers = container.querySelectorAll(".datepicker");
      datepickers.forEach((pickerDiv) => {
        const labelEl = pickerDiv.querySelector("label");
        const pickerTitle = labelEl ? labelEl.innerText : "Select Date";
        new mdb.Datepicker(pickerDiv, { format: "d mmmm yyyy", title: pickerTitle });
      });

      const selects = container.querySelectorAll(".select");
      selects.forEach((selectEl) => {
        if (!selectEl.getAttribute('data-mdb-select-initialized')) {
          new mdb.Select(selectEl);
        }
      });

      const ranges = container.querySelectorAll('.range');
      ranges.forEach((range) => { new mdb.Range(range); });

      const fileUploads = container.querySelectorAll('.file-upload');
      fileUploads.forEach((fileUpload) => { new mdb.FileUpload(fileUpload); });

      const tooltips = container.querySelectorAll('[data-mdb-toggle="tooltip"]');
      tooltips.forEach((el) => { new mdb.Tooltip(el); });

      const forms = container.querySelectorAll('.needs-validation');
      forms.forEach((form) => {
        if (form.getAttribute('data-init-validation')) return; 

        form.addEventListener('submit', (event) => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
        form.setAttribute('data-init-validation', 'true');
      });
    };

    initLogic();
  }

  // ---------------------------------------------------------
  // 2. CLIENT-SIDE VALIDATION LOGIC
  // ---------------------------------------------------------
  validateInput(event) {
    const el = event.target;
    if (!el.hasAttribute("data-validate")) return;

    let isValid = false;
    if (el.type === "checkbox" || el.type === "radio") {
      isValid = el.checked;
    } else {
      isValid = el.value.trim() !== "";
    }

    const toggleClasses = (element, valid) => {
      if (!element) return;
      if (valid) {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
      } else {
        element.classList.remove("is-valid");
        element.classList.add("is-invalid");
      }
    };

    toggleClasses(el, isValid);

    if (el.tagName === "SELECT") {
      const wrapper = el.closest(".select-wrapper");
      if (wrapper) {
        const visibleInput = wrapper.querySelector("input.select-input, input.form-control");
        toggleClasses(visibleInput, isValid);
      }
    }
  }

  // ---------------------------------------------------------
  // 3. SERVER-SIDE ERROR & SUCCESS HANDLING
  // ---------------------------------------------------------
  showError(elementId, message) {
    const el = document.getElementById(elementId);
    if (!el) return;

    const parent = el.closest('[id^="parent_"]') || el.parentElement;
    let feedback = parent.querySelector('.invalid-feedback');
    if (!feedback) {
      feedback = document.createElement('div');
      feedback.className = 'invalid-feedback';
      parent.appendChild(feedback);
    }

    feedback.innerText = message;
    feedback.style.display = 'block';

    el.classList.add('is-invalid');
    el.classList.remove('is-valid');

    if (el.tagName === "SELECT") {
      const wrapper = el.closest(".select-wrapper");
      if (wrapper) {
        const visibleInput = wrapper.querySelector("input.select-input, input.form-control");
        if (visibleInput) {
          visibleInput.classList.add('is-invalid');
          visibleInput.classList.remove('is-valid');
          wrapper.classList.add('is-invalid');
        }
      }
    }
  }

  showSuccess(elementId) {
    const el = document.getElementById(elementId);
    if (!el) return;
    this.resetError(el);
    el.classList.add('is-valid');

    if (el.tagName === "SELECT") {
      const wrapper = el.closest(".select-wrapper");
      if (wrapper) {
        const visibleInput = wrapper.querySelector("input.select-input, input.form-control");
        if (visibleInput) {
          visibleInput.classList.add('is-valid');
          visibleInput.classList.remove('is-invalid');
        }
        wrapper.classList.add('is-valid');
        wrapper.classList.remove('is-invalid');
      }
    }
  }

  resetError(el) {
    if (!el) return;
    el.classList.remove('is-invalid');

    const parent = el.closest('[id^="parent_"]') || el.parentElement;
    const feedback = parent ? parent.querySelector('.invalid-feedback') : null;
    if (feedback) {
      feedback.style.display = 'none';
      feedback.innerText = '';
    }

    if (el.tagName === "SELECT") {
      const wrapper = el.closest(".select-wrapper");
      if (wrapper) {
        wrapper.classList.remove('is-invalid');
        const visibleInput = wrapper.querySelector("input.select-input, input.form-control");
        if (visibleInput) visibleInput.classList.remove('is-invalid');
      }
    }
  }

  // ---------------------------------------------------------
  // 4. COMPONENT BUILDERS
  // ---------------------------------------------------------
  static _build(input = {}) {
    const type = input.type;
    const name = input.name || "";
    const value = input.value || "";
    const label = input.label || "";
    const id = input.id || name;
    const gridsize = input.gridsize || "";
    const className = input.class || "";
    const parentclass = input.parentclass || "";
    const placeholder = input.placeholder || "";
    const extra = input.extra || "";
    const dataRequired = extra.includes("required") ? 'data-validate="required"' : "";

    return `
        <div class="${gridsize}">
            <div id="parent_${id}" class="${parentclass}" data-mdb-input-init>
                <input type="${type}" name="${name}" value="${value}" id="${id}" 
                    class="${className}" placeholder="${placeholder}" ${extra} ${dataRequired} />
                <label class="form-label" for="${id}">${label}</label>
                <div class="invalid-feedback"></div>
            </div>
        </div>`;
  }

  text(input = {}) { return MDBInputBuilder._build({ ...input, type: "text" }); }
  number(input = {}) { return MDBInputBuilder._build({ ...input, type: "number" }); }
  tel(input = {}) { return MDBInputBuilder._build({ ...input, type: "tel" }); }
  email(input = {}) { return MDBInputBuilder._build({ ...input, type: "email" }); }
  password(input = {}) { return MDBInputBuilder._build({ ...input, type: "password" }); }

  /**
   * Enhanced Select Builder. 
   * Now automatically Maps custom Database keys to 'value' and 'text'
   * e.g., key: "organizationIdPk", value: "organizationName"
   */
  select(params = {}) {
    let attributes = [];
    if (params.id) attributes.push(`id="${params.id}"`);
    if (params.name) attributes.push(`name="${params.name}"`);
    if (params.multiple) attributes.push("multiple");
    if (params.disabled) attributes.push("disabled");
    attributes.push("data-mdb-select-init");

    if (params.search || params.search === undefined) attributes.push('data-mdb-filter="true"');
    if (params.clearButton || params.clearButton === undefined) attributes.push('data-mdb-clear-button="true"');
    if (params.placeholder) attributes.push(`data-mdb-placeholder="${params.placeholder}"`);
    if (params.visibleOptions) attributes.push(`data-mdb-visible-options="${params.visibleOptions}"`);

    if (params.validation) {
      attributes.push('data-mdb-validation="true"');
      attributes.push(`data-mdb-valid-feedback="${params.validFeedback || 'Valid'}"`);
      attributes.push(`data-mdb-invalid-feedback="${params.invalidFeedback || 'Invalid'}"`);
    }

    const sizeClass = params.size ? `form-control form-control-${params.size}` : `form-control form-control-sm`;

    const buildOption = (opt) => {
      // Handle mapping for Custom Keys (Fixes the "undefined" bug)
      let optValue = opt.value;
      let optText = opt.text;

      if (params.key && opt[params.key] !== undefined) {
          optValue = opt[params.key];
      }
      if (params.value && opt[params.value] !== undefined) {
          optText = opt[params.value];
      }

      // Fallback if data is missing
      optValue = optValue !== undefined ? optValue : "";
      optText = optText !== undefined ? optText : optValue;

      let optAttrs = [`value="${optValue}"`];
      if (opt.selected) optAttrs.push("selected");
      if (opt.disabled) optAttrs.push("disabled");
      if (opt.icon) optAttrs.push(`data-mdb-icon="${opt.icon}"`);
      if (opt.secondaryText) optAttrs.push(`data-mdb-secondary-text="${opt.secondaryText}"`);
      
      return `<option ${optAttrs.join(" ")}>${optText}</option>`;
    };

    let optionsHtml = "";
    (params.options || []).forEach((item) => {
      if (item.group && Array.isArray(item.options)) {
        const groupOptions = item.options.map(buildOption).join("");
        optionsHtml += `<optgroup label="${item.label}">${groupOptions}</optgroup>`;
      } else {
        optionsHtml += buildOption(item);
      }
    });

    const selectHtml = `<select class="select ${sizeClass} ${params.class || params.customClass || ''}" ${attributes.join(" ")}>${optionsHtml}</select>`;
    const labelHtml = params.label ? `<label class="form-label select-label" for="${params.id}">${params.label}</label>` : "";

    return `
        <div id="parent_${params.id}" class="${params.gridsize || params.parentclass || 'col-md-4'}">
            ${selectHtml}
            ${labelHtml}
            <div class="invalid-feedback"></div>
        </div>`.trim();
  }

  // Alias for backward compatibility
  select_multiselect(params = {}) {
      return this.select(params);
  }

  fileinput(input = {}) {
    const name = input.name || "";
    const id = input.id || name;
    const label = input.label || "Upload File";
    const gridsize = input.gridsize || "col-md-4";
    const validate = input.validate || false;
    const size = input.size || "sm";
    const sizeClass = size ? `form-control-${size}` : "";
    const allowedTypes = input.allowedtypes || [];
    const typeFilter = allowedTypes.length ? `accept="${allowedTypes.map((ext) => "." + ext).join(",")}" ` : "";
    const maxSizeMB = input.maxfilesize || 1024;
    const dataValidate = validate ? 'data-validate="required"' : "";
    const requiredAttr = validate ? "required" : "";

    return `
    <div class="${gridsize}">
      <label for="${id}" class="form-label">${label}</label>
      <input type="file" id="${id}" name="${name}" class="mb-1 form-control ${sizeClass}"
        data-mdb-file-input="true" ${typeFilter} data-max-size="${maxSizeMB}" ${dataValidate} ${requiredAttr} />
      <div class="invalid-feedback"></div>
    </div>`;
  }
  
  checkboxDynamic(objArray = [], parentColSize = "col-md-4", margin = "mt-1 mb-1") {
    let html = `<div class="${parentColSize} ${margin}">`;
    objArray.forEach((v) => {
      const checkedValue = v.checked ? "checked" : "";
      const dataValidate = v.validate ? 'data-validate="required"' : "";
      html += `
            <div id="parent_${v.nameid}" class="${margin} form-check">
                <input class="form-check-input" type="checkbox" value="${v.value}" name="${v.nameid}" id="${v.nameid}" ${checkedValue} ${dataValidate}/>
                <label class="form-check-label" for="${v.nameid}">${v.label}</label>
                <div class="invalid-feedback"></div>
            </div>`;
    });
    html += "</div>";
    return html;
  }

  datepicker(input = {}) {
    const id = input.id || "datepicker-" + Math.floor(Math.random() * 10000);
    const name = input.name || "";
    const label = input.label || "Select a date";
    const gridsize = input.gridsize || "col-md-4";
    const size = input.size || "";
    const validate = input.validate || false;

    let formattedDateString = "";
    let activeLabelClass = "";
    let validationClass = "";

    if (input.value) {
      const defaultDate = new Date(input.value);
      if (!isNaN(defaultDate.getTime())) {
        const day = defaultDate.getDate();
        const month = defaultDate.toLocaleString("default", { month: "long" });
        const year = defaultDate.getFullYear();
        formattedDateString = `${day} ${month} ${year}`;
        activeLabelClass = "active";
        if (validate) {
          validationClass = "is-valid";
        }
      }
    }

    const sizeClass = size ? `form-control-${size}` : "";
    const dataValidate = validate ? 'data-validate="required"' : "";
    const requiredAttr = validate ? "required" : "";

    return `
    <div class="${gridsize}">
      <div class="form-outline datepicker" data-mdb-format="d mmmm yyyy" id="parent_${id}">
        <input type="text" class="form-control ${sizeClass} datepicker-input ${activeLabelClass} ${validationClass}" 
          data-mdb-toggle="datepicker" id="${id}" name="${name}" value="${formattedDateString}" 
          ${dataValidate} ${requiredAttr} />
        <label for="${id}" class="form-label ${activeLabelClass}">${label}</label>
        <button class="datepicker-toggle-button" type="button" data-mdb-toggle="datepicker">
          <i class="fas fa-calendar datepicker-toggle-icon"></i>
        </button>
        <div class="invalid-feedback"></div>
      </div>
    </div>`;
  }

  switch(input = {}) {
    const id = input.id || "switch-" + Math.floor(Math.random() * 10000);
    const name = input.name || "";
    const label = input.label || "";
    const value = input.value || "on";
    const checked = input.checked ? "checked" : "";
    const disabled = input.disabled ? "disabled" : "";
    const gridsize = input.gridsize || "col-md-4";

    return `
    <div class="${gridsize} d-flex align-items-center">
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" 
               id="${id}" name="${name}" value="${value}" ${checked} ${disabled} />
        <label class="form-check-label" for="${id}">${label}</label>
      </div>
    </div>`;
  }

  radio(input = {}) {
    const name = input.name || "radioGroup";
    const label = input.label || ""; 
    const options = input.options || []; 
    const gridsize = input.gridsize || "col-md-12";
    const inline = input.inline ? "form-check-inline" : "";

    let optionsHtml = "";
    options.forEach((opt, index) => {
      const optId = `${name}_${index}`;
      const isChecked = opt.checked ? "checked" : "";
      const isDisabled = opt.disabled ? "disabled" : "";
      
      optionsHtml += `
      <div class="form-check ${inline}">
        <input class="form-check-input" type="radio" name="${name}" id="${optId}" value="${opt.value}" ${isChecked} ${isDisabled} />
        <label class="form-check-label" for="${optId}">${opt.label}</label>
      </div>`;
    });

    return `
    <div class="${gridsize}">
        ${label ? `<label class="form-label d-block mb-2">${label}</label>` : ''}
        ${optionsHtml}
    </div>`;
  }

  range(input = {}) {
    const id = input.id || "range-" + Math.floor(Math.random() * 10000);
    const label = input.label || "";
    const min = input.min || 0;
    const max = input.max || 100;
    const step = input.step || 1;
    const value = input.value || 0;
    const gridsize = input.gridsize || "col-md-12";

    return `
    <div class="${gridsize}">
       <label class="form-label" for="${id}">${label}</label>
       <div class="range">
         <input type="range" class="form-range" min="${min}" max="${max}" step="${step}" value="${value}" id="${id}" />
       </div>
    </div>`;
  }

  info(dataArray = []) {
    let html = '<div class="row w-100 mb-3">';
    dataArray.forEach(item => {
      const grid = item.gridsize || 'col-md-6';
      html += `
        <div class="${grid} mb-2">
          <span class="text-muted small d-block">${item.label}</span>
          <span class="fw-bold text-dark">${item.value}</span>
        </div>
      `;
    });
    html += '</div>';
    return html;
  }

  format_year(element) {
    if (!element) return;
    let val = element.value.replace(/\D/g, ''); 
    if (val.length > 4) {
        val = val.substring(0, 4);
    }
    element.value = val;
  }
}

window.MDBInputBuilder = MDBInputBuilder;