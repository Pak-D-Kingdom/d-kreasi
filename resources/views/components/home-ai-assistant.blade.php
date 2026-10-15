@php
    $router = app(\App\Services\AI\Routing\ServiceIntentRouter::class);
    $csWhatsappUrl = $router->getWhatsAppUrl();
@endphp

<div class="dkreasi-ai" id="dkreasi-ai" data-whatsapp-url="{{ $csWhatsappUrl }}" data-api-url="{{ route('ai.chat', [], false) ?: '/api/ai/chat' }}">
    <!-- Floating Launcher Button -->
    <button
        type="button"
        class="dkreasi-ai__launcher"
        id="dkreasi-ai-launcher"
        aria-label="Buka AI Assistant D-KREASI"
        aria-expanded="false"
        aria-controls="dkreasi-ai-panel"
    >
        <span class="dkreasi-ai__launcher-icon" aria-hidden="true">✦</span>
        <span class="dkreasi-ai__launcher-label">Tanya AI Assistant</span>
        <span class="dkreasi-ai__launcher-pulse" aria-hidden="true"></span>
    </button>

    <!-- Chat Panel -->
    <section
        class="dkreasi-ai__panel"
        id="dkreasi-ai-panel"
        role="dialog"
        aria-modal="false"
        aria-labelledby="dkreasi-ai-title"
        aria-hidden="true"
        inert
    >
        <!-- Header -->
        <header class="dkreasi-ai__header">
            <div class="dkreasi-ai__identity">
                <div class="dkreasi-ai__avatar" aria-hidden="true">
                    <span>✦</span>
                </div>
                <div class="dkreasi-ai__identity-meta">
                    <h2 id="dkreasi-ai-title">D-KREASI Assistant</h2>
                    <p>
                        <span class="dkreasi-ai__status-dot" aria-hidden="true"></span>
                        Front-Desk · PakDe Group
                    </p>
                </div>
            </div>

            <div class="dkreasi-ai__header-actions">
                <a
                    href="{{ $csWhatsappUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="dkreasi-ai__header-wa"
                    aria-label="Hubungi WhatsApp Customer Support PakDe Group"
                    title="Hubungi CS WhatsApp"
                >
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor" aria-hidden="true">
                        <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm0 18.15c-1.5 0-2.97-.39-4.26-1.14l-.31-.18-3.12.82.83-3.04-.2-.32a8.09 8.09 0 0 1-1.24-4.38c0-4.47 3.64-8.11 8.1-8.11 2.16 0 4.2 0.84 5.73 2.37 1.53 1.53 2.37 3.56 2.37 5.73 0 4.47-3.64 8.11-8.1 8.11zm4.44-6.08c-.24-.12-1.44-.71-1.66-.79-.23-.08-.39-.12-.56.12-.17.24-.65.79-.8 0.95-.15.16-.3.18-.54.06-.24-.12-1.02-.38-1.95-1.21-.72-.64-1.21-1.44-1.35-1.68-.14-.24-.02-.37.1-.49.11-.11.24-.29.36-.43.12-.15.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.16 0-.42.06-.64.3-.22.24-.85.83-.85 2.02 0 1.2 0.87 2.35.99 2.51.12.16 1.71 2.61 4.14 3.66.58.25 1.03.4 1.38.51.58.18 1.11.16 1.53.1.47-.07 1.44-.59 1.64-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28z"/>
                    </svg>
                    <span>CS</span>
                </a>

                <button
                    type="button"
                    class="dkreasi-ai__close"
                    id="dkreasi-ai-close"
                    aria-label="Tutup AI Assistant"
                >×</button>
            </div>
        </header>

        <!-- Message Body -->
        <div class="dkreasi-ai__messages" id="dkreasi-ai-messages" aria-live="polite">
            <!-- Welcome Banner -->
            <div class="dkreasi-ai__welcome">
                <span class="dkreasi-ai__eyebrow">✦ PAKDE GROUP AI CONCIERGE</span>
                <h3>Halo! Butuh solusi kreasi digital? ✨</h3>
                <p>
                    Saya siap memandu Anda menemukan layanan terbaik dari PakDe Group:
                    mulai dari <strong>Website Bisnis</strong> hingga <strong>Undangan Digital</strong>.
                </p>
            </div>

            <!-- Initial Assistant Bubble -->
            <div class="dkreasi-ai__message dkreasi-ai__message--assistant">
                <div class="dkreasi-ai__bubble">Halo! Ada yang bisa saya bantu hari ini? Anda sedang mencari solusi Website Bisnis, Undangan Digital, atau ingin berkonsultasi seputar layanan kami?</div>
            </div>

            <!-- Quick Suggestions -->
            <div class="dkreasi-ai__suggestions" id="dkreasi-ai-suggestions" aria-label="Rekomendasi topik">
                <button type="button" class="dkreasi-ai__chip" data-prompt="Saya butuh website untuk mengembangkan usaha bisnis saya.">
                    💻 Buat Website Bisnis
                </button>
                <button type="button" class="dkreasi-ai__chip" data-prompt="Bisa bantu buat undangan pernikahan digital?">
                    💌 Undangan Digital
                </button>
                <button type="button" class="dkreasi-ai__chip" data-prompt="Apa saja layanan yang tersedia di D-KREASI?">
                    ✦ Layanan D-KREASI
                </button>
                <button type="button" class="dkreasi-ai__chip" data-prompt="Saya ingin berbicara dengan customer service WhatsApp.">
                    💬 Hubungi CS WhatsApp
                </button>
            </div>

            <!-- Typing indicator (hidden by default) -->
            <div class="dkreasi-ai__typing" id="dkreasi-ai-typing" hidden aria-hidden="true">
                <div class="dkreasi-ai__typing-bubble">
                    <span class="dkreasi-ai__dot"></span>
                    <span class="dkreasi-ai__dot"></span>
                    <span class="dkreasi-ai__dot"></span>
                </div>
                <span class="dkreasi-ai__typing-text">Asisten sedang merespons...</span>
            </div>
        </div>

        <!-- Input Form -->
        <form class="dkreasi-ai__form" id="dkreasi-ai-form">
            <label class="dkreasi-ai__sr-only" for="dkreasi-ai-input">
                Tulis pertanyaan Anda
            </label>

            <textarea
                id="dkreasi-ai-input"
                name="message"
                rows="1"
                maxlength="1000"
                placeholder="Tulis pertanyaan Anda di sini..."
                autocomplete="off"
            ></textarea>

            <button type="submit" aria-label="Kirim pertanyaan" disabled id="dkreasi-ai-send">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="19" x2="12" y2="5"></line>
                    <polyline points="5 12 12 5 19 12"></polyline>
                </svg>
            </button>
        </form>

        <!-- Footer Disclaimer -->
        <footer class="dkreasi-ai__footer">
            <span>D-KREASI AI Assistant · Solusi Digital Kreatif by PakDe Group</span>
        </footer>
    </section>
</div>
