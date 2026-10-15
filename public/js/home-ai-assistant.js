/**
 * D-KREASI Home AI Assistant (L1 Concierge)
 * Connects frontend widget to POST /api/ai/chat with dynamic routing & WhatsApp handoff
 */
(() => {
    'use strict';

    const root = document.getElementById('dkreasi-ai');
    if (!root) return;

    // Prevent duplicate initializations
    if (root.dataset.initialized === 'true') return;
    root.dataset.initialized = 'true';

    const launcher = root.querySelector('#dkreasi-ai-launcher');
    const panel = root.querySelector('#dkreasi-ai-panel');
    const closeBtn = root.querySelector('#dkreasi-ai-close');
    const messagesContainer = root.querySelector('#dkreasi-ai-messages');
    const form = root.querySelector('#dkreasi-ai-form');
    const input = root.querySelector('#dkreasi-ai-input');
    const sendBtn = root.querySelector('#dkreasi-ai-send');
    const typingIndicator = root.querySelector('#dkreasi-ai-typing');
    const suggestionsContainer = root.querySelector('#dkreasi-ai-suggestions');

    const apiUrl = root.dataset.apiUrl || '/api/ai/chat';
    const defaultWhatsappUrl = root.dataset.whatsappUrl || 'https://wa.me/6281234567890';

    // Session Management
    const SESSION_KEY = 'dkreasi_ai_session_id';
    let sessionId = sessionStorage.getItem(SESSION_KEY);
    if (!sessionId) {
        sessionId = 'dk_' + (typeof crypto !== 'undefined' && crypto.randomUUID ? crypto.randomUUID() : Math.random().toString(36).substring(2, 15));
        sessionStorage.setItem(SESSION_KEY, sessionId);
    }

    // In-memory conversation history
    const history = [];

    // Helper: Scroll messages container to bottom
    const scrollToBottom = () => {
        if (!messagesContainer) return;
        requestAnimationFrame(() => {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        });
    };

    // Helper: Toggle Panel visibility
    const setPanelOpen = (isOpen) => {
        panel.classList.toggle('is-open', isOpen);
        panel.setAttribute('aria-hidden', String(!isOpen));
        panel.inert = !isOpen;

        launcher.setAttribute('aria-expanded', String(isOpen));
        launcher.setAttribute('aria-label', isOpen ? 'Tutup AI Assistant D-KREASI' : 'Buka AI Assistant D-KREASI');

        if (isOpen) {
            setTimeout(() => {
                input.focus();
                scrollToBottom();
            }, 150);
        } else {
            launcher.focus();
        }
    };

    // Event Listeners for Open / Close
    launcher.addEventListener('click', () => {
        setPanelOpen(!panel.classList.contains('is-open'));
    });

    closeBtn.addEventListener('click', () => {
        setPanelOpen(false);
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && panel.classList.contains('is-open')) {
            setPanelOpen(false);
        }
    });

    // Global trigger for any [data-ai] button across the page (e.g., in Hero section)
    document.querySelectorAll('[data-ai]').forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            setPanelOpen(true);
        });
    });

    // Input auto-resize and send button state
    input.addEventListener('input', () => {
        input.style.height = 'auto';
        input.style.height = `${Math.min(input.scrollHeight, 100)}px`;
        sendBtn.disabled = input.value.trim().length === 0;
    });

    // Enter to submit (Shift+Enter for newline)
    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            if (!sendBtn.disabled) {
                form.dispatchEvent(new Event('submit', { cancelable: true }));
            }
        }
    });

    // Append message bubble to chat UI
    const appendMessageBubble = (role, text) => {
        const messageEl = document.createElement('div');
        messageEl.className = `dkreasi-ai__message dkreasi-ai__message--${role}`;

        const bubbleEl = document.createElement('div');
        bubbleEl.className = 'dkreasi-ai__bubble';
        bubbleEl.textContent = text ? text.trim() : '';

        messageEl.appendChild(bubbleEl);

        // Insert before typing indicator
        messagesContainer.insertBefore(messageEl, typingIndicator);
        scrollToBottom();
        return messageEl;
    };

    // Render dynamic action buttons from intent routing decision
    const renderRoutingActions = (routing) => {
        if (!routing || typeof routing !== 'object') return;

        const actionCard = document.createElement('div');
        actionCard.className = 'dkreasi-ai__action-card';

        // 1. Navigation Action (Webia / Undangan)
        if (routing.action === 'navigate' && routing.target_url) {
            const label = document.createElement('span');
            label.className = 'dkreasi-ai__action-card-label';
            label.textContent = '✦ Rekomendasi Solusi';
            actionCard.appendChild(label);

            const btn = document.createElement('a');
            btn.href = routing.target_url;
            btn.className = 'dkreasi-ai__action-btn dkreasi-ai__action-btn--primary';
            btn.textContent = routing.button_text || 'Lihat Layanan →';
            actionCard.appendChild(btn);
        }
        // 2. WhatsApp Customer Support Handoff
        else if (routing.action === 'handoff') {
            const label = document.createElement('span');
            label.className = 'dkreasi-ai__action-card-label';
            label.textContent = '💬 Customer Support Resmi';
            actionCard.appendChild(label);

            const btn = document.createElement('a');
            btn.href = routing.target_url || defaultWhatsappUrl;
            btn.target = '_blank';
            btn.rel = 'noopener noreferrer';
            btn.className = 'dkreasi-ai__action-btn dkreasi-ai__action-btn--whatsapp';
            btn.innerHTML = `
                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true">
                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm0 18.15c-1.5 0-2.97-.39-4.26-1.14l-.31-.18-3.12.82.83-3.04-.2-.32a8.09 8.09 0 0 1-1.24-4.38c0-4.47 3.64-8.11 8.1-8.11 2.16 0 4.2 0.84 5.73 2.37 1.53 1.53 2.37 3.56 2.37 5.73 0 4.47-3.64 8.11-8.1 8.11zm4.44-6.08c-.24-.12-1.44-.71-1.66-.79-.23-.08-.39-.12-.56.12-.17.24-.65.79-.8 0.95-.15.16-.3.18-.54.06-.24-.12-1.02-.38-1.95-1.21-.72-.64-1.21-1.44-1.35-1.68-.14-.24-.02-.37.1-.49.11-.11.24-.29.36-.43.12-.15.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.16 0-.42.06-.64.3-.22.24-.85.83-.85 2.02 0 1.2 0.87 2.35.99 2.51.12.16 1.71 2.61 4.14 3.66.58.25 1.03.4 1.38.51.58.18 1.11.16 1.53.1.47-.07 1.44-.59 1.64-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28z"/>
                </svg>
                <span>${routing.button_text || 'Hubungi CS via WhatsApp'}</span>
            `;
            actionCard.appendChild(btn);
        }
        // 3. Clarification Action
        else if (routing.action === 'clarify') {
            const label = document.createElement('span');
            label.className = 'dkreasi-ai__action-card-label';
            label.textContent = 'Pilih Kebutuhan Anda:';
            actionCard.appendChild(label);

            const choices = document.createElement('div');
            choices.className = 'dkreasi-ai__clarify-choices';

            const optWeb = document.createElement('button');
            optWeb.type = 'button';
            optWeb.className = 'dkreasi-ai__clarify-btn';
            optWeb.textContent = '💻 Website Bisnis';
            optWeb.addEventListener('click', () => sendMessage('Saya tertarik dengan layanan Website Bisnis.'));

            const optUndangan = document.createElement('button');
            optUndangan.type = 'button';
            optUndangan.className = 'dkreasi-ai__clarify-btn';
            optUndangan.textContent = '💌 Undangan Digital';
            optUndangan.addEventListener('click', () => sendMessage('Saya ingin info tentang Undangan Digital.'));

            choices.appendChild(optWeb);
            choices.appendChild(optUndangan);
            actionCard.appendChild(choices);
        }

        messagesContainer.insertBefore(actionCard, typingIndicator);
        scrollToBottom();
    };

    // Send Message to Backend API
    const sendMessage = async (userText) => {
        const text = userText ? userText.trim() : input.value.trim();
        if (!text) return;

        // Hide suggestions once conversation starts
        if (suggestionsContainer) {
            suggestionsContainer.style.display = 'none';
        }

        // Render user message bubble
        appendMessageBubble('user', text);
        history.push({ role: 'user', content: text });

        // Reset input
        input.value = '';
        input.style.height = 'auto';
        sendBtn.disabled = true;
        input.disabled = true;

        // Show typing indicator
        typingIndicator.removeAttribute('hidden');
        typingIndicator.setAttribute('aria-hidden', 'false');
        scrollToBottom();

        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({
                    layer: 'l1',
                    session_id: sessionId,
                    messages: history,
                }),
            });

            const data = await response.json();

            // Hide typing indicator
            typingIndicator.setAttribute('hidden', '');
            typingIndicator.setAttribute('aria-hidden', 'true');

            if (response.ok && data.success && data.message) {
                const assistantContent = data.message.content || 'Terima kasih atas pertanyaannya.';
                appendMessageBubble('assistant', assistantContent);
                history.push({ role: 'assistant', content: assistantContent });

                // Render structured routing card if provided
                if (data.routing) {
                    renderRoutingActions(data.routing);
                }
            } else {
                const errorMsg = data.message || 'Mohon maaf, saat ini asisten belum dapat memproses pertanyaan Anda.';
                appendMessageBubble('assistant', errorMsg);
                renderRoutingActions({
                    action: 'handoff',
                    target_url: defaultWhatsappUrl,
                    button_text: 'Hubungi Customer Support WhatsApp',
                });
            }
        } catch (err) {
            // Network or server error
            typingIndicator.setAttribute('hidden', '');
            typingIndicator.setAttribute('aria-hidden', 'true');

            appendMessageBubble(
                'assistant',
                'Mohon maaf, terjadi gangguan koneksi ke server AI. Anda dapat langsung berkonsultasi dengan CS kami melalui WhatsApp.'
            );
            renderRoutingActions({
                action: 'handoff',
                target_url: defaultWhatsappUrl,
                button_text: 'Hubungi CS via WhatsApp',
            });
        } finally {
            input.disabled = false;
            input.focus();
        }
    };

    // Form submit listener
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        sendMessage();
    });

    // Quick suggestion chips handler
    root.querySelectorAll('.dkreasi-ai__chip').forEach((chip) => {
        chip.addEventListener('click', () => {
            const prompt = chip.dataset.prompt;
            if (prompt) {
                sendMessage(prompt);
            }
        });
    });
})();
