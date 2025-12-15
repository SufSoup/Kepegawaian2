/**
 * ========================================
 * SISTEM KEPEGAWAIAN - JAVASCRIPT
 * ========================================
 * Enhancement untuk User Experience
 * - Form validation
 * - Date calculations
 * - Confirmation dialogs
 * - Auto-submit on select change
 */

// DOM Ready
document.addEventListener("DOMContentLoaded", function () {
  console.log("Sistem Kepegawaian JS Loaded");

  // Initialize all functions
  initFormValidation();
  initCutiCalculation();
  initConfirmDialogs();
  initAutoSubmit();
  initDateValidation();
  initPasswordToggle();
});

/**
 * ========================================
 * FORM VALIDATION
 * ========================================
 */
function initFormValidation() {
  // Email validation
  const emailInputs = document.querySelectorAll('input[type="email"]');
  emailInputs.forEach((input) => {
    input.addEventListener("blur", function () {
      validateEmail(this);
    });
  });

  // Required fields validation
  const requiredInputs = document.querySelectorAll("input[required], select[required], textarea[required]");
  requiredInputs.forEach((input) => {
    input.addEventListener("blur", function () {
      validateRequired(this);
    });
  });

  // Form submit validation
  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      if (!validateForm(this)) {
        e.preventDefault();
        alert("Mohon isi semua field yang diperlukan dengan benar");
        return false;
      }
    });
  });
}

/**
 * Validate Email Format
 */
function validateEmail(input) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (input.value && !emailRegex.test(input.value)) {
    input.classList.add("is-invalid");

    // Add error message
    let errorDiv = input.nextElementSibling;
    if (!errorDiv || !errorDiv.classList.contains("invalid-feedback")) {
      errorDiv = document.createElement("div");
      errorDiv.className = "invalid-feedback";
      input.parentNode.insertBefore(errorDiv, input.nextSibling);
    }
    errorDiv.textContent = "Format email tidak valid";

    return false;
  } else {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
    return true;
  }
}

/**
 * Validate Required Fields
 */
function validateRequired(input) {
  if (!input.value.trim()) {
    input.classList.add("is-invalid");
    return false;
  } else {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
    return true;
  }
}

/**
 * Validate Entire Form
 */
function validateForm(form) {
  let isValid = true;

  // Check required fields
  const requiredFields = form.querySelectorAll("[required]");
  requiredFields.forEach((field) => {
    if (!field.value.trim()) {
      field.classList.add("is-invalid");
      isValid = false;
    }
  });

  // Check email fields
  const emailFields = form.querySelectorAll('input[type="email"]');
  emailFields.forEach((field) => {
    if (field.value && !validateEmail(field)) {
      isValid = false;
    }
  });

  return isValid;
}

/**
 * ========================================
 * CUTI CALCULATION
 * ========================================
 * Auto-calculate jumlah hari cuti
 */
function initCutiCalculation() {
  const tglMulai = document.getElementById("Tgl_Mulai");
  const tglSelesai = document.getElementById("Tgl_Selesai");

  if (tglMulai && tglSelesai) {
    tglMulai.addEventListener("change", calculateCutiDays);
    tglSelesai.addEventListener("change", calculateCutiDays);

    // Calculate on page load if values exist
    if (tglMulai.value && tglSelesai.value) {
      calculateCutiDays();
    }
  }
}

/**
 * Calculate Days Between Two Dates
 */
function calculateCutiDays() {
  const tglMulai = document.getElementById("Tgl_Mulai");
  const tglSelesai = document.getElementById("Tgl_Selesai");

  if (!tglMulai || !tglSelesai || !tglMulai.value || !tglSelesai.value) {
    return;
  }

  const startDate = new Date(tglMulai.value);
  const endDate = new Date(tglSelesai.value);

  // Validate dates
  if (endDate < startDate) {
    alert("Tanggal selesai tidak boleh lebih awal dari tanggal mulai");
    tglSelesai.value = "";
    return;
  }

  // Calculate days (inclusive)
  const timeDiff = endDate.getTime() - startDate.getTime();
  const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;

  // Display result
  let resultDiv = document.getElementById("cuti-days-result");
  if (!resultDiv) {
    resultDiv = document.createElement("div");
    resultDiv.id = "cuti-days-result";
    resultDiv.className = "alert alert-info mt-2";
    tglSelesai.parentNode.appendChild(resultDiv);
  }

  resultDiv.innerHTML = `
        <strong>Jumlah Hari:</strong> ${daysDiff} hari
        <small class="d-block">Dari ${formatDate(startDate)} sampai ${formatDate(endDate)}</small>
    `;
}

/**
 * Format Date to Indonesian Format
 */
function formatDate(date) {
  const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

  return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
}

/**
 * ========================================
 * CONFIRMATION DIALOGS
 * ========================================
 */
