
<div class="webia-ai" id="webia-ai">
    <!-- Tombol pembuka AI Assistant -->
    <button
        type="button"
        class="webia-ai__launcher"
        id="webia-ai-launcher"
        aria-label="Buka AI Assistant WEBIA"
        aria-expanded="false"
        aria-controls="webia-ai-panel"
    >
        <span class="webia-ai__launcher-icon" aria-hidden="true">✦</span>
        <span class="webia-ai__launcher-label">AI Assistant</span>
    </button>

    <!-- Panel percakapan -->
    <section
        class="webia-ai__panel"
        id="webia-ai-panel"
        role="dialog"
        aria-modal="false"
        aria-labelledby="webia-ai-title"
        aria-hidden="true"
        inert
    >
        <header class="webia-ai__header">
            <div class="webia-ai__identity">
                <div class="webia-ai__avatar" aria-hidden="true">✦</div>
                <div>
                    <h2 id="webia-ai-title">WEBIA Assistant</h2>
                    <p>
                        <span class="webia-ai__status-dot"></span>
                        Asisten digital WEBIA
                    </p>
                </div>
            </div>

            <button
                type="button"
                class="webia-ai__close"
                id="webia-ai-close"
                aria-label="Tutup AI Assistant"
            >×</button>
        </header>

        <div class="webia-ai__messages" id="webia-ai-messages" aria-live="polite">
            <div class="webia-ai__welcome">
                <span class="webia-ai__eyebrow">WELCOME TO WEBIA</span>
                <h3>Hai! Mau bikin website impianmu? ✨</h3>
                <p>
                    Aku siap membantumu menjelajahi layanan WEBIA.
                    Pilih topik di bawah atau tulis pertanyaanmu.
                </p>
            </div>

            <div class="webia-ai__message webia-ai__message--assistant">
                Halo! Kamu sedang mencari website untuk bisnis,
                ingin melihat paket layanan, atau butuh bantuan
                menentukan jenis website yang cocok?
            </div>

            <div class="webia-ai__suggestions" aria-label="Topik percakapan">
                <button type="button" data-prompt="Saya ingin mengetahui paket website bisnis.">
                    💻 Paket website
                </button>
                <button type="button" data-prompt="Apa perbedaan website landing page dan website dengan admin?">
                    ✨ Jenis website
                </button>
                <button type="button" data-prompt="Saya ingin berkonsultasi tentang kebutuhan website bisnis.">
                    🚀 Konsultasi
                </button>
            </div>
        </div>

        <div class="webia-ai__notice" id="webia-ai-notice">
            <span aria-hidden="true">✦</span>
            <span>Tampilan asisten sedang disiapkan. Chat AI akan tersedia setelah integrasi backend.</span>
        </div>

        <form class="webia-ai__form" id="webia-ai-form">
            <label class="webia-ai__sr-only" for="webia-ai-input">
                Tulis pesan
            </label>

            <textarea
                id="webia-ai-input"
                name="message"
                rows="1"
                maxlength="1000"
                placeholder="Tulis pertanyaanmu..."
                autocomplete="off"
            ></textarea>

            <button type="submit" aria-label="Kirim pesan" disabled id="webia-ai-send">
                ↑
            </button>
        </form>

        <p class="webia-ai__disclaimer">
            WEBIA Assistant · AI integration coming soon
        </p>
    </section>
</div>
