let currentStep = 0;
const steps = document.querySelectorAll(".step");

function showStep(index) {
    steps.forEach((step, i) => {
        step.classList.remove("active");
        if (i === index) step.classList.add("active");
    });

    const nextBtn = document.querySelector("button[onclick='nextStep()']");
    const prevBtn = document.querySelector("button[onclick='prevStep()']");
    const submitBtn = document.getElementById("submitBtn");

    if (index === steps.length - 1) {
        nextBtn.style.display = "none";
        submitBtn.style.display = "block";
    } else {
        nextBtn.style.display = "inline-block";
        submitBtn.style.display = "none";
    }

    prevBtn.style.display = (index === 0) ? "none" : "inline-block";
}

window.nextStep = function () {
    const current = steps[currentStep];

    // 🔥 VALIDASI NAMA (STEP 0)
    if (currentStep === 0) {
        const nama = current.querySelector("input[name='nama']");

        if (!nama.value.trim()) {
            showAlert("Nama wajib diisi!");
            nama.focus();
            return;
        }
    }

    // 🔥 VALIDASI SEMUA RADIO DI STEP
    const radios = current.querySelectorAll("input[type='radio']");

    if (radios.length > 0) {
        const names = [...new Set(Array.from(radios).map(r => r.name))];

        for (let name of names) {
            const checked = current.querySelector(`input[name="${name}"]:checked`);

            if (!checked) {
                showAlert("Semua pertanyaan harus dijawab!");
                return;
            }
        }
    }

    // lanjut step
    if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
};

window.prevStep = function () {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
};

// 🔥 NOTIF CUSTOM
function showAlert(msg) {
    let alertBox = document.getElementById("alertBox");

    if (!alertBox) {
        alertBox = document.createElement("div");
        alertBox.id = "alertBox";
        alertBox.style.position = "fixed";
        alertBox.style.top = "20px";
        alertBox.style.left = "50%";
        alertBox.style.transform = "translateX(-50%)";
        alertBox.style.background = "#e74c3c";
        alertBox.style.color = "white";
        alertBox.style.padding = "10px 20px";
        alertBox.style.borderRadius = "6px";
        alertBox.style.zIndex = "9999";
        alertBox.style.fontSize = "14px";
        document.body.appendChild(alertBox);
    }

    alertBox.innerText = msg;

    setTimeout(() => {
        alertBox.remove();
    }, 2000);
}

// INIT
document.addEventListener("DOMContentLoaded", function () {
    showStep(currentStep);
});