function initConfirmDialogs() {
  // Delete confirmation
  const deleteButtons = document.querySelectorAll('a[href*="/delete/"], button[onclick*="delete"]');
  deleteButtons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      const confirmMsg = this.dataset.confirm || "Apakah Anda yakin ingin menghapus data ini?";
      if (!confirm(confirmMsg)) {
        e.preventDefault();
        return false;
      }
    });
  });

  // Approve/Reject confirmation
  const approveButtons = document.querySelectorAll('a[href*="/approve/"]');
  approveButtons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      if (!confirm("Setujui pengajuan cuti ini?")) {
        e.preventDefault();
        return false;
      }
    });
  });

  const rejectButtons = document.querySelectorAll('a[href*="/reject/"]');
  rejectButtons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      if (!confirm("Tolak pengajuan cuti ini?")) {
        e.preventDefault();
        return false;
      }
    });
  });
}

/**
 * ========================================
 * AUTO SUBMIT ON SELECT CHANGE
 * ========================================
 * For sorting, filtering, etc.
 */
function initAutoSubmit() {
  const autoSubmitSelects = document.querySelectorAll('select[onchange*="submit"], select.auto-submit');
  autoSubmitSelects.forEach((select) => {
    // Remove inline onchange if exists
    select.removeAttribute("onchange");

    // Add event listener
    select.addEventListener("change", function () {
      // Show loading indicator
      const originalHTML = this.innerHTML;
      this.disabled = true;

      // Submit form
      this.form.submit();
    });
  });
}

/**
 * ========================================
 * DATE VALIDATION
 * ========================================
 * Prevent past dates, validate date ranges
 */
function initDateValidation() {
  // Tanggal lahir - tidak boleh lebih dari 100 tahun atau di masa depan
  const tglLahir = document.getElementById("Tgl_Lahir");
  if (tglLahir) {
    const today = new Date();
    const maxDate = today.toISOString().split("T")[0];
    const minDate = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate()).toISOString().split("T")[0];

    tglLahir.setAttribute("max", maxDate);
    tglLahir.setAttribute("min", minDate);
  }

  // Tanggal masuk - tidak boleh di masa depan
  const tglMasuk = document.getElementById("Tgl_Masuk");
  if (tglMasuk) {
    const today = new Date().toISOString().split("T")[0];
    tglMasuk.setAttribute("max", today);
  }

  // Tanggal cuti - minimal besok
  const tglMulai = document.getElementById("Tgl_Mulai");
  if (tglMulai) {
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const minDate = tomorrow.toISOString().split("T")[0];
    tglMulai.setAttribute("min", minDate);
  }
}

/**
 * ========================================
 * PASSWORD TOGGLE
 * ========================================
 * Show/hide password
 */
function initPasswordToggle() {
  const passwordInputs = document.querySelectorAll('input[type="password"]');

  passwordInputs.forEach((input) => {
   

    // Insert button after input
    input.parentNode.insertBefore(toggleBtn, input.nextSibling);

    // Toggle password visibility
    toggleBtn.addEventListener("click", function () {
      if (input.type === "password") {
        input.type = "text";
        this.innerHTML = '<i class="bi bi-eye-slash"></i>';
      } else {
        input.type = "password";
        this.innerHTML = '<i class="bi bi-eye"></i>';
      }
    });
  });
}

/**
 * ========================================
 * UTILITY FUNCTIONS
 * ========================================
 */

/**
 * Show Loading Overlay
 */
function showLoading(message = "Loading...") {
  const overlay = document.createElement("div");
  overlay.id = "loading-overlay";
  overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    `;

  overlay.innerHTML = `
        <div class="bg-white p-4 rounded shadow">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2 mb-0">${message}</p>
        </div>
    `;

  document.body.appendChild(overlay);
}

/**
 * Hide Loading Overlay
 */
function hideLoading() {
  const overlay = document.getElementById("loading-overlay");
  if (overlay) {
    overlay.remove();
  }
}

/**
 * Show Toast Notification
 */
function showToast(message, type = "success") {
  const toast = document.createElement("div");
  toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
  toast.style.cssText = "top: 20px; right: 20px; z-index: 9999; min-width: 300px;";
  toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

  document.body.appendChild(toast);

  // Auto remove after 5 seconds
  setTimeout(() => {
    toast.remove();
  }, 5000);
}

/**
 * Format Currency (Indonesian Rupiah)
 */
function formatRupiah(amount) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(amount);
}

/**
 * Format Number with Thousand Separator
 */
function formatNumber(number) {
  return new Intl.NumberFormat("id-ID").format(number);
}

/**
 * ========================================
 * EXPORT FUNCTIONS FOR INLINE USE
 * ========================================
 */
window.validateEmail = validateEmail;
window.validateRequired = validateRequired;
window.validateForm = validateForm;
window.showLoading = showLoading;
window.hideLoading = hideLoading;
window.showToast = showToast;
window.formatRupiah = formatRupiah;
window.formatNumber = formatNumber;

console.log("All functions loaded successfully");
