
/* =========================================
   WEBIA AI ASSISTANT
   Frontend interactions only
   AI/API connection handled by the AI team
========================================= */

(() => {
    const root = document.getElementById("webia-ai");

    if (!root || root.dataset.initialized === "true") return;
    root.dataset.initialized = "true";

    const launcher = root.querySelector("#webia-ai-launcher");
    const panel = root.querySelector("#webia-ai-panel");
    const closeButton = root.querySelector("#webia-ai-close");
    const input = root.querySelector("#webia-ai-input");
    const sendButton = root.querySelector("#webia-ai-send");
    const form = root.querySelector("#webia-ai-form");
    const notice = root.querySelector("#webia-ai-notice");
    const suggestions = root.querySelectorAll("[data-prompt]");

    if (
        !launcher ||
        !panel ||
        !closeButton ||
        !input ||
        !sendButton ||
        !form
    ) {
        return;
    }

    // Open and close the chat panel.
    const setPanelOpen = (isOpen) => {
        panel.classList.toggle("is-open", isOpen);
        panel.setAttribute("aria-hidden", String(!isOpen));
        panel.inert = !isOpen;

        launcher.setAttribute("aria-expanded", String(isOpen));
        launcher.setAttribute(
            "aria-label",
            isOpen ? "Tutup AI Assistant WEBIA" : "Buka AI Assistant WEBIA"
        );

        if (isOpen) {
            input.focus();
        } else {
            launcher.focus();
        }
    };

    launcher.addEventListener("click", () => {
        setPanelOpen(!panel.classList.contains("is-open"));
    });

    closeButton.addEventListener("click", () => {
        setPanelOpen(false);
    });

    // Enable the send button when the visitor types.
    const updateSendButton = () => {
        sendButton.disabled = input.value.trim().length === 0;
    };

    input.addEventListener("input", () => {
        input.style.height = "auto";
        input.style.height = `${Math.min(input.scrollHeight, 95)}px`;

        updateSendButton();
    });

    // Topic buttons fill the input; they do not generate AI answers.
    suggestions.forEach((button) => {
        button.addEventListener("click", () => {
            input.value = button.dataset.prompt || "";
            input.dispatchEvent(new Event("input", { bubbles: true }));
            input.focus();
        });
    });

    // Placeholder submission until the AI endpoint is provided.
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const message = input.value.trim();

        if (!message) return;

        if (notice) {
            notice.classList.add("webia-ai__notice--highlight");
            notice.textContent =
                "Chat AI belum terhubung. Pesan belum dikirim. Integrasi akan dilakukan oleh tim AI.";
        }

        // Intentionally no API request or simulated AI response.
        // Connect this form to the approved backend endpoint later.
    });

    // Close the panel with Escape.
    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape" &&
            panel.classList.contains("is-open")
        ) {
            setPanelOpen(false);
        }
    });

    updateSendButton();
})();
